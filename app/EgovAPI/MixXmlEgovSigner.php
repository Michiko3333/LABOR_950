<?php

namespace App\EgovAPI;

use App\Models\Branch;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\CurrentUser;
use App\Models\Egov_account;
use App\Models\Employee;
use App\Models\Managerial_position;
use App\Models\Prefecture;
use App\Models\Egov_application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use app\EgovAPI\Egov;

class MixXmlEgovSigner
{
    private $companyId;
    private $signerFolderPath;
    private $password;
    private $pfxFilepath;
    private $procedureId;
    private $signer;
    private $workingDirectory;
    private $afterLedgerPath;
    private $kousei_FolderPath;
    private $F01_FolderPath;
    private $T01_FolderPath;
    
    public function __construct($request)
    {
        $this->companyId = $request->session()->get('company_id');
        $pathInfo = $request->getPathInfo();
        $this->procedureId = preg_replace('~^/.*?/~', '', $pathInfo);
        $this->signer = new Signer();
        $this->signer->makeDir();
        $this->workingDirectory = $this->signer->getPath(); //"/var/www/karte/storage/app/ledger/2024042601124814"
        preg_match('#/app/(.*)#', $this->workingDirectory, $matches);
        $this->afterLedgerPath = $matches[1];//app以降のアドレス取得 /ledger/~~
    }

    /* -- 実行内容 --
     * 1. テンプレートフォルダを元に各xmlファイルに帳票内容を記載しinput_xmlフォルダに保存。保存先input_xmlフォルダパスを返却
     * 2. 電子証明書登録よりテーブルに登録されたpfxファイル実体化
     * 3. 署名用afterSignerフォルダにinput_xml内のxmlファイルのみコピー　返却値：afterSigner/フォルダパス
     * 4. 添付ファイルをinput_xmlフォルダに配置
     * 4. afterSignerフォルダ内のkousei.xmlに電子署名を行う
     * 5. afterSignerフォルダをzip化し、base64バイナリ化
     * 6. 申請データ送信を行う
     * 
     * -- 構成 --
     * テンプレートフォルダ：storage\app\ledger-template\{手続ID}
     * 処理後作業フォルダ：storage\app\ledger\{一意名}\...
     *  {一意名} ━┳━━ input_xml ━━━ 署名ファイル
     *            ┗━━ zip       ━━━ zipファイル
    */
    // 標準形式
    public function run($request)
    {
        Log::info(print_r('******************************** MixEgovSigner start ******************************', true));
        $inputFolderPath = $this->xmlInput($request);
        $this->getPfx();
        Storage::makeDirectory($this->afterLedgerPath . '/afterSigner/zip/');
        $signerFolderPath = $this->workingDirectory . '/afterSigner/zip/';
        $this->copyFolder($inputFolderPath, $signerFolderPath);
        $this->putAttachment($request);
        $this->egovSigner();
        $kouseiFilePath = $signerFolderPath . "kousei.xml";
        $this->transformEmptyTags($kouseiFilePath);
        $base64Data = $this->zipBinary();
        $response = $this->sendProcedure($base64Data);
        Log::info(print_r('******************************** MixEgovSigner end ********************************', true));
        return $response;
    }

    // 個別ファイル署名形式 
    public function runSeparate($request)
    {
        // $response = $this->devSosin($request, $separater=True);
        // return $response;
        Log::info(print_r('******************************** MixEgovSigner separate start ******************************', true));
        $inputFolderPath = $this->xmlInput($request, $separater=True);
        $this->getPfx();
        Storage::makeDirectory($this->afterLedgerPath . '/afterSigner/');
        $signerFolderPath = $this->workingDirectory . '/afterSigner/';
        $this->copyFolder($inputFolderPath, $signerFolderPath);
        $this->putAttachment($request, $signerFolderPath, $separater=True);
        $this->egovSigner($separater=True);
        $base64Data = $this->zipBinary($separater=True);
        $response = $this->sendProcedure($base64Data);
        Log::info(print_r('******************************** MixEgovSigner separate end ********************************', true));
        return $response;
    }

    // test用 署名直前・直後のメソッド分け
    public function runAttachiment($request)
    {
        Log::info(print_r('******************************** MixEgovSigner start ******************************', true));
        $inputFolderPath = $this->xmlInput($request);
        $this->getPfx();
        Storage::makeDirectory($this->afterLedgerPath . '/afterSigner/');
        $signerFolderPath = $this->workingDirectory . '/afterSigner/';
        $this->copyFolder($inputFolderPath, $signerFolderPath);
        $this->putAttachment($request);
        return  [$this->workingDirectory, $this->pfxFilepath, $this->password];
    }
    public function runAttachimentSigner($request, $workingDirectory, $pfxFilepath, $password)
    {
        $this->workingDirectory = $workingDirectory;
        $this->pfxFilepath = $pfxFilepath;
        $this->password = $password;
        $this->egovSigner();
        $base64Data = $this->zipBinary();
        $response = $this->sendProcedure($base64Data);
        Log::info(print_r('******************************** MixEgovSigner end ********************************', true));
        return $response;
    }

