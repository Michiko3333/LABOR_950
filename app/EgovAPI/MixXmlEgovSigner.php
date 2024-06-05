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
use App\EgovAPI\Egov;
use App\EgovAPI\EgovTestLog;
use App\Http\Controllers\FinalExamController;

class MixXmlEgovSigner
{
    private $companyId;
    private $password;
    private $pfxFilepath;
    private $procedureId;
    private $signer;
    private $workingDirectory;
    private $afterLedgerPath;

    /* -- 引数説明 --
     * 通常利用は$requestのみ設定
     * コマンド利用時には$request=nullかつ、$companyIdを設定
    */
    public function __construct($request=null, $companyId=null)
    {
        if ($request != null || $companyId === null) {
            $this->companyId = $request->session()->get('company_id');
            $pathInfo = $request->getPathInfo();
            $this->procedureId = preg_replace('~^/.*?/~', '', $pathInfo);
            $this->signer = new Signer();
            $this->signer->makeDir();
            $this->workingDirectory = $this->signer->getPath();
            preg_match('#/app/(.*)#', $this->workingDirectory, $matches);
            $this->afterLedgerPath = $matches[1];
        } else {
            $this->companyId = $companyId;
            $date = now()->format('YmdHi');
            do {
                $randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                $uniqueNumber = $date . $randomNumber;
                $folderExists = Storage::exists('egov-test/temp/' . $uniqueNumber);
            } while ($folderExists);
            Storage::makeDirectory('egov-test/temp/' . $uniqueNumber);
            $this->workingDirectory = Storage::path('egov-test/temp/' . $uniqueNumber);
            preg_match('#/app/(.*)#', $this->workingDirectory, $matches);
            $this->afterLedgerPath = $matches[1];
        }

    }

    /* -- 引数説明 --
     * $separaterをTrueにすることで個別ファイル署名形式として送信
     * False or 設定しないことで標準形式での送信
    */
    public function run($request, $separater=False, $csvText=null)
    {
        EgovTestLog::info(print_r('******************************** MixEgovSigner start ********************************', true));
        $inputFolderPath = $this->xmlInput($request, $separater);
        $this->getPfx();
        Storage::makeDirectory($this->afterLedgerPath . '/afterSigner/zip/');
        $signerFolderPath = $this->workingDirectory . '/afterSigner/zip/';
        $this->copyFolder($inputFolderPath, $signerFolderPath);
        $this->putAttachment($request);
        $this->putcsv($csvText);
        $this->egovSigner($separater);
        $kouseiFilePath = $signerFolderPath . "kousei.xml";
        $this->transformEmptyTags($kouseiFilePath);
        $base64Data = $this->zipBinary();
        $response = $this->sendProcedure($base64Data);
        if ((!isset($_SERVER['EGOV_TEST'])) or ($_SERVER['EGOV_TEST'] == 'false')) {
            $this->signer->removeDir();
        }
        EgovTestLog::info(print_r('******************************** MixEgovSigner end ********************************', true));
        return $response;
    }

    // requestに沿ってxmlファイルを編集
    public function xmlInput($request, $separater)
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

        // 手続IDとパスの取得
        $pathInfo = $request->getPathInfo();
        $procedureID = preg_replace('~^/.*?/~', '', $pathInfo);
        $folderPath = storage_path('/app/ledger-template/' . $procedureID);
        Storage::makeDirectory($this->afterLedgerPath . '/input_xml/');
        $outputPath = $this->workingDirectory . '/input_xml/';

