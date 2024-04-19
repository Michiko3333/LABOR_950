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
    private $binarypfx;
    private $signerFolderPath;
    private $sourceDirectory;
    private $password;
    private $pfxFilepath;
    private $procedureId;
    private $folderPath;

    public function __construct($request)
    {
        $this->companyId = $request->session()->get('company_id');
        $this->sourceDirectory = Storage::path('filled-out-ledger');
        $pathInfo = $request->getPathInfo();
        $this->procedureId = preg_replace('~^/.*?/~', '', $pathInfo);
    }

    public function run($request)
    {
        $this->xmlInput($request);
        return $this->MixEgovSigner();
    }

    /* テンプレートフォルダを元に各xmlファイルに帳票内容を記載し、アウトプットフォルダに保存する
     * テンプレートフォルダ：storage\app\ledger-template\{手続ID アドレスのledger/〇〇の〇〇と同じ}
     * アウトプットフォルダ：storage\app\filled-out-ledger
    */
    public static function xmlInput($request)
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
        $outputPath = storage_path('/app/filled-out-ledger/');

        //outputfolder cleaner
        if (file_exists($outputPath)) {
            $files = glob($outputPath . '*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }

        // テンプレートの値を元にrequestで送られた値を入れ替える
        $files = scandir($folderPath);
        $files = array_filter($files, function($file) use ($folderPath) {
            return is_file($folderPath . DIRECTORY_SEPARATOR . $file);
        });
        foreach ($files as $file) {
            $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
            $fileName = basename($file);

            $xml = new \DOMDocument();
            $xml->load($filePath);
            $xpath = new \DOMXPath($xml);
            
            foreach ($request->all() as $key => $value) {
                $keyName = substr($key, 1);
                $query = "//*[contains(text(), '$keyName')]";
                $targetElements = $xpath->query($query);
                foreach ($targetElements as $element) {
                    if ($key == ($element->nodeValue)){
                        $element->nodeValue = str_replace($key, $value, $element->nodeValue);
                    }
                }
            }
            $xml->save($outputPath . $fileName);            
        }

        // 添付情報付与
        $attachments = $request->input('attachment');
        if ( $attachments ){
            $xml = new \DOMDocument();
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load($outputPath . 'kousei.xml');
            foreach( $attachments as $attachment){
                $submitInfoElement = $xml->getElementsByTagName('提出先情報')->item(0);
                $newElement = $xml->createElement('添付書類属性情報');
                $newElement->appendChild($xml->createElement('添付種別', $attachment['attachment_type']));
                $newElement->appendChild($xml->createElement('添付書類名称', $attachment['attached_document_name']));
                $newElement->appendChild($xml->createElement('添付書類ファイル名称', $attachment['attachment_file_name']));
                $newElement->appendChild($xml->createElement('提出情報', $attachment['submission_info']));
                $submitInfoElement->parentNode->insertBefore($newElement, $submitInfoElement->nextSibling);
            }
            $xml->save($outputPath . 'kousei.xml');
        }

        // 変換されなかったテンプレート値を空にする
        foreach ($files as $file) {
            $xmlA = new \DOMDocument();
            $xmlA ->load($folderPath . '/' . $file);
            $xmlB = new \DOMDocument();
            $xmlB ->load($outputPath . $file);
            $xpathA = new \DOMXPath($xmlA);
            $xpathB = new \DOMXPath($xmlB);
            $ignoreTags = ['様式ID', '様式バージョン', 'STYLESHEET', '受付行政機関ID', '手続ID', '手続名称', '申請種別', '申請書様式ID', '申請書様式バージョン',
                            '申請書様式名称', '申請書ファイル名称', '様式コピー情報', 'Doctype', '帳票種別', '給付金の種類', 'Xmit'];
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
            $xmlB->save($outputPath . $file);
            Log::info(print_r($file . 'のデータ変換が成功しました', true));
        }
    }

    //pfxバイナリとパスワードをテーブルより取得し、pfxファイルに復元する
    public function getPfx()
    {
        $pfx = Certificate::where('company_id', $this->companyId)->where('delete_flg', 0)->select('file', 'password')->first();
        $this->binarypfx = $pfx->file;
        $this->password = $pfx->password;
        $this->pfxFilepath = $this->signerFolderPath . '/certificate.pfx';
        file_put_contents($this->pfxFilepath, $this->binarypfx);
    }

    //変換後のファイルをzip化するフォルダへコピー
    public function files_copy()    {
        $files = scandir($this->sourceDirectory);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $sourceDirectoryFilePath = $this->sourceDirectory . '/' . $file;
                $signerFilePath = $this->signerFolderPath . '/' . $file;
                copy($sourceDirectoryFilePath, $signerFilePath);
            }
        }
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

    //zip圧縮後、base64バイナリデータを返す
    public function zipBinary()
    {
        $zipfilepath = Storage::path('ledger/tmp/zip.zip');
        $zip = new \ZipArchive();
        if ($zip->open($zipfilepath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->folderPath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
            foreach ($files as $name => $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (!$file->isDir() && $extension !== 'pfx') {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($this->folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
            Log::info(print_r('zipファイル作成に成功しました', true));
        } else {
            Log::error("zipファイル作成に失敗しました");
        }
        $base64Data = base64_encode(file_get_contents($zipfilepath));
        return $base64Data;
    }

    //xmlInput実行後、署名>zip>binary>手続送信>返却値キャッチ
    public function MixEgovSigner()
    {
        $signer = new Signer();
        $signer->makeDir(); //ledgerフォルダ内に手続IDフォルダ作成。手続IDフォルダ内にzipフォルダ作成
        $this->folderPath = $signer->getPath(); //signerするzipフォルダー取得
        $this->signerFolderPath = $this->folderPath . '/zip';
        $this->getPfx(); //pfxバイナリとパスワードをテーブルより取得し、pfxファイルに復元
        $this->files_copy(); //filled-out-ledgerからコピー
        $signerBool = $signer->run($this->signerFolderPath, $this->pfxFilepath, $this->password); //署名
        if ( $signerBool==False ) {
            Log::error("署名に失敗しました");
        }else{
            Log::info(print_r('署名に成功しました', true));
        }
        $base64Data = $this->zipBinary(); //zip圧縮後、base64バイナリデータ取得
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
                    false, [ 'title' => $r['title'], 'detail' => $r['detail'] ]
                ];
                if ($statusCode == 200){
                    Log::info(print_r('手続送信に成功しました', true));
                    $returnData[0] = true;
                    $this->TableInsert($r);
                    break;
                }else{
                    Log::error("返却値エラー：申請データ送信に失敗しました");
                    break;
                }
            }
        }
        return $returnData;
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
     
    //develop用
    public function TestMixEgovSigner() 
    {
        //filled-out-ledgerにdeveで利用できる署名情報抜きのxmlファイルを入れる
        //完了したら、手動で署名情報を正規の形に改行を直す
        Log::info(print_r('TestMixEgovSigner実行', true));
        $this->procedureId = '4950013520974000';
        $signer = new Signer();
        $signer->makeDir();
        $this->folderPath = $signer->getPath();
        $this->signerFolderPath = $this->folderPath . '/zip';
        $this->getPfx();
        $this->files_copy();
        $signerBool = $signer->run($this->signerFolderPath, $this->pfxFilepath, $this->password);
        if ( $signerBool==False ) {
            Log::error("署名に失敗しました");
        }else{
            Log::info(print_r('署名に成功しました', true));
        }
        $base64Data = $this->zipBinary();
        $send_file = new \stdClass();
        $send_file->file_name = $this->procedureId . '.zip';
        $send_file->file_data = $base64Data;

        $counter = 0;
        while (True){
            $counter++;
            $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
            $api = Egov::accessToken($account->access_token);
            $r = $api->ApplicationDataTransmission($this->procedureId, $send_file);
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            if (empty($body)) {
                if ( $counter > 3 ){
                    Log::error("申請データ送信に失敗しました");
                    break;
                }
                $this->useRefreshToAccess();
            } else {
                Log::info(print_r('▼▼申請データ送信返却値▼▼', true));
                Log::info(print_r($r, true));
                break;
            }
        }
    }

    //develop用 署名作成済みxmlを元に成功再現
    public function devSosin()
    {
        //ledger/dev/zipを作成し、署名済xmlを配置
        //run内で$this->devSosin();実行
        $this->procedureId = "4950013520974000";//要変更
        $zipfilepath = Storage::path('ledger/tmp/zip.zip');
        $this->folderPath = Storage::path('ledger/dev');//参照フォルダ
        $this->zipBinary();
        $base64Data = base64_encode(file_get_contents($zipfilepath));
        $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
        $send_file = new \stdClass();
        $send_file->file_name = $this->procedureId . '.zip';
        $send_file->file_data = $base64Data;
        $api = Egov::accessToken($account->access_token);

        $r = $api->ApplicationDataTransmission($this->procedureId, $send_file);
        $guzzleResponse = $r->toPsrResponse();
        $statusCode = $guzzleResponse->getStatusCode();
        if ($statusCode == 200){
            Log::info(print_r('申請データ送信が完了しました', true));
            $this->TableInsert($r);
        }else{
            Log::error("申請データ送信に失敗しました");
        }
        Log::info(print_r($r, true));
    }
}