    // requestに沿ってxmlファイルを編集
    public function xmlInput($request, $separater=False)
    {
        // 申請者情報の設定
        $companyId = $request->session()->get('company_id');
        $companyName = $request->session()->get('company_name');
        $company = Company::where('id', $companyId)->where('delete_flg', 0)->first();
        $headquarter = Branch::where('company_id', $companyId)->where('delete_flg', 0)->where('branch_type', 1)->first();
        $president = Employee::whereHas('branch', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
            })
            ->where('employee_type', 1)
            ->where('delete_flg', 0)
            ->orderBy('id', 'asc')
            ->select('last_name', 'last_name_kana', 'first_name', 'first_name_kana', 'managerial_position_id', 'division_name', 'division_name_kana') 
            ->first();
        if (!is_null($headquarter)){
            $prefectures = Prefecture::where('id', $headquarter->address_prefecture)->get('name', 'nama_kana')->first();
        }
        if (!is_null($president)){
            $managerialPositionName = Managerial_position::where('id', $president->managerial_position_id)
            ->where('company_id', $companyId)->pluck('name')->first();
        }
        if (!is_null($president)){
            if (!is_null($president->last_name) && !is_null($president->first_name)) $request->merge(['applicant_name' => $president->last_name . '　' . $president->first_name]);
            if (!is_null($president->last_name_kana) && !is_null($president->first_name_kana)) $request->merge(['applicant_name_kana' => $president->last_name_kana . '　' . $president->first_name_kana]);
            if (!is_null($managerialPositionName)) $request->merge(['applicant_managerial_position' => $managerialPositionName]);  
            if (!is_null($president->division_name)) $request->merge(['applicant_division_name' => $president->division_name]);
            if (!is_null($president->division_name_kana)) $request->merge(['applicant_division_name_kana' => $president->division_name_kana]);
        }
        if (!is_null($companyName)) $request->merge(['applicant_corporate_name' => $companyName]);
        if (!is_null($company->name_kana)) $request->merge(['applicant_corporate_name_kana' => $company->name_kana]);
        if (!is_null($headquarter)){
            if (!is_null($headquarter->post_code)) $request->merge(['applicant_post_code' => $headquarter->post_code]);
            if (!is_null($prefectures) && !is_null($headquarter->address_city) && !is_null($headquarter->address_ward) && !is_null($headquarter->address_apartment)) {
                $address = $prefectures->name . $headquarter->address_city . $headquarter->address_ward . $headquarter->address_apartment;
                $request->merge(['applicant_address' => $address]);
            }
            if (!is_null($prefectures) && !is_null($headquarter->address_city_kana) && !is_null($headquarter->address_ward) && !is_null($headquarter->address_apartment)) {
                $address_kana = $prefectures->name_kana . $headquarter->address_city_kana . $headquarter->address_ward_kana . $headquarter->address_apartment_kana;
                $request->merge(['applicant_address_kana' => $address_kana]);
            }
            if (!is_null($headquarter->tel_area_code) && !is_null($headquarter->tel_city_code) && !is_null($headquarter->tel_subscriber_code)){
                $request->merge(['applicant_tel' => $headquarter->tel_area_code . '-' . $headquarter->tel_city_code . '-' . $headquarter->tel_subscriber_code]);
            }
            if (!is_null($headquarter->fax)) $request->merge(['applicant_fax' => $headquarter->fax]);
            if (!is_null($headquarter->mail_address)) $request->merge(['applicant_email_address' => $headquarter->mail_address]);
        }

