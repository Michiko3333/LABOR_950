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
use Illuminate\Support\Facades\Storage;
use App\EgovAPI\Egov;
use App\EgovAPI\EgovTestLog;
use App\Http\Controllers\FinalExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MixXmlEgovSigner
{
    private $companyId;
    private $employeeId;
    private $password;
    private $pfxFilepath;
    private $procedureId;
    private $signer;
    private $workingDirectory;
    private $afterLedgerPath;
    private $roleId;
    private array $applicantRequiredColumns = [
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'post_code',
        'address_prefecture',
        'address_city',
        'address_ward',
        'address_prefecture_kana',
        'address_city_kana',
        'address_ward_kana',
        'tel_area_code',
        'tel_city_code',
        'tel_subscriber_code',
    ];
    private string $contactRequiredColumn = 'mail_address';

    /* -- 引数説明 --
     * 通常利用は$requestのみ設定
     * コマンド利用時には$request=nullかつ、$companyIdを設定
    */
    public function __construct(Request $request = null, int $companyId = null)
    {
        if ($request != null || $companyId === null) {
            $this->employeeId = ($request->session()->get('permissions')['employee_id']);
            $this->roleId = ($request->session()->get('permissions')['role_id']);
            if ($this->roleId === 999 || $this->roleId == 500) {
                $this->companyId = ($request->session()->get('company_id'));
            } else {
                $this->companyId = Branch::where('id', Employee::where('id', $this->employeeId)->value('branch_id'))->value('company_id');
            }
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

    /**
     * 送られたrequestデータを元に申請を行う
     *
     * @param Request $request
     * @param bool $separate|null Trueにすることで個別ファイル署名形式として送信,引数なしで標準形式での送信
     * @param string $csvText|null csv帳票の申請に必要
     * @return array [bool, string]申請可否とエラーメッセージ
     */
    public function run(Request $request, bool $separater = False, string $csvText = null): array
    {
        try {
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
        } catch (\Throwable $t) {
            return [false, $t->getMessage()];
        }
    }

    /**
     * 取得したレコードの申請者または連絡先情報の必須カラムをチェック
     *
     * @param stdClass $data 取得したレコード
     * @param bool|null $contactflg　trueのときに連絡先情報のカラムを追加してチェック
     */
    private function dbDataCheck(\stdClass $data, bool $contactflg = false)
    {
        $checkType = '申請者';
        if ($contactflg === True) {
            array_push($this->applicantRequiredColumns, $this->contactRequiredColumn);
            $checkType = '連絡先';
        }
        $missingFields = array_filter($this->applicantRequiredColumns, function ($field) use ($data) {
            return !isset($data->$field) || is_null($data->$field);
        });
        if (!empty($missingFields)) {
            $mes = $checkType . '情報の必須項目にnullが入っています';
            \Log::error($mes);
            throw new \Exception($mes . ': ' . implode(', ', $missingFields));
        }
    }

    // requestに沿ってxmlファイルを編集
    public function xmlInput(Request $request, bool $separater)
    {
        try {
            // 今後、代表取締役を選定する場合は、employee_type=1（代表取締役）の社員のうち選定したidの情報を取得予定
            $companyData = DB::table('m_company')
                ->where('m_company.id', $this->companyId)
                ->join('m_branch', function ($join) {
                    $join->on('m_company.id', '=', 'm_branch.company_id')
                        ->where('m_branch.branch_type', 1);
                })
                ->join('m_employee', function ($join) {
                    $join->on('m_branch.id', '=', 'm_employee.branch_id')
                        ->where('m_employee.employee_type', 1);
                })
                ->join('m_prefecture', 'm_branch.address_prefecture', '=', 'm_prefecture.id')
                ->leftJoin('m_managerial_position', 'm_employee.managerial_position_id', '=', 'm_managerial_position.id')
                ->select(
                    'm_employee.id',
                    'm_employee.last_name',
                    'm_employee.first_name',
                    'm_employee.last_name_kana',
                    'm_employee.first_name_kana',
                    'm_employee.division_name',
                    'm_employee.division_name_kana',
                    'm_managerial_position.name AS managerial_position_name',
                    'm_company.name AS company_name',
                    'm_company.name_kana AS company_name_kana',
                    'm_branch.post_code',
                    'm_prefecture.name AS address_prefecture',
                    'm_branch.address_city',
                    'm_branch.address_ward',
                    'm_branch.address_apartment',
                    'm_prefecture.name_kana AS address_prefecture_kana',
                    'm_branch.address_city_kana',
                    'm_branch.address_ward_kana',
                    'm_branch.address_apartment_kana',
                    'm_branch.fax',
                    'm_branch.mail_address',
                    'm_branch.tel_area_code',
                    'm_branch.tel_city_code',
                    'm_branch.tel_subscriber_code'
                )
                ->first();
            $this->dbDataCheck($companyData);
            $request->merge([
                'applicant_name' => $companyData->last_name . '　' . $companyData->first_name,
                'applicant_name_kana' => $companyData->last_name_kana . '　' . $companyData->first_name_kana,
                'applicant_managerial_position' => $companyData->managerial_position_name,
                'applicant_corporate_name' => $companyData->company_name,
                'applicant_corporate_name_kana' => $companyData->company_name_kana,
                'applicant_division_name' => $companyData->division_name,
                'applicant_division_name_kana' => $companyData->division_name_kana,
                'applicant_post_code' => $companyData->post_code,
                'applicant_address' => $companyData->address_prefecture . $companyData->address_city . $companyData->address_ward . $companyData->address_apartment,
                'applicant_address_kana' => $companyData->address_prefecture_kana . $companyData->address_city_kana . $companyData->address_ward_kana . $companyData->address_apartment_kana,
                'applicant_tel' => $companyData->tel_area_code . '-' . $companyData->tel_city_code . '-' . $companyData->tel_subscriber_code,
                'applicant_fax' => $companyData->fax,
                'applicant_email_address' => $companyData->mail_address,
            ]);
            // 連絡先情報の設定　社労士
            if ($this->roleId == 500) {
                $laborData = DB::table('m_employee')->where('m_employee.id', $this->employeeId)
                    ->join('m_branch', 'm_employee.branch_id', '=', 'm_branch.id')
                    ->join('m_company', 'm_branch.company_id', '=', 'm_company.id')
                    ->leftJoin('m_managerial_position', function ($join) {
                        $join->on('m_employee.managerial_position_id', '=', 'm_managerial_position.id')
                            ->whereNotNull('m_employee.managerial_position_id');
                    })
                    ->join('m_prefecture', 'm_branch.address_prefecture', '=', 'm_prefecture.id')
                    ->select(
                        'm_employee.id',
                        'm_employee.last_name',
                        'm_employee.first_name',
                        'm_employee.last_name_kana',
                        'm_employee.first_name_kana',
                        'm_employee.division_name',
                        'm_employee.division_name_kana',
                        DB::raw('IFNULL(m_managerial_position.name, null) AS managerial_position_name'),
                        'm_company.name AS company_name',
                        'm_company.name_kana AS company_name_kana',
                        'm_branch.post_code',
                        'm_prefecture.name AS address_prefecture',
                        'm_branch.address_city',
                        'm_branch.address_ward',
                        'm_branch.address_apartment',
                        'm_prefecture.name_kana AS address_prefecture_kana',
                        'm_branch.address_city_kana',
                        'm_branch.address_ward_kana',
                        'm_branch.address_apartment_kana',
                        'm_branch.fax',
                        'm_branch.mail_address',
                        'm_branch.tel_area_code',
                        'm_branch.tel_city_code',
                        'm_branch.tel_subscriber_code'
                    )
                    ->first();
                $this->dbDataCheck($laborData, true);
                $request->merge([
                    'contact_name' => $laborData->last_name . '　' . $laborData->first_name,
                    'contact_name_kana' => $laborData->last_name_kana . '　' . $laborData->first_name_kana,
                    'contact_managerial_position' => $laborData->managerial_position_name,
                    'contact_corporate_name' => $laborData->company_name,
                    'contact_corporate_name_kana' => $laborData->company_name_kana,
                    'contact_division_name' => $laborData->division_name,
                    'contact_division_name_kana' => $laborData->division_name_kana,
                    'contact_post_code' => $laborData->post_code,
                    'contact_address' => $laborData->address_prefecture . $laborData->address_city . $laborData->address_ward . $laborData->address_apartment,
                    'contact_address_kana' => $laborData->address_prefecture_kana . $laborData->address_city_kana . $laborData->address_ward_kana . $laborData->address_apartment_kana,
                    'contact_tel' => $laborData->tel_area_code . '-' . $laborData->tel_city_code . '-' . $laborData->tel_subscriber_code,
                    'contact_fax' => $laborData->fax,
                    'contact_email_address' => $laborData->mail_address,
                ]);
            } else {
                // 連絡先情報の設定　会社情報
                $this->dbDataCheck($companyData, true);
                $request->merge([
                    'contact_name' => $companyData->last_name . '　' . $companyData->first_name,
                    'contact_name_kana' => $companyData->last_name_kana . '　' . $companyData->first_name_kana,
                    'contact_managerial_position' => $companyData->managerial_position_name,
                    'contact_corporate_name' => $companyData->company_name,
                    'contact_corporate_name_kana' => $companyData->company_name_kana,
                    'contact_division_name' => $companyData->division_name,
                    'contact_division_name_kana' => $companyData->division_name_kana,
                    'contact_post_code' => $companyData->post_code,
                    'contact_address' => $companyData->address_prefecture . $companyData->address_city . $companyData->address_ward . $companyData->address_apartment,
                    'contact_address_kana' => $companyData->address_prefecture_kana . $companyData->address_city_kana . $companyData->address_ward_kana . $companyData->address_apartment_kana,
                    'contact_tel' => $companyData->tel_area_code . '-' . $companyData->tel_city_code . '-' . $companyData->tel_subscriber_code,
                    'contact_fax' => $companyData->fax,
                    'contact_email_address' => $companyData->mail_address,
                ]);
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
            foreach ($files as $file) {
                $xml = new \DOMDocument();
                $xml->load($file);
                $xpath = new \DOMXPath($xml);

                foreach ($request->all() as $key => $value) {
                    if (isset($requestData['certificate_checkbox_1'])) {
                        continue;
                    } else if (isset($requestData['certificate_checkbox_2'])) {
                        continue;
                    }
                    $keyName = substr($key, 1);
                    $query = "//*[contains(text(), '$keyName')]";
                    $targetElements = $xpath->query($query);
                    foreach ($targetElements as $element) {
                        if ($key == ($element->nodeValue)) {
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
                        if ($attachmentPath == []) {
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
                    if ($tempFileName == $outputFileName) {
                        $xmlA->load($templateFile);
                        break;
                    }
                }
                $xmlB->load($file);
                $xpathA = new \DOMXPath($xmlA);
                $xpathB = new \DOMXPath($xmlB);
                // 変換対象にならないタグ一覧、全帳票共通で固定値があれば追加
                $ignoreTags = [
                    '様式ID',
                    '様式バージョン',
                    'STYLESHEET',
                    '受付行政機関ID',
                    '手続ID',
                    '手続名称',
                    '申請種別',
                    '申請書様式ID',
                    '申請書様式バージョン',
                    '申請書様式名称',
                    '申請書ファイル名称',
                    '様式コピー情報',
                    'Doctype',
                    '帳票種別',
                    '給付金の種類',
                    'Xmit',
                    '添付種別',
                    '添付書類名称',
                    '添付書類ファイル名称',
                    '提出情報'
                ];
                // 最奥部のネストの値のみを取得
                $valuesA = [];
                // ネストがない要素を選択
                $elementsA = $xpathA->query('//*[not(*) and normalize-space()]');
                foreach ($elementsA as $element) {
                    $valuesA[] = $element->nodeValue;
                }
                foreach ($valuesA as $valueA) {
                    // 値からタグをサーチ
                    $querySerch = "//*[text()='{$valueA}']";
                    $targetElementsSerch = $xpathA->query($querySerch);
                    $elementSerch = $targetElementsSerch->item(0);
                    // 値よりタグ名取得
                    $tagName = $elementSerch->nodeName;
                    // 比較しないタグであれば次へ
                    if (in_array($tagName, $ignoreTags)) {
                        continue;
                    }
                    // Bにサーチしたタグがあるか調べる
                    $queryB = "//{$tagName}/text()";
                    $targetElementsSerchB = $xpathB->query($queryB);
                    foreach ($targetElementsSerchB as $elementB) {
                        // Bの値を取得
                        $tagValueB = $elementB->nodeValue;
                        if ($valueA == $tagValueB) {
                            $elementB->nodeValue = "";
                        }
                    }
                }
                $xmlB->save($file);
                EgovTestLog::info(print_r($file . 'のデータ変換が成功しました', true));
            }
            return $outputPath;
        } catch (\Throwable $t) {
            $mes = "申請ファイルの作成に失敗しました。登録しているデータを確認してください。";
            \Log::error(print_r($mes . ($t->__toString()), true));
            throw new \Exception($mes, 0, $t);
        }
    }

    // フォルダーごと再帰コピー
    function copyFolder($source, string $destination)
    {
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
    function getAllFilesInFolder(string $folderPath)
    {
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
        try {
            $selectCompanyId = $this->companyId;
            $pfx = Certificate::where('company_id', $selectCompanyId)->where('delete_flg', 0)->select('file', 'password')->first();
            // dd($pfx);
            $binarypfx = $pfx->file;
            $this->password = $pfx->password;
            $this->pfxFilepath = $this->workingDirectory . '/input_xml/certificate.pfx';
            file_put_contents($this->pfxFilepath, $binarypfx);
            EgovTestLog::info(print_r('pfxファイルの復元に成功しました', true));
        } catch (\Throwable $t) {
            $mes = "電子証明書に異常が起きました。電子証明書のファイルを確認してください。";
            \Log::error(print_r($mes . ($t->__toString()), true));
            throw new \Exception($mes, 0, $t);
        }
    }

    //　添付ファイルを/afterSignerフォルダに配置
    public function putAttachment(Request $request)
    {
        if ($request->files->count() !== 0) {
            foreach ($request->file() as $key => $file) {
                $attachment_file_name = $file->getClientOriginalName();
                $putPath = $this->afterLedgerPath . '/afterSigner/zip';
                $putFullPath = $this->workingDirectory . '/afterSigner/zip';
                $file->storeAs($putPath, $attachment_file_name);
                EgovTestLog::info(print_r('添付ファイルを配置しました filename:' . $attachment_file_name, true));

                // ファイルが完全に移動するまでチェック
                $counter = 5;
                while (True) {
                    sleep(1);
                    if (file_exists($putFullPath . '/' . $attachment_file_name)) {
                        break;
                    } else {
                        $counter--;
                        if ($counter == 0) {
                            throw new \Exception('添付ファイルが正しく移動しませんでした');
                        }
                    }
                }
            }
        }
    }

    //署名
    public function egovSigner(bool $separater)
    {
        // 署名用フォルダ
        $afterSignerFolder = $this->workingDirectory . '/afterSigner/zip';
        if ($separater) {
            $serchDirectory = $this->workingDirectory . '/afterSigner/zip/';
            $filenamePattern = 'kousei20' . '*.xml';
            $files = glob($serchDirectory . $filenamePattern);
            \Log::info(is_dir($serchDirectory));
            foreach ($files as $file) {
                $signerBool = $this->signer->run($afterSignerFolder, $this->pfxFilepath, $this->password, basename($file), basename($file));
            }
            if ($signerBool == False) {
                $mes = "e-Gov連携に異常が発生しています。再度eGov連携および電子証明書の登録を行ってください。";
                \Log::error("個別ファイル署名形式の署名に失敗しました" . $mes);
                throw new \Exception($mes, 0);
            } else {
                EgovTestLog::info(print_r('個別ファイル署名形式の署名に成功しました', true));
            }
        } else {
            $signerBool = $this->signer->run($afterSignerFolder, $this->pfxFilepath, $this->password);
            if ($signerBool == False) {
                $mes = "e-Gov連携に異常が発生しています。再度eGov連携および電子証明書の登録を行ってください。";
                \Log::error(print_r("標準形式の署名に失敗しました:" . $mes, true));
                throw new \Exception($mes, 0);
            } else {
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
    public function sendProcedure(string $base64Data)
    {
        $send_file = new \stdClass();
        $send_file->file_name = $this->procedureId . '.zip';
        $send_file->file_data = $base64Data;

        $counter = 0;
        $returnData = [];
        while (True) {
            $counter++;
            $account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
            $api = Egov::accessToken($account->access_token);
            // 送信
            $r = $api->ApplicationDataTransmission($this->procedureId, $send_file);
            $body = $r->body();
            //　返却値が空だった場合、トークン再取得。
            if (empty($body)) {
                if ($counter > 3) {
                    EgovTestLog::error("予期せぬエラー：申請データ送信に失敗しました");
                    EgovTestLog::info(print_r($r->collect(), true));
                    $returnData = [
                        false,
                        ['title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました']
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
                    false,
                    ['title' => '', 'detail' => '']
                ];
                $errorReport = [];
                if ($statusCode == 200) {
                    EgovTestLog::info(print_r($r, true));
                    EgovTestLog::info(print_r('手続送信に成功しました', true));
                    EgovTestLog::info(print_r($r->collect(), true));
                    $returnData[0] = true;
                    $returnData[1]['detail'] = '手続送信に成功しました';
                    $this->TableInsert($r);
                    break;
                } else {
                    EgovTestLog::error("返却値エラー：申請データ送信に失敗しました");
                    EgovTestLog::info(print_r($r->collect(), true));
                    $retunrData[1]['title'] = isset($r['title']) ? $r['title'] : '';
                    $retunrData[1]['detail'] = isset($r['detail']) ? $r['detail'] : '';
                    $index = 0;
                    if (isset($r->collect()['report_list'])) {
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
                    $data = $r->collect();
                    $errorReport[] = "予期せぬエラーが発生しました。";
                    $errorReport[] = "詳細を確認して、システム管理者にお問い合わせ下さい。";
                    foreach ($data as $key => $value) {
                        if (is_array($value)) {
                            $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                        }
                        $errorReport[] = "$key: $value";
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
        if ($result['apply_pay_list'] == []) {
            $apply_pay_list = null;
        } else {
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
    public function transformEmptyTags(string $targetPath)
    {
        $xmlContent = file_get_contents($targetPath);
        // 変換対象
        $elements = [
            '役職',
            '法人団体名',
            '法人団体名フリガナ',
            '部門名',
            '部門名フリガナ',
            '郵便番号',
            '住所',
            '住所フリガナ',
            '電話番号',
            'FAX番号',
            '電子メールアドレス',
        ];

        // マッチする行を置換して変換
        foreach ($elements as $element) {
            $xmlContent = preg_replace(
                '/([\t ]+)<' . $element . ' \/>([\t ]*)/sU',
                '$1<' . $element . '></' . $element . '>$2',
                $xmlContent
            );
        }
        if (isset($xmlContent)) {
            file_put_contents($targetPath, $xmlContent);
            EgovTestLog::info('申請データ用のタグ変換が行われました');
        }
    }

    // csvファイルの配置と添付情報の付与
    public function putcsv(string $csvText = null)
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
     *
     * @param string $directory フォルダパス
     * @param string $tagName タグ名
     * @param string $tagValue タグ値
     * @return string|array|null 一致パスが一つであればパスを返し、複数あれば配列で返す
     */
    public function getAttachmentSignPath(string $directory, string $tagName, string $tagValue): string|array
    {
        function checkTagValue($node, $tagName, $tagValue)
        {
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
     *  標準：ledger/dev/zip
     *  個別：dev_separate
     *  共通：zip置き場のledgertmpフォルダ
     */
    public function runExam(string $proc_id, int $signerNUM = 1, int $examNo)
    {
        EgovTestLog::info(print_r('******************************** MixEgovSigner exam start ********************************', true));
        EgovTestLog::info(print_r($this->workingDirectory . $this->afterLedgerPath, true));

        if ('getPfx' && $signerNUM != 9) {
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
        if ('copy' && $signerNUM != 9) {
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
        if ('egovSigner' && $signerNUM != 9) {
            $signer = new Signer();
            if ($signerNUM == 2) {
                $filenamePattern = 'kousei' . date("Y") . '*.xml';
                $files = glob($signerFolderPath . $filenamePattern);
                $signerTargetPath = $files[0];
                rename($signerFolderPath . 'kousei.xml', $signerFolderPath . 'kousei_tmp.xml');
                rename($signerTargetPath, $signerFolderPath . 'kousei.xml');
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                rename($signerFolderPath . 'kousei.xml', $signerTargetPath);
                rename($signerFolderPath . 'kousei_tmp.xml', $signerFolderPath . 'kousei.xml');
                if ($signerBool == False) {
                    EgovTestLog::error("個別ファイル署名形式の署名に失敗しました");
                } else {
                    EgovTestLog::info(print_r('個別ファイル署名形式の署名に成功しました', true));
                }
            } elseif ($signerNUM == 1) {
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                if ($signerBool == False) {
                    EgovTestLog::error("標準形式の署名に失敗しました");
                } else {
                    EgovTestLog::info(print_r('標準形式の署名に成功しました', true));
                }
            } elseif ($signerNUM == 3) {
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                $signerBool = $signer->run($signerFolderPath, $this->pfxFilepath, $this->password);
                if ($signerBool == False) {
                    EgovTestLog::error("標準形式の連署式署名に失敗しました");
                } else {
                    EgovTestLog::info(print_r('標準形式の連署式署名に成功しました', true));
                }
            }
            $kouseiFilePath = $signerFolderPath . "kousei.xml";
            $this->transformEmptyTags($kouseiFilePath);
        }

        //zip圧縮後、base64バイナリデータを返す
        if ('zipBinary') {
            if ($signerNUM == 9) {
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
            while (True) {
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
                    if ($counter > 3) {
                        EgovTestLog::error("予期せぬエラー：申請データ送信に失敗しました");
                        EgovTestLog::info(print_r($r->collect(), true));
                        $returnData = [
                            false,
                            ['title' => '予期せぬエラー', 'detail' => '申請データ送信に失敗しました']
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
                    if ($statusCode == 200) {
                        EgovTestLog::info(print_r($r, true));
                        EgovTestLog::info(print_r('手続送信に成功しました', true));
                        EgovTestLog::info(print_r($r->collect(), true));
                        $this->TableInsert($r);
                        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
                        }, $r->collect());
                        $response = $decodedTitle;
                        break;
                    } else {
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