        $this->copyFolder($folderPath, $outputPath);
        EgovTestLog::info(print_r('テンプレートフォルダのコピーが成功しました', true));
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
        $attachmentPath = $outputPath . 'kousei.xml';
        $counter = 0;
        if ($attachments) {
            while (True) {
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
                if ($counter == 1) {
                    break;
                }
                if ($separater) {
                    $attachmentPath = $this->getAttachmentSignPath($outputPath, '申請種別', '添付書類署名');
                    if ($attachmentPath==[]) {
                        break;
                    }
                    $counter++;
                    continue;
                }
                break;
            }
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
            EgovTestLog::info(print_r($file . 'のデータ変換が成功しました', true));
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

    //　pfxバイナリとパスワードをテーブルより取得し、pfxファイルに復元する。パスワードとパスは署名で再利用
    public function getPfx()
    {
        $pfx = Certificate::where('company_id', $this->companyId)->where('delete_flg', 0)->select('file', 'password')->first();
        $binarypfx = $pfx->file;
        $this->password = $pfx->password;
        $this->pfxFilepath = $this->workingDirectory . '/input_xml/certificate.pfx';
        file_put_contents($this->pfxFilepath, $binarypfx);
        EgovTestLog::info(print_r('pfxファイルの復元に成功しました', true));
    }

    //　添付ファイルを/afterSignerフォルダに配置
    public function putAttachment($request)
    {
        if ($request->files->count() !== 0) {
            foreach ($request->file() as $key => $file) {
                $attachment_file_name = $file->getClientOriginalName();
                $putPath = $this->afterLedgerPath . '/afterSigner/zip';
                $putFullPath = $this->workingDirectory . '/afterSigner/zip';
                $file->storeAs($putPath, $attachment_file_name);
                EgovTestLog::info(print_r('添付ファイルを配置しました filename:' . $attachment_file_name , true));

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

    //署名
    public function egovSigner($separater)
    {
        // 署名用フォルダ
        $afterSignerFolder = $this->workingDirectory . '/afterSigner/zip';
        if ($separater){
            $serchDirectory = $this->workingDirectory . '/afterSigner/zip/';
            $filenamePattern = 'kousei' . date("Y") . '*.xml';
            $files = glob($serchDirectory . $filenamePattern);
            foreach ($files as $file) {
                $signerBool = $this->signer->run($afterSignerFolder, $this->pfxFilepath, $this->password, basename($file), basename($file));
            }
            if ( $signerBool==False ) {
                EgovTestLog::error("個別ファイル署名形式の署名に失敗しました");
            }else{
                EgovTestLog::info(print_r('個別ファイル署名形式の署名に成功しました', true));
            }
        } else {
            $signerBool = $this->signer->run($afterSignerFolder, $this->pfxFilepath, $this->password);
            if ( $signerBool==False ) {
                EgovTestLog::error("標準形式の署名に失敗しました");
            }else{
                EgovTestLog::info(print_r('標準形式の署名に成功しました', true));
            }
        }
    }

    //不要なpfxファイルの削除
    public function deletePfx()
    {
        $pfxPath = $this->afterLedgerPath . '/input_xml/certificate.pfx';
        Storage::delete($pfxPath);
        EgovTestLog::info(print_r('pfxファイルを削除しました', true));
    }

    //zip圧縮後、base64バイナリデータを返す
    public function zipBinary()
    {
        $zipfilepath = $this->workingDirectory . '/zip/sent_data.zip';
        $zip = new \ZipArchive();
        $this->workingDirectory = $this->workingDirectory . '/afterSigner/';
        if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->workingDirectory),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
            foreach ($files as $name => $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (!$file->isDir() && $extension !== 'pfx') {
                    $filePath = $file->getRealPath();
                    $relativePath = str_replace($this->workingDirectory, '', $filePath);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
            EgovTestLog::info(print_r('標準zipファイル作成に成功しました', true));
        } else {
            EgovTestLog::error("zipファイル作成に失敗しました");
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
            $body = $r->body();
            //　返却値が空だった場合、トークン再取得。
            if (empty($body)) {
                if ( $counter > 3 ){
                    EgovTestLog::error("予期せぬエラー：申請データ送信に失敗しました");
                    EgovTestLog::info(print_r($r->collect(), true));
                    $returnData = [
                        false, [ 'title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました' ]
                    ];
                    break;
                }
                $this->useRefreshToAccess();
            } else {
                $jsonString = $r->getBody()->getContents();
                $decodedArray = json_decode($jsonString, true);
                EgovTestLog::info(print_r('申請データ送信返却値 手続ID:' . $this->procedureId . PHP_EOL . $decodedArray, true));
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                $headers = $guzzleResponse->getHeaders();
                $headersText = '';
                foreach ($headers as $name => $values) {
                    $headersText .= $name . ': ' . implode(",\n", $values) . "\n";
                }
                EgovTestLog::info(print_r('headers :' . $headersText, true));
                $returnData = [
                    false, [ 'title' => '', 'detail' => '' ]
                ];
                if ($statusCode == 200){
                    EgovTestLog::info(print_r($r, true));
                    EgovTestLog::info(print_r('手続送信に成功しました', true));
                    EgovTestLog::info(print_r($r->collect(), true));
                    $returnData[0] = true;
                    $returnData[1]['detail'] = '手続送信に成功しました';
                    $this->TableInsert($r);
                    break;
                }else{
                    EgovTestLog::error("返却値エラー：申請データ送信に失敗しました");
                    EgovTestLog::info(print_r($r->collect(), true));
                    $returnData[1]['title'] = $r['title'];
                    $returnData[1]['detail'] = $r['detail'];
                    $errorReport = [];
                    $index= 0;
                    foreach ($r->collect()['report_list'] as $report) {
                        $index++;
                        if (isset($report['item']) && isset($report['content'])) {
                            $errorReport[] = 'エラー' . $index . ': ' . $report['item'];
                            $errorReport[] = 'エラーメッセージ' . $index . ': ' . $report['content'];
                        }
                    }
                    $returnData[1]['errorReport'] = $errorReport;
                    break;
                }
            }
        }
        return $returnData;
    }

    //リフレッシュトークンを利用してアクセストークンの取得
    public function useRefreshToAccess()
    {
        $title = "アクセストークン再取得";
        $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->getToken();
        EgovTestLog::info(print_r($title . '返却値: ' . $r, true));
        $access_token = $r['access_token'];
        $refresh_token = $r['refresh_token'];

        $account->access_token = $access_token;
        $account->refresh_token = $refresh_token;
        $account->delete_flg = 0;
        $account->save();
        EgovTestLog::info(print_r('リフレッシュトークンよりアクセストークンの再取得に成功しました', true));
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
            EgovTestLog::info('申請データ用のタグ変換が行われました');
        }
    }

    // csvファイルの配置と添付情報の付与
    public function putcsv($csvText=null)
    {
        if ($csvText == null) {
            return;
        }
        $csvName = 'SHFD0006.csv';
        Storage::put($this->afterLedgerPath . '/afterSigner/zip/' . $csvName, $csvText);
        $attachmentPath =  $this->workingDirectory . '/afterSigner/zip/kousei.xml';

        $xml = new \DOMDocument();
        $xml->preserveWhiteSpace = true;
        $xml->formatOutput = true;
        $xml->load($attachmentPath);

        $submitInfoElement = $xml->getElementsByTagName('提出先情報')->item(0);
        $newElement = $xml->createElement('添付書類属性情報');
        $newElement->appendChild($xml->createTextNode("\n\t\t\t"));

        $newElement->appendChild($xml->createElement('添付種別', '添付'));
        $newElement->appendChild($xml->createTextNode("\n\t\t\t"));

        $newElement->appendChild($xml->createElement('添付書類名称', 'csvファイル'));
        $newElement->appendChild($xml->createTextNode("\n\t\t\t"));

        $newElement->appendChild($xml->createElement('添付書類ファイル名称', $csvName));
        $newElement->appendChild($xml->createTextNode("\n\t\t\t"));

        $newElement->appendChild($xml->createElement('提出情報', 1));
        $newElement->appendChild($xml->createTextNode("\n\t\t"));

        $submitInfoElement->parentNode->insertBefore($newElement, $submitInfoElement->nextSibling);
        $submitInfoElement->parentNode->insertBefore($xml->createTextNode("\n\t\t"), $submitInfoElement->nextSibling);

        $xml->save($attachmentPath);
    }

     /**
     * 個別署名での添付書類署名が必要なパスを取得
     * フォルダ内のxmlファイルが指定タグと指定値を一致するパスの取得
     * 再帰的に末端タグまで検索
     * @param string $directory フォルダパス
     * @param string $tagName タグ名
     * @param string $tagValue タグ値
     * @return string or array | null 一致パスが一つであればパスを返し、複数あれば配列で返す
     */
    public function getAttachmentSignPath($directory, $tagName, $tagValue)
    {
        function checkTagValue($node, $tagName, $tagValue) {
            if ($node->nodeName === $tagName && $node->nodeValue === $tagValue) {
                return true;
            }
            foreach ($node->childNodes as $child) {
                if (checkTagValue($child, $tagName, $tagValue)) {
                    return true;
                }
            }
            return false;
        }

        $matchingFiles = [];
        $dirIterator = new \DirectoryIterator($directory);

        foreach ($dirIterator as $fileinfo) {
            if ($fileinfo->isFile() && $fileinfo->getExtension() === 'xml') {
                $filePath = $fileinfo->getPathname();

                $doc = new \DOMDocument();
                libxml_use_internal_errors(true);
                if ($doc->load($filePath)) {
                    if (checkTagValue($doc->documentElement, $tagName, $tagValue)) {
                        $matchingFiles[] = $filePath;
                    }
                }
                libxml_clear_errors();
            }
        }
        if (count($matchingFiles) === 1) {
            return $matchingFiles[0];
        } else {
            return $matchingFiles;
        }
    }

     /**
     * 最終確認試験用
     * 記入済みの帳票を署名し、手続送信を行う
     * 標準の場合はstorage/app/egov-test/zipにファイルを配置。個別なら配下にフォルダ類配置
     *
     * @param string $proc_id 手続ID（手続識別子
     * @param int $signerNUM    1:標準形式
     *                          2:個別ファイル署名形式
     *                          0:署名なし
     *                          3:連署式　標準
     *                          9:申請のみ行う
     * @param int $examNo    最終確認試験の番号
     * 手続選択で取得したスケルトンデータにデータを記入したファイルを下記フォルダを作成して配置
     * 標準：ledger/dev/zip
     * 個別：dev_separate
     * 共通：zip置き場のledgertmpフォルダ
     */
    public function runExam($proc_id, $signerNUM=1, $examNo)
    {
        EgovTestLog::info(print_r('******************************** MixEgovSigner exam start ********************************', true));
        EgovTestLog::info(print_r($this->workingDirectory . $this->afterLedgerPath, true));

        if ('getPfx' && $signerNUM!=9) {
            $pfx = Certificate::where('company_id', $this->companyId)->where('delete_flg', 0)->select('file', 'password')->first();
            $binarypfx = $pfx->file;
            $this->password = $pfx->password;
            $this->pfxFilepath = $this->workingDirectory . '/certificate.pfx';
            file_put_contents($this->pfxFilepath, $binarypfx);
            EgovTestLog::info(print_r('pfxファイルの復元に成功しました', true));
        }
        Storage::makeDirectory($this->afterLedgerPath . '/wordking');
        Storage::makeDirectory($this->afterLedgerPath . '/wordking/zip/');
        $workingPath = $this->workingDirectory . '/wordking/';
        $signerFolderPath = $this->workingDirectory . '/wordking/zip/';

        // egov-test/{手続ID}よりファイルをsignerFolderPathにコピー
        if ('copy' && $signerNUM!=9) {
            $sourceFolder = Storage::path('egov-test/' . $proc_id);
            // return $sourceFolder;
            $files = scandir($sourceFolder);
            foreach ($files as $file) {
                $sourceFilePath = $sourceFolder . '/' . $file;
                if (is_file($sourceFilePath)) {
                    $destinationFilePath = $signerFolderPath . '/' . $file;
                    copy($sourceFilePath, $destinationFilePath);
                }
            }
        }

        // 署名
        if ('egovSigner' && $signerNUM!=9) {
            $signer = new Signer();
            if ($signerNUM==2){
                    $filenamePattern = 'kousei' . date("Y") . '*.xml';
                    $files = glob($signerFolderPath . $filenamePattern);
                    $signerTargetPath = $files[0];
                    rename($signerFolderPath . 'kousei.xml', $signerFolderPath . 'kousei_tmp.xml');
                    rename($signerTargetPath, $signerFolderPath . 'kousei.xml');
                    $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                    rename($signerFolderPath . 'kousei.xml', $signerTargetPath);
                    rename($signerFolderPath . 'kousei_tmp.xml', $signerFolderPath . 'kousei.xml');
                if ( $signerBool==False ) {
                    EgovTestLog::error("個別ファイル署名形式の署名に失敗しました");
                }else{
                    EgovTestLog::info(print_r('個別ファイル署名形式の署名に成功しました', true));
                }
            } elseif ($signerNUM==1){
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                if ( $signerBool==False ) {
                    EgovTestLog::error("標準形式の署名に失敗しました");
                }else{
                    EgovTestLog::info(print_r('標準形式の署名に成功しました', true));
                }
            } elseif ($signerNUM==3){
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                if ( $signerBool==False ) {
                    EgovTestLog::error("標準形式の連署式署名に失敗しました");
                }else{
                    EgovTestLog::info(print_r('標準形式の連署式署名に成功しました', true));
                }
            }
            $kouseiFilePath = $signerFolderPath . "kousei.xml";
            $this->transformEmptyTags($kouseiFilePath);
        }

        //zip圧縮後、base64バイナリデータを返す
        if ('zipBinary') {
            if ($signerNUM==9) {
                $workingPath = Storage::path('egov-test/temp/onlySendData');
            }
            $zipfilepath = $this->workingDirectory . '/send_data.zip';

            $zip = new \ZipArchive();
            if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($workingPath),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );
                foreach ($files as $name => $file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (!$file->isDir() && $extension !== 'pfx') {
                        $filePath = $file->getRealPath();
                        $relativePath = str_replace($workingPath, '', $filePath);
                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                EgovTestLog::info(print_r('標準zipファイル作成に成功しました', true));
            } else {
                EgovTestLog::error("zipファイル作成に失敗しました");
            }
            $base64Data = base64_encode(file_get_contents($zipfilepath));
        }

        // 申請データ送信
        if ('sendProcedure') {
            $send_file = new \stdClass();
            $send_file->file_name = $proc_id . '.zip';
            $send_file->file_data = $base64Data;

            $counter = 0;
            $response = null;
            while (True){
                $counter++;
                $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
                $api = Egov::accessToken($account->access_token);
                // 送信
                $r = $api->ApplicationDataTransmission($proc_id, $send_file);
                // ログ作成
                FinalExamController::logoutput($r, $examNo);
                $body = $r->body();
                //　返却値が空だった場合、トークン再取得。
                if (empty($body)) {
                    if ( $counter > 3 ){
                        EgovTestLog::error("予期せぬエラー：申請データ送信に失敗しました");
                        EgovTestLog::info(print_r($r->collect(), true));
                        $returnData = [
                            false, [ 'title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました' ]
                        ];
                        break;
                    }
                    $this->useRefreshToAccess();
                } else {
                    $jsonString = $r->getBody()->getContents();
                    $decodedArray = json_decode($jsonString, true);
                    EgovTestLog::info(print_r('申請データ送信返却値 手続ID:' . $this->procedureId . PHP_EOL . $decodedArray, true));
                    $guzzleResponse = $r->toPsrResponse();
                    $statusCode = $guzzleResponse->getStatusCode();
                    $headers = $guzzleResponse->getHeaders();
                    $headersText = '';
                    foreach ($headers as $name => $values) {
                        $headersText .= $name . ': ' . implode(",\n", $values) . "\n";
                    }
                    EgovTestLog::info(print_r($proc_id . '/headers :' . $headersText, true));
                    if ($statusCode == 200){
                        EgovTestLog::info(print_r($r, true));
                        EgovTestLog::info(print_r('手続送信に成功しました', true));
                        EgovTestLog::info(print_r($r->collect(), true));
                        $this->TableInsert($r);
                        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
                        }, $r->collect());
                        $response = $decodedTitle;
                        break;
                    }else{
                        EgovTestLog::error("返却値エラー：申請データ送信に失敗しました");
                        EgovTestLog::info(print_r($r->collect(), true));
                        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
                        }, $r->collect());
                        $response = $decodedTitle;
                        break;
                    }
                }
            }
        }

        // 　一時ファイル削除
        // $files = Storage::files($this->workingDirectory);
        // foreach ($files as $file) {
        //     Storage::delete($file);
        // }
        // Storage::deleteDirectory($this->workingDirectory);

        EgovTestLog::info(print_r('******************************** MixEgovSigner exam end ********************************', true));
        return $response;
    }
}