        // 連絡先情報の設定
        $user = CurrentUser::info();
        // 社労士の場合は社労士情報
        if ( $user->role_id == 500 ) { 
            $laborConsultantCompanyId = Branch::where('id', $user->branch_id)->where('delete_flg', 0)->pluck('company_id')->first();
            if (!is_null($laborConsultantCompanyId)){
                $laborConsultantCompany = Company::where('id', $laborConsultantCompanyId)->where('delete_flg', 0)->first();
                $laborConsultantManagerialPositionName = Managerial_position::where('id', $user->managerial_position_id)
                ->where('company_id', $laborConsultantCompanyId)->pluck('name')->first();
            }
            if (!is_null($laborConsultantCompany)){
                $laborConsultantHeadquarter = Branch::where('company_id', $laborConsultantCompany->id)->where('delete_flg', 0)->where('branch_type', 1)->first();
            }
            if (!is_null($user->last_name) && !is_null($user->first_name)) $request->merge(['contact_name' => $user->last_name . '　' . $user->first_name]);
            if (!is_null($user->last_name_kana) && !is_null($user->first_name_kana)) $request->merge(['contact_name_kana' => $user->last_name_kana . '　' . $user->first_name_kana]);
            
            if (!is_null($laborConsultantManagerialPositionName)) $request->merge(['contact_managerial_position' => $laborConsultantManagerialPositionName]);
            if (!is_null($laborConsultantCompany)){
                if (!is_null($laborConsultantCompany->name)) $request->merge(['contact_corporate_name' => $laborConsultantCompany->name]);
                if (!is_null($laborConsultantCompany->name_kana)) $request->merge(['contact_corporate_name_kana' => $laborConsultantCompany->name_kana]);
            }
            if (!is_null($user->division_name)) $request->merge(['contact_division_name' => $user->division_name]);
            if (!is_null($user->division_name_kana)) $request->merge(['contact_division_name_kana' => $user->division_name_kana]);
            if (!is_null($laborConsultantHeadquarter)){
                if (!is_null($laborConsultantHeadquarter->post_code)) $request->merge(['contact_post_code' => $laborConsultantHeadquarter->post_code]);
                if (!is_null($prefectures) && !is_null($laborConsultantHeadquarter->address_city) && !is_null($laborConsultantHeadquarter->address_ward) && !is_null($laborConsultantHeadquarter->address_apartment)) {
                    $laborConsultantAddress = $prefectures->name . $laborConsultantHeadquarter->address_city . $laborConsultantHeadquarter->address_ward . $laborConsultantHeadquarter->address_apartment;
                    $request->merge(['contact_address' => $laborConsultantAddress]);
                }
                if (!is_null($prefectures) && !is_null($laborConsultantHeadquarter->address_city_kana) && !is_null($laborConsultantHeadquarter->address_ward) && !is_null($laborConsultantHeadquarter->address_apartment)) {
                    $laborConsultantAddress_kana = $prefectures->name_kana . $laborConsultantHeadquarter->address_city_kana . $laborConsultantHeadquarter->address_ward_kana . $laborConsultantHeadquarter->address_apartment_kana;
                    $request->merge(['contact_address_kana' => $laborConsultantAddress_kana]);
                }
                if (!is_null($laborConsultantHeadquarter->tel_area_code) && !is_null($laborConsultantHeadquarter->tel_city_code) && !is_null($laborConsultantHeadquarter->tel_subscriber_code)){
                    $request->merge(['contact_tel' => $laborConsultantHeadquarter->tel_area_code . '-' . $laborConsultantHeadquarter->tel_city_code . '-' . $laborConsultantHeadquarter->tel_subscriber_code]);
                }
                if (!is_null($laborConsultantHeadquarter->fax)) $request->merge(['contact_fax' => $laborConsultantHeadquarter->fax]);
                if (!is_null($laborConsultantHeadquarter->mail_address)) $request->merge(['contact_email_address' => $laborConsultantHeadquarter->mail_address]);
            }
        }else{
            // 社労士でなければ会社情報
            if (!is_null($president)){
                if (!is_null($president->last_name) && !is_null($president->first_name)) $request->merge(['contact_name' => $president->last_name . '　' . $president->first_name]);
                if (!is_null($president->last_name_kana) && !is_null($president->first_name_kana)) $request->merge(['contact_name_kana' => $president->last_name_kana . '　' . $president->first_name_kana]);
                if (!is_null($managerialPositionName)) $request->merge(['contact_managerial_position' => $managerialPositionName]);  
                if (!is_null($president->division_name)) $request->merge(['contact_division_name' => $president->division_name]);
                if (!is_null($president->division_name_kana)) $request->merge(['contact_division_name_kana' => $president->division_name_kana]);
            }
            if (!is_null($companyName)) $request->merge(['contact_corporate_name' => $companyName]);
            if (!is_null($company->name_kana)) $request->merge(['contact_corporate_name_kana' => $company->name_kana]);
            if (!is_null($headquarter)){
                if (!is_null($headquarter->post_code)) $request->merge(['contact_post_code' => $headquarter->post_code]);
                if (!is_null($prefectures) && !is_null($headquarter->address_city) && !is_null($headquarter->address_ward) && !is_null($headquarter->address_apartment)) {
                    $address = $prefectures->name . $headquarter->address_city . $headquarter->address_ward . $headquarter->address_apartment;
                    $request->merge(['contact_address' => $address]);
                }
                if (!is_null($prefectures) && !is_null($headquarter->address_city_kana) && !is_null($headquarter->address_ward) && !is_null($headquarter->address_apartment)) {
                    $address_kana = $prefectures->name_kana . $headquarter->address_city_kana . $headquarter->address_ward_kana . $headquarter->address_apartment_kana;
                    $request->merge(['contact_address_kana' => $address_kana]);
                }
                if (!is_null($headquarter->tel_area_code) && !is_null($headquarter->tel_city_code) && !is_null($headquarter->tel_subscriber_code)){
                    $request->merge(['contact_tel' => $headquarter->tel_area_code . '-' . $headquarter->tel_city_code . '-' . $headquarter->tel_subscriber_code]);
                }
                if (!is_null($headquarter->fax)) $request->merge(['contact_fax' => $headquarter->fax]);
                if (!is_null($headquarter->mail_address)) $request->merge(['contact_email_address' => $headquarter->mail_address]);
            }
        }

        //手続IDとパスの取得
        $pathInfo = $request->getPathInfo();
        $procedureID = preg_replace('~^/.*?/~', '', $pathInfo);
        $folderPath = storage_path('/app/ledger-template/' . $procedureID);
        Storage::makeDirectory($this->afterLedgerPath . '/input_xml/');
        $outputPath = $this->workingDirectory . '/input_xml/';
        $this->kousei_FolderPath = $outputPath . $procedureID;

        $this->copyFolder($folderPath, $outputPath);
        Log::info(print_r('テンプレートフォルダのコピーが成功しました', true));
        $templatePath = $folderPath;
        $folderPath = $outputPath;

        $files = $this->getAllFilesInFolder($folderPath);
        foreach ($files as $file){
            $xml = new \DOMDocument();
            $xml->load($file);
            $xpath = new \DOMXPath($xml);

            foreach ($request->all() as $key => $value) {
                if (isset($requestData['certificate_checkbox_1'])) {
                    continue;
                }
                else if (isset($requestData['certificate_checkbox_2'])) {
                    continue;
                }
                $keyName = substr($key, 1);
                $query = "//*[contains(text(), '$keyName')]";
                $targetElements = $xpath->query($query);
                foreach ($targetElements as $element) {
                    if ($key == ($element->nodeValue)){
                        $element->nodeValue = str_replace($key, $value, $element->nodeValue);
                    }
                }
            }
            $xml->save($file);
        }

        // 添付情報付与
        $attachments = $request->input('attachment');
        $attachmentPath = '';
        if ($attachments) {
            if ($separater) {
                $tempPath = substr($folderPath, 0, -1);
                $tempFiles = $this->getAllFilesInFolder($tempPath);
                foreach ($tempFiles as $tempFile) {
                    $pathParts = explode('/', $tempFile);
                    $foldername = $pathParts[count($pathParts) - 2];
                    Log::info(print_r($tempFile, true));
                    Log::info(print_r($foldername, true));
                    if (strlen($foldername) < 3) {
                        continue;
                    }
                    $lastThreeCharacters = substr($foldername, -3);
                    if ($lastThreeCharacters === 'T01') {
                        $attachmentPath = $tempFile;
                        break;
                    }
                }
            } else {
                $attachmentPath = $outputPath . 'kousei.xml';
            }
            $xml = new \DOMDocument();
            $xml->preserveWhiteSpace = true;
            $xml->formatOutput = true;
            $xml->load($attachmentPath);
        
            $submitInfoElement = $xml->getElementsByTagName('提出先情報')->item(0);
        
            foreach ($attachments as $attachment) {
                $newElement = $xml->createElement('添付書類属性情報');
                $newElement->appendChild($xml->createTextNode("\n\t\t\t"));
        
                $newElement->appendChild($xml->createElement('添付種別', $attachment['attachment_type']));
                $newElement->appendChild($xml->createTextNode("\n\t\t\t"));
        
                $newElement->appendChild($xml->createElement('添付書類名称', $attachment['attached_document_name']));
                $newElement->appendChild($xml->createTextNode("\n\t\t\t"));
        
                $newElement->appendChild($xml->createElement('添付書類ファイル名称', $attachment['attachment_file_name']));
                $newElement->appendChild($xml->createTextNode("\n\t\t\t"));
        
                $newElement->appendChild($xml->createElement('提出情報', $attachment['submission_info']));
                $newElement->appendChild($xml->createTextNode("\n\t\t"));
        
                $submitInfoElement->parentNode->insertBefore($newElement, $submitInfoElement->nextSibling);
                $submitInfoElement->parentNode->insertBefore($xml->createTextNode("\n\t\t"), $submitInfoElement->nextSibling);
            }
        
            $xml->save($attachmentPath);
        }

        // 変換されなかったテンプレート値を空にする
        foreach ($files as $file) {
            $file = str_replace('//', '/', $file);
            $xmlA = new \DOMDocument();
            $xmlB = new \DOMDocument();
            $outputFileName = basename($file);
            $templateFiles = $this->getAllFilesInFolder($templatePath);
            // 同名のフォルダ
            foreach ($templateFiles as $templateFile) {
                $tempFileName = basename($templateFile);
                if ($tempFileName == $outputFileName){
                    $xmlA ->load($templateFile);
                    break;
                }   
            }
            $xmlB ->load($file);
            $xpathA = new \DOMXPath($xmlA);
            $xpathB = new \DOMXPath($xmlB);
            // 変換対象にならないタグ一覧、全帳票共通で固定値があれば追加
            $ignoreTags = ['様式ID', '様式バージョン', 'STYLESHEET', '受付行政機関ID', '手続ID', '手続名称', '申請種別', '申請書様式ID', '申請書様式バージョン',
                            '申請書様式名称', '申請書ファイル名称', '様式コピー情報', 'Doctype', '帳票種別', '給付金の種類', 'Xmit',
                            '添付種別', '添付書類名称', '添付書類ファイル名称', '提出情報'];
            // 最奥部のネストの値のみを取得
            $valuesA = [];
            // ネストがない要素を選択
            $elementsA = $xpathA->query('//*[not(*) and normalize-space()]');
            foreach ($elementsA as $element) {
                $valuesA[] = $element->nodeValue;
            }
            foreach ($valuesA as $valueA){
                // 値からタグをサーチ
                $querySerch = "//*[text()='{$valueA}']";
                $targetElementsSerch = $xpathA->query($querySerch);
                $elementSerch = $targetElementsSerch->item(0); 
                // 値よりタグ名取得
                $tagName = $elementSerch->nodeName;
                // 比較しないタグであれば次へ
                if ( in_array($tagName, $ignoreTags) ) {
                    continue;
                }
                // Bにサーチしたタグがあるか調べる
                $queryB = "//{$tagName}/text()";
                $targetElementsSerchB = $xpathB->query($queryB);
                foreach ($targetElementsSerchB as $elementB) {
                    // Bの値を取得
                    $tagValueB = $elementB->nodeValue;
                    if ( $valueA==$tagValueB ){
                        $elementB->nodeValue = "";
                    }
                }
            }
            $xmlB->save($file);
            Log::info(print_r($file . 'のデータ変換が成功しました', true));
        }
       return $outputPath;
    }

    // フォルダーごと再帰コピー
    function copyFolder($source, $destination) {
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }
        $files = scandir($source);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != 'certificate.pfx') {
                $sourcePath = $source . '/' . $file;
                $destinationPath = $destination . '/' . $file;
                if (is_dir($sourcePath)) {
                    $this->copyFolder($sourcePath, $destinationPath);
                } else {
                    copy($sourcePath, $destinationPath);
                }
            }
        }
    }

    // 指定フォルダから全てのファイルを取得
    function getAllFilesInFolder($folderPath) {
        $files = [];
        $entries = scandir($folderPath);
        foreach ($entries as $entry) {
            if ($entry != '.' && $entry != '..') {
                $fullPath = $folderPath . DIRECTORY_SEPARATOR . $entry;
                if (is_dir($fullPath)) {
                    $subFiles = $this->getAllFilesInFolder($fullPath);
                    $files = array_merge($files, $subFiles);
                } elseif (is_file($fullPath)) {
                    $files[] = $fullPath;
                }
            }
        }
        return $files;
    }    
    
    //pfxバイナリとパスワードをテーブルより取得し、pfxファイルに復元する。パスワードとパスは署名で再利用
    public function getPfx()
    {
        $pfx = Certificate::where('company_id', $this->companyId)->where('delete_flg', 0)->select('file', 'password')->first();
        $binarypfx = $pfx->file;
        $this->password = $pfx->password;
        $this->pfxFilepath = $this->workingDirectory . '/input_xml/certificate.pfx';
        file_put_contents($this->pfxFilepath, $binarypfx);
        Log::info(print_r('pfxファイルの復元に成功しました', true));
    }

    //添付ファイルを/afterSignerフォルダに配置
    public function putAttachment($request, $separater=False)
    {
        if ($request->files->count() !== 0) {
            foreach ( $request->all() as $key => $value ) {
                if (strpos($key, 'radio_') === 0) {
                    $file_key = substr($key, strlen('radio_'));
                    $file = $request->file($file_key);
                    $attachment_file_name = $file->getClientOriginalName();
                    if ($separater){
                        $afterSignerFiles = $this->getAllFilesInFolder($this->workingDirectory . '/afterSigner');
                        foreach ($afterSignerFiles as $afterSignerFile){
                            $pathParts = explode('/', $afterSignerFile);
                            $foldername = $pathParts[count($pathParts) - 2];
                            Log::info(print_r($afterSignerFile, true));
                            Log::info(print_r($foldername, true));
                            if (strlen($foldername) < 3) {
                                continue;
                            }
                            $lastThreeCharacters = substr($foldername, -3);
                            if ($lastThreeCharacters === 'T01'){
                                break;
                            };
                        }
                        $putPath = $this->afterLedgerPath . '/afterSigner/' . $foldername;
                        $putFullPath = $this->workingDirectory . '/afterSigner/' . $foldername;
                    } else {
                        $putPath = $this->afterLedgerPath . '/afterSigner/zip';
                        $putFullPath = $this->workingDirectory . '/afterSigner/zip';
                    }
                    $file->storeAs($putPath, $attachment_file_name);
                    Log::info(print_r('添付ファイルを配置しました filename:' . $attachment_file_name , true));
                    
                    // ファイルが完全に移動するまでチェック
                    $counter = 5;
                    while (True) {
                        sleep(1);
                        if (file_exists($putFullPath . '/' . $attachment_file_name)) {
                            break;
                        } else {
                            $counter--;
                            if ($counter == 0){
                                throw new \Exception('添付ファイルが正しく移動しませんでした');
                            }
                        }
                    }
                }
            }
        }
    }

    //署名
    public function egovSigner($separater=False)
    {
        $this->ledgerFolderDelete(); //ledgerフォルダ数の制限、指定値以上なら古い順にフォルダ削除　テスト用。完了した場合はディレクトリ削除メソッドを最後に追加
        if ($separater){
            $afterSignerFolder = $this->workingDirectory . '/afterSigner/';
            $files = $this->getAllFilesInFolder($afterSignerFolder);
            $kouseiPattern = '/^kousei.*$/i';
            $folderPattern = '/F01$/';
            foreach ($files as $file) {
                $file = str_replace('//', '/', $file);
                //対象のファイルのみ署名
                $this->F01_FolderPath = dirname($file);
                $folderName = basename($this->F01_FolderPath);
                $evacuationName = basename($file);
                if (preg_match($folderPattern, $folderName && preg_match($kouseiPattern, $evacuationName))){
                    // 一時的にkousei.xmlにリネーム > 署名 > 命名戻す
                    rename($file, $this->F01_FolderPath . '/kousei.xml'); 
                    $signerBool = $this->signer->run($this->F01_FolderPath, $this->pfxFilepath, $this->password);
                    rename($this->F01_FolderPath . '/kousei.xml' , $this->F01_FolderPath . '/' . $evacuationName);
                    break;
                }
            }

            if ( !isset($signerBool) ) {
                Log::error("個別ファイル署名形式の署名に失敗しました");
            }else{
                Log::info(print_r('個別ファイル署名形式の署名に成功しました', true));
            }
        } else {
            $inputPath = $this->workingDirectory . '/afterSigner/zip';
            // 署名
            $signerBool = $this->signer->run($inputPath, $this->pfxFilepath, $this->password);
            if ( $signerBool==False ) {
                Log::error("標準形式の署名に失敗しました");
            }else{
                Log::info(print_r('標準形式の署名に成功しました', true));
            }
        }

    }

    //不要なpfxファイルの削除
    public function deletePfx()
    {
        $pfxPath = $this->afterLedgerPath . '/input_xml/certificate.pfx';
        Storage::delete($pfxPath);
        Log::info(print_r('pfxファイルを削除しました', true));
    }

    //zip圧縮後、base64バイナリデータを返す
    public function zipBinary($separater=False)
    {
        $zipfilepath = $this->workingDirectory . '/zip/sent_data.zip';
        $zip = new \ZipArchive();
        if ($separater){
            $this->kousei_FolderPath =  $this->workingDirectory . '/afterSigner/' . $this->procedureId;
            $this->workingDirectory = $this->workingDirectory . '/afterSigner/';
            $files = $this->getAllFilesInFolder($this->workingDirectory);
            $F01Pattern = '/F01$/'; //申請書フォルダをマッチング
            $T01Pattern = '/T01$/'; //添付フォルダをマッチング
            foreach ($files as $file) {
                $file = str_replace('//', '/', $file);
                // F01フォルダパスのみ取得
                $folderPath = dirname($file);
                $folderName = basename($folderPath);
                if (preg_match($F01Pattern, $folderName)){
                    $this->F01_FolderPath = dirname($file);
                    continue;
                }elseif (preg_match($T01Pattern, $folderName)){
                    $this->T01_FolderPath = dirname($file);
                    continue;
                }
            }
        } else {
            $this->workingDirectory = $this->workingDirectory . '/afterSigner/';
        }
        if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            if ($separater){
                // 申請書フォルダをZIPに追加
                $filesIn_F01_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->F01_FolderPath));
                foreach ($filesIn_F01_Folder as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $F01_FolderName = basename($this->F01_FolderPath);
                        $relativePath = substr($filePath, strlen($this->F01_FolderPath) + 1);
                        $zip->addFile($filePath, $F01_FolderName .'/' . $relativePath);
                    }
                }
                // 構成フォルダをZIPに追加
                $filesIn_kousei_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->kousei_FolderPath));
                foreach ($filesIn_kousei_Folder as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $kousei_FolderName = basename($this->kousei_FolderPath);
                        $relativePath = substr($filePath, strlen($this->kousei_FolderPath) + 1);
                        $zip->addFile($filePath, $kousei_FolderName . '/' . $relativePath);
                    }
                }
                // 添付フォルダをZIPに追加
                if (isset($this->T01_FolderPath)){
                    $filesIn_T01_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->T01_FolderPath));
                    foreach ($filesIn_T01_Folder as $file) {
                        if (!$file->isDir()) {
                            $filePath = $file->getRealPath();
                            $T01_FolderName = basename($this->T01_FolderPath);
                            $relativePath = substr($filePath, strlen($this->T01_FolderPath) + 1);
                            $zip->addFile($filePath, $T01_FolderName .'/' . $relativePath);
                        }
                    }
                }        
                $zip->close();
                Log::info(print_r('個別zipファイル作成に成功しました', true));
            } else {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($this->workingDirectory),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );
                foreach ($files as $name => $file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (!$file->isDir() && $extension !== 'pfx') {
                        $filePath = $file->getRealPath();
                        // $relativePath = substr($filePath, strlen($this->workingDirectory) + 1);
                        // // dd($relativePath);
                        // $zip->addFile($filePath, $relativePath);
                        $relativePath = str_replace($this->workingDirectory, '', $filePath);
                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                Log::info(print_r('標準zipファイル作成に成功しました', true));
            }
        } else {
            Log::error("zipファイル作成に失敗しました");
        }

        $base64Data = base64_encode(file_get_contents($zipfilepath));
        return $base64Data;
    }

    //申請データ送信
    public function sendProcedure($base64Data)
    {
        $send_file = new \stdClass();
        $send_file->file_name = $this->procedureId . '.zip';
        $send_file->file_data = $base64Data;

        $counter = 0;
        $returnData = [];
        while (True){
            $counter++;
            $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
            $api = Egov::accessToken($account->access_token);
            // 送信
            $r = $api->ApplicationDataTransmission($this->procedureId, $send_file);
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            //　返却値が空だった場合、トークン再取得。
            if (empty($body)) {
                if ( $counter > 3 ){
                    Log::error("予期せぬエラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData = [
                        false, [ 'title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました' ]
                    ];
                    break;
                }
                $this->useRefreshToAccess();
            } else {
                $jsonString = $r->getBody()->getContents();
                $decodedArray = json_decode($jsonString, true);
                Log::info(print_r('申請データ送信返却値 手続ID:' . $this->procedureId . PHP_EOL . $decodedArray, true));
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                $returnData = [
                    false, [ 'title' => '', 'detail' => '' ]
                ];
                if ($statusCode == 200){
                    Log::info(print_r('手続送信に成功しました', true));
                    Log::info(print_r($r->collect(), true));
                    $returnData[0] = true;
                    $returnData[1]['detail'] = '手続送信に成功しました';
                    $this->TableInsert($r);
                    break;
                }else{
                    Log::error("返却値エラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData[1]['title'] = $r['title'];
                    $returnData[1]['detail'] = $r['detail'];
                    break;
                }
            }
        }
        return $returnData;
    }

    //リフレッシュトークンを利用してアクセストークンの取得
    public function useRefreshToAccess()
    {
        $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->getToken();
        $access_token = $r['access_token'];
        $refresh_token = $r['refresh_token'];
        
        $account->access_token = $access_token;
        $account->refresh_token = $refresh_token;
        $account->delete_flg = 0;
        $account->save();
        Log::info(print_r('リフレッシュトークンよりアクセストークンの再取得に成功しました', true));
    }

    //t_egov_applicationテーブルに返却値を挿入
    public function TableInsert($r)
    {
        $response = $r->collect();
        $result = $response['results'];
        $currentDateTime = date('Y-m-d H:i:s');
        if ( $result['apply_pay_list'] == [] ){
            $apply_pay_list = null;
        }else{
            $apply_pay_list = $result['apply_pay_list'][0];
        }
        Egov_application::insert([
            'company_id' => $this->companyId,
            'arrive_id' => $result['arrive_id'],
            'arrive_date' => $result['arrive_date'],
            'corporation_name' => $result['corporation_name'],
            'applicant_name' => $result['applicant_name'],
            'apply_type' => $result['apply_type'],
            'proc_name' => $result['proc_name'],
            'ministry_name' => $result['ministry_name'],
            'submission_destination' => $result['submission_destination'],
            'apply_form' => $result['apply_form']['form'][0]['form_name'],
            'apply_pay_list' => $apply_pay_list,
            'delete_flg' => 0,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);
    }

    //ledgerフォルダ数の制限、指定値以上なら古い順にフォルダ削除 //最終的にはremoveDir()入れ替え。テスト中はこちらを使用
    public function ledgerFolderDelete($quantity=20)
    {
        function deleteFolder($deleteFolderPath) {
            if (!is_dir($deleteFolderPath)) {
                return false;
            }
            $files = array_diff(scandir($deleteFolderPath), ['.', '..']);
            foreach ($files as $file) {
                $filePath = $deleteFolderPath . '/' . $file;
                if (is_dir($filePath)) {
                    deleteFolder($filePath);
                } else {
                    unlink($filePath);
                }
            }
            return rmdir($deleteFolderPath);
        }

        $folderPath = Storage::path('ledger');
        $maxFolders = $quantity;
        $folders = scandir($folderPath, SCANDIR_SORT_ASCENDING);
        $folders = array_values(array_diff($folders, ['.', '..']));
        
        if (count($folders) > $maxFolders) {
            $foldersToDelete = count($folders) - $maxFolders;
            for ($i = 0; $i < $foldersToDelete; $i++) {
                $deleteFolderPath = $folderPath . '/' . $folders[$i];
                deleteFolder($deleteFolderPath);
                Log::info($deleteFolderPath . 'を削除しました');
            }
            Log::info('ledgerFolderDeleteによりフォルダを整理しました');
            return true;
        } else {
            return false;
        }
    }

    //空タグを署名用に変換
    public function transformEmptyTags($targetPath)
    {
        $xmlContent = file_get_contents($targetPath);

        // 変換対象
        $elements = [
            '役職', '法人団体名', '法人団体名フリガナ', '部門名', '部門名フリガナ', '郵便番号',
            '住所', '住所フリガナ', '電話番号', 'FAX番号', '電子メールアドレス',
        ];
        
        // マッチする行を置換して変換
        foreach ($elements as $element) {
            $xmlContent = preg_replace(
                '/([\t ]+)<' . $element . ' \/>([\t ]*)/sU',
                '$1<' . $element . '></' . $element . '>$2',
                $xmlContent
            );
        }
        if (isset($xmlContent)){
            file_put_contents($targetPath, $xmlContent);
            Log::info('申請データ用のタグ変換が行われました');
        }
    }    

    //develop用
    public function TestMixEgovSigner() 
    {
        //inputxmlのみを行ってinput_xmlに作成された署名抜きxmlファイルをdevに手動コピー
        //ここで自動設定できない分を手動変換（手動で署名情報を正規の形に改行など
        //その後送信手続まで行う
        Log::info(print_r('******************************** TestMixEgovSigner実行 ********************************', true));
        // $signer = new Signer();constに移動
        // $signer->makeDir(); //ledgerフォルダ内に手続IDフォルダ作成。手続IDフォルダ内にzipフォルダ作成　constに移動
        $this->workingDirectory = Storage::path('ledger/dev/zip');            //署名元フォルダ
        $this->signerFolderPath = Storage::path('ledger/dev_copy/zip'); //署名先フォルダ
        
        //pfxバイナリとパスワードをテーブルより取得し、pfxファイルに復元
        $pfx = Certificate::where('company_id', $this->companyId)->where('delete_flg', 0)->select('file', 'password')->first();
        $this->binarypfx = $pfx->file;
        $this->password = $pfx->password;
        $this->pfxFilepath = $this->signerFolderPath . '/certificate.pfx';
        file_put_contents($this->pfxFilepath, $this->binarypfx);
        
        //input_xmlからコピー
        $files = scandir($this->workingDirectory);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $sourceDirectoryFilePath = $this->workingDirectory . '/' . $file;
                $signerFilePath = $this->signerFolderPath . '/' . $file;
                copy($sourceDirectoryFilePath, $signerFilePath);
            }
        }

        //第一引数は署名前フォルダ
        $signerBool = $this->signer->run($this->workingDirectory, $this->pfxFilepath, $this->password);
        if ( $signerBool==False ) {
            Log::error("署名に失敗しました");
        }else{
            Log::info(print_r('署名に成功しました', true));
        }

        $this->workingDirectory = Storage::path('ledger/dev');
        //zip圧縮後、base64バイナリデータ取得
        $zipfilepath = Storage::path('ledger/tmp/zip.zip');
        $zip = new \ZipArchive();
        if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->workingDirectory),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
            foreach ($files as $name => $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (!$file->isDir() && $extension !== 'pfx') {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($this->workingDirectory) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
            Log::info(print_r('zipファイル作成に成功しました', true));
        } else {
            Log::error("zipファイル作成に失敗しました");
        }
        $base64Data = base64_encode(file_get_contents($zipfilepath));

        $send_file = new \stdClass();
        $send_file->file_name = $this->procedureId . '.zip';
        $send_file->file_data = $base64Data;

        $counter = 0;
        $returnData = [];
        while (True){
            $counter++;
            $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
            $api = Egov::accessToken($account->access_token);
            $r = $api->ApplicationDataTransmission($this->procedureId, $send_file); //送信
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            if (empty($body)) { //返却値が空だった場合、トークン再取得。
                if ( $counter > 3 ){
                    Log::error("予期せぬエラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData = [
                        false, [ 'title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました' ]
                    ];
                    break;
                }
                $this->useRefreshToAccess();
            } else {
                $jsonString = $r->getBody()->getContents();
                $decodedArray = json_decode($jsonString, true);
                Log::info(print_r('申請データ送信返却値 手続ID:' . $this->procedureId . PHP_EOL . $decodedArray, true));
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                $returnData = [
                    false, [ 'title' => '', 'detail' => '' ]
                ];
                if ($statusCode == 200){
                    Log::info(print_r('手続送信に成功しました', true));
                    Log::info(print_r($r->collect(), true));
                    $returnData[0] = true;
                    $returnData[1]['detail'] = '手続送信に成功しました';
                    $this->TableInsert($r);
                    break;
                }else{
                    Log::error("返却値エラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData[1]['title'] = $r['title'];
                    $returnData[1]['detail'] = $r['detail'];
                    break;
                }
            }
        }
        return $returnData;
    }

    //develop用 署名作成済みxmlを元に成功再現
    //標準の場合はdef/zipにファイルを配置。個別ならdev_separate配下にフォルダ類配置
    public function devSosin($request, $separater=False)
    {
        //ledger/dev/zipを作成し、署名済xmlを配置
        //run内で$this->devSosin();実行

        // 初期設定
        $pathInfo = $request->getPathInfo();
        $procedureID = preg_replace('~^/.*?/~', '', $pathInfo);//手続ID
        $procedureID = "4950013520873000";//19帳票にない場合は記載必須
        

        // $this->F01_FolderPath取得
        if ($separater){
            $this->kousei_FolderPath =  Storage::path('ledger/dev_separate/' . $procedureID);
            $this->workingDirectory = Storage::path('ledger/dev_separate/');//参照フォルダ
            $files = $this->getAllFilesInFolder($this->workingDirectory);
            $F01Pattern = '/F01$/'; //申請書フォルダをマッチング
            $T01Pattern = '/T01$/'; //添付フォルダをマッチング
            foreach ($files as $file) {
                $file = str_replace('//', '/', $file);
                // F01フォルダパスのみ取得
                $folderPath = dirname($file);
                $folderName = basename($folderPath);
                if (preg_match($F01Pattern, $folderName)){
                    $this->F01_FolderPath = dirname($file);
                    continue;
                }elseif (preg_match($T01Pattern, $folderName)){
                    $this->T01_FolderPath = dirname($file);
                    continue;
                }
            }
        } else {
            $this->workingDirectory = Storage::path('ledger/dev');//参照フォルダ
        }
        //zipバイナリ化
        $zipfilepath = Storage::path('ledger/tmp/zip.zip');
        $zip = new \ZipArchive();
        if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            if ($separater){
                // 申請書フォルダをZIPに追加
                $filesIn_F01_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->F01_FolderPath));
                foreach ($filesIn_F01_Folder as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $F01_FolderName = basename($this->F01_FolderPath);
                        $relativePath = substr($filePath, strlen($this->F01_FolderPath) + 1);
                        $zip->addFile($filePath, $F01_FolderName .'/' . $relativePath);
                    }
                }
                // 構成フォルダをZIPに追加
                $filesIn_kousei_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->kousei_FolderPath));
                foreach ($filesIn_kousei_Folder as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $kousei_FolderName = basename($this->kousei_FolderPath);
                        $relativePath = substr($filePath, strlen($this->kousei_FolderPath) + 1);
                        $zip->addFile($filePath, $kousei_FolderName . '/' . $relativePath);
                    }
                }
                // 添付フォルダをZIPに追加
                if (isset($this->T01_FolderPath)){
                    $filesIn_T01_Folder = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->T01_FolderPath));
                    foreach ($filesIn_T01_Folder as $file) {
                        if (!$file->isDir()) {
                            $filePath = $file->getRealPath();
                            $T01_FolderName = basename($this->T01_FolderPath);
                            $relativePath = substr($filePath, strlen($this->T01_FolderPath) + 1);
                            $zip->addFile($filePath, $T01_FolderName .'/' . $relativePath);
                        }
                    }
                }        
                $zip->close();
                Log::info(print_r('個別zipファイル作成に成功しました', true));
            } else {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($this->workingDirectory),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );
                foreach ($files as $name => $file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (!$file->isDir() && $extension !== 'pfx') {
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($this->workingDirectory) + 1);
                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                Log::info(print_r('標準zipファイル作成に成功しました', true));
            }
        } else {
            Log::error("zipファイル作成に失敗しました");
        }

        $base64Data = base64_encode(file_get_contents($zipfilepath));

        //手続送信
        $send_file = new \stdClass();
        $send_file->file_name = $procedureID . '.zip';
        $send_file->file_data = $base64Data;

        $counter = 0;
        $returnData = [];
        Log::info(print_r('111', true));
        while (True){
            $counter++;
            $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
            $api = Egov::accessToken($account->access_token);
            // 送信
            $r = $api->ApplicationDataTransmission($procedureID, $send_file);
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            //　返却値が空だった場合、トークン再取得。
            if (empty($body)) {
                Log::info(print_r('112', true));
                if ( $counter > 3 ){
                    Log::error("予期せぬエラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData = [
                        false, [ 'title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました' ]
                    ];
                    break;
                }
                $this->useRefreshToAccess();
            } else {
                Log::info(print_r('113', true));
                $jsonString = $r->getBody()->getContents();
                $decodedArray = json_decode($jsonString, true);
                Log::info(print_r('申請データ送信返却値 手続ID:' . $procedureID . PHP_EOL . $decodedArray, true));
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                $returnData = [
                    false, [ 'title' => '', 'detail' => '' ]
                ];
                if ($statusCode == 200){
                    Log::info(print_r('114', true));
                    Log::info(print_r('手続送信に成功しました', true));
                    Log::info(print_r($r->collect(), true));
                    $returnData[0] = true;
                    $returnData[1]['detail'] = '手続送信に成功しました';
                    $this->TableInsert($r);
                    break;
                }else{
                    Log::info(print_r('115', true));
                    Log::error("返却値エラー：申請データ送信に失敗しました");
                    Log::info(print_r($r->collect(), true));
                    $returnData[1]['title'] = $r['title'];
                    $returnData[1]['detail'] = $r['detail'];
                    break;
                }
            }
        }
        return $returnData;
    }
}
