<?php

namespace App\EgovAPI;

use App\EgovAPI\Egov;
use App\EgovAPI\EgovTestLog;
use App\Models\Egov_account;

class LedgerIssues
{
    private $companyId;
    private $api;
    private $account;

    public function __construct($request)
    {
        $this->companyId = $request->session()->get('company_id');
        $this->account = Egov_account::where('company_id', $this->companyId)->where('delete_flg', 0)->first();
    }

     /**
     * リフレッシュトークンを利用したアクセストークンの再取得
     */
    public function useRefreshToAccess()
    {
        $r = Egov::refreshToken($this->account['refresh_token'])->getToken();
        EgovTestLog::info(print_r('トークンを取得 返却値: ' . $r, true));
        $access_token = $r['access_token'];
        $refresh_token = $r['refresh_token'];
        $this->account->access_token = $access_token;
        $this->account->refresh_token = $refresh_token;
        $this->account->delete_flg = 0;
        $this->account->save();
    }

     /**
     * 申請案件一覧取得 を呼び出す
     * @return array|null 申請案件一覧の情報
     *                      配列の各要素は以下のキーを持つ:
     *                      - string 'status': ステータス
     *                      - string 'arrive_id': 到達番号 半角数字
     *                      - date 'arrive_date': 到達日時 YYYY-MM-DD HH:MM:SS
     *                      - string 'corporation_name': 法人名
     *                      - string 'applicant_name': 申請者名
     *                      - string 'proc_name': 申請案件の手続名
     *                      - string 'submission_destination': 提出先
     *                      - string 'pay_status': 納付状況
     *                      - int 'apply_pay_count': 納付待ち件数
     *                      - int 'notice_count': 補正通知件数
     *                      - int 'doc_count': 公文書件数
     *                  例:
     *                   [
     *                     ['status' => '到達', 'arrive_id' => '202405141845246984',....
     *                     ['status' => '手続終了', 'arrive_id' => '202405141845246989',....
     *                   ]
     */
    public function getListApplications()
    {
        $title = "申請案件一覧取得";
        $counter = 0;
        $returnData = [];
        while (True){
            $counter++;
            $this->api = Egov::accessToken($this->account->access_token);
            $r = $this->api->getListApplications(null, '2000-01-01', '2050-01-01', 50, 0);
            // dd($r);
            // $response = $r->toPsrResponse();
            // dd($response);
            $guzzleResponse  = $r->toPsrResponse();
            // dd($guzzleResponse);
            $headers = $guzzleResponse->getHeaders();
            EgovTestLog::info(print_r('*******' . json_encode($headers), true));
            $headers = getallheaders();
            dd($headers);
            // $body = $response->getBody()->getContents();
            if (empty($body)) {
                if ( $counter > 3 ) {
                    EgovTestLog::error('返却値が空、もしくは' . $title . 'に失敗しました。：' . $r->collect());
                    return null;
                }
                $this->useRefreshToAccess();
            } else {
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                if ($statusCode == 200) {
                    EgovTestLog::info(print_r($title . 'に成功しました', true));
                    EgovTestLog::info(print_r($r, true));
                    EgovTestLog::info(print_r($r->collect(), true));
                    $lists = $r->collect()->get('results')['apply_list'];
                    foreach ($lists as $list){
                        $returnData[] = ['status' => $list['status'],
                                         'arrive_id' => $list['arrive_id'],
                                         'arrive_date' => $list['arrive_date'],
                                         'corporation_name' => $list['corporation_name'],
                                         'applicant_name' => $list['applicant_name'],
                                         'proc_name' => $list['proc_name'],
                                         'submission_destination' => $list['submission_destination'],
                                         'pay_status' => $list['pay_status'],
                                         'apply_pay_count' => $list['apply_pay_count'],
                                         'notice_count' => $list['notice_count'],
                                         'doc_count' => $list['doc_count'],
                                        ];
                    }
                    return $returnData;
                } else {
                    EgovTestLog::error('返却値エラー：' . $title . 'に失敗しました');
                    EgovTestLog::info(print_r($r->collect(), true));
                    return null;
                }
            }
        }
    }

     /**
     * 申請案件取得 を呼び出す
     * このメソッドは、申請案件を取得し、それを配列として返します。
     * @param string $arrive_id 到達番号
     * @param string $compare_flag 取得期限の比較フラグ 全公文書取得ダウンロードにのみ使用
     * @return array|null 申請案件の情報
     *                      配列の各要素は以下のキーを持つ:
     *                      - string 'status': ステータス
     *                      - string 'arrive_id': 到達番号 半角数字
     *                      - date 'arrive_date': 到達日時 YYYY-MM-DD HH:MM:SS
     *                      - string 'corporation_name': 法人名
     *                      - string 'applicant_name': 申請者名
     *                      - string 'proc_name': 手続名称
     *                      - string 'submission_destination': 提出先組織
     *                      - array 'official_lists': 公文書情報の配列。各要素は以下のキーを持つ:
     *                          - string 'doc_title': 件名
     *                          - date 'allowed_date': 発出日時 YYYY-MM-DD HH:MM:SS
     *                          - date 'doc_download_expired_date': 取得期限 YYYY-MM-DD HH:MM:SS
     *                          - date 'doc_download_date': 取得日時 YYYY-MM-DD HH:MM:SS
     *                          - string 'sign': 署名有無 ありorなし
     *                          - int 'notice_sub_id': 通知通番
     *                  例:
     *                     ['status' => '到達',....'official_lists' => [
     *                                                  ['doc_title' => '公文書発出通知（トライアル）','allowed_date' =>....],
     *                                                  ['doc_title' => '公文書発出通知（デモ）','allowed_date' =>....]
     *                                              ]
     *                      ]
     */
    public function getMatterFiling($arrive_id, $compare_flag = False)
    {
        $title = "申請案件取得";
        $counter = 0;
        $returnData = [];
        $officialLists = [];
        while (True){
            $counter++;
            $this->api = Egov::accessToken($this->account->access_token);
            $r = $this->api->getMatterFiling($arrive_id);
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            if (empty($body)) {
                if ( $counter > 3 ) {
                    EgovTestLog::error('返却値が空、もしくは' . $title . 'に失敗しました。：' . $r->collect());
                    return null;
                }
                $this->useRefreshToAccess();
            } else {
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                if ($statusCode == 200) {
                    EgovTestLog::info(print_r($title . 'に成功しました', true));
                    EgovTestLog::info(print_r($r, true));
                    EgovTestLog::info(print_r($r->collect(), true));
                    $result = $r->collect()->get('results');
                    $lists = $r->collect()->get('results')['official_list'];
                    foreach ($lists as $list) {
                        // 全公文書取得ダウンロード時に取得期限切れを省く
                        if ($compare_flag==True) {
                            $today = new \DateTime();
                            $today->setTime(0, 0);
                            if ($list['doc_download_expired_date'] >= $today) {
                                continue;
                            }
                        }
                        $officialLists[] = ['doc_title' => $list['doc_title'],
                                        'allowed_date' => $list['allowed_date'],
                                        'doc_download_expired_date' => $list['doc_download_expired_date'],
                                        'doc_download_date' => $list['doc_download_date'],
                                        'sign' => $list['sign'],
                                        'notice_sub_id' => $list['notice_sub_id'],
                                    ];
                    }
                    $returnData[] = ['status' => $result['status'],
                                        'arrive_id' => $result['arrive_id'],
                                        'arrive_date' => $result['arrive_date'],
                                        'corporation_name' => $result['corporation_name'],
                                        'applicant_name' => $result['applicant_name'],
                                        'proc_name' => $result['proc_name'],
                                        'submission_destination' => $result['submission_destination'],
                                        'official_lists' => $officialLists,
                                    ];
                    return $returnData;
                } else {
                    EgovTestLog::error('返却値エラー：' . $title . 'に失敗しました');
                    EgovTestLog::info(print_r($r->collect(), true));
                    return null;
                }
            }
        }
    }

     /**
     * 公文書取得をダウンロードする
     * 公文書APIを呼び出して取得したデータを一時ファイルとして復元し、該当ファイルをユーザー側が保存する
     * @param string $arrive_id 到達番号
     * @param int $notice_sub_id 通知通番
     */
    public function saveOfficialDocument($arrive_id, $notice_sub_id)
    {
        $title = "公文書取得ダウンロード";
        $counter = 0;
        while (True) {
            $counter++;
            $this->api = Egov::accessToken($this->account->access_token);
            $r = $this->api->getOfficialDocument($arrive_id, $notice_sub_id);
            $response = $r->toPsrResponse();
            $body = $response->getBody()->getContents();
            if (empty($body)) {
                if ( $counter > 3 ) {
                    EgovTestLog::error('返却値が空、もしくは' . $title . 'に失敗しました。：' . $r->collect());
                    exit;
                }
                $this->useRefreshToAccess();
            } else {
                $guzzleResponse = $r->toPsrResponse();
                $statusCode = $guzzleResponse->getStatusCode();
                if ($statusCode == 200) {
                    EgovTestLog::info(print_r($title . 'に成功しました', true));
                    EgovTestLog::info(print_r($r, true));
                    EgovTestLog::info(print_r($r->collect(), true));
                    $fileData = $r->collect()->get('results')['file_data'];
                    $fileData = base64_decode($fileData);
                    // 一時ファイルに保存
                    $signer = new Signer();
                    $signer->makeDir();
                    $tempDirectory = $signer->getPath();
                    $filePath = $tempDirectory . '/officialDocument.zip';
                    // ダウンロード処理
                    file_put_contents($filePath, $fileData);
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
                    header('Content-Length: ' . filesize($filePath));
                    header('Pragma: public');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filePath));
                    header('Connection: close');
                    while (ob_get_level()) { ob_end_clean(); }
                    readfile($filePath);
                    $signer->removeDir();
                    exit;
                } else {
                    EgovTestLog::error('返却値エラー：' . $title . 'に失敗しました');
                    EgovTestLog::info(print_r($r->collect(), true));
                    exit;
                }
            }
        }
    }

     /**
     * 全公文書ダウンロード
     * 受け取ったフォルダパスに公文書APIを呼び出して取得したデータをファイル復元して保存する
     * ただし、取得期限が現在日時を過ぎていない公文書に限る
     * @param string $arrive_id 到達番号
     * @return bool 成功時にtrue,失敗時にfalseを返却
     */
    public function allSaveOfficialDocument($arrive_id)
    {
        $title = "全公文書ダウンロード";
        $issuesLists = $this->getMatterFiling($arrive_id, True);
        $signer = new Signer();
        $signer->makeDir();
        $tempDirectory = $signer->getPath();
        try {
            if ($issuesLists !== null) {
                // 申請案件の数分繰り返し
                foreach ($issuesLists as $issuesList) {
                    $lists = $issuesList['official_lists'];
                    // 公文書の数分繰り返し
                    foreach ($lists as $list) {
                        $notice_sub_id = $list['notice_sub_id'];
                        $counter = 0;
                        while (True) {
                            $counter++;
                            $this->api = Egov::accessToken($this->account->access_token);
                            $r = $this->api->getOfficialDocument($arrive_id, $notice_sub_id);
                            $response = $r->toPsrResponse();
                            $body = $response->getBody()->getContents();
                            if (empty($body)) {
                                if ( $counter > 3 ) {
                                    EgovTestLog::error('返却値が空、もしくは' . $title . 'に失敗しました。：' . $r->collect());
                                    throw new \Exception('公文書取得に空、もしくは失敗しました');
                                }
                                $this->useRefreshToAccess();
                            } else {
                                $guzzleResponse = $r->toPsrResponse();
                                $statusCode = $guzzleResponse->getStatusCode();
                                if ($statusCode == 200) {
                                    EgovTestLog::info(print_r($title . 'に成功しました', true));
                                    EgovTestLog::info(print_r($r, true));
                                    EgovTestLog::info(print_r($r->collect(), true));
                                    $fileData = $r->collect()->get('results')['file_data'];
                                    $fileData = base64_decode($fileData);
                                    // 公文書を展開
                                    $zipFilePath = $tempDirectory . '/' . $arrive_id . '_' . $notice_sub_id . '.zip';
                                    file_put_contents($zipFilePath, $fileData);
                                    $extractToFolder = $tempDirectory . '/' . $arrive_id . '_' . $notice_sub_id;
                                    $zip = new \ZipArchive();
                                    if ($zip->open($zipFilePath) === true) {
                                        $zip->extractTo($extractToFolder);
                                        $zip->close();
                                    } else {
                                        throw new \Exception('zipファイルの展開に失敗しました');
                                    }
                                    unlink($zipFilePath);
                                    break;
                                } else {
                                    EgovTestLog::error('返却値エラー：' . $title . 'に失敗しました');
                                    EgovTestLog::info(print_r($r->collect(), true));
                                    throw new \Exception('公文書取得に失敗しました');
                                }
                            }
                        }
                    }
                }

                // 公文書をまとめてzip化
                $zipFilePath = $tempDirectory . '/officialDocument.zip';
                $zip = new \ZipArchive();
                if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
                    $files = new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($tempDirectory),
                        \RecursiveIteratorIterator::LEAVES_ONLY
                    );
                    foreach ($files as $name => $file) {
                        if (!$file->isDir()) {
                            $filePath = $file->getRealPath();
                            $relativePath = substr($filePath, strlen($tempDirectory) + 1);
                            $zip->addFile($filePath, $relativePath);
                        }
                    }
                    $zip->close();
                    EgovTestLog::info(print_r('zipファイル作成に成功しました', true));
                    // ダウンロード処理
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($zipFilePath) . '"');
                    header('Content-Length: ' . filesize($zipFilePath));
                    header('Pragma: public');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($zipFilePath));
                    header('Connection: close');
                    while (ob_get_level()) { ob_end_clean(); }
                    readfile($zipFilePath);
                    $signer->removeDir();
                    exit;
                } else {
                    throw new \Exception("zipファイル作成に失敗しました");
                }
            } else {
                throw new \Exception($title . ':公文書が見つかりません');
            }
        } catch (\Exception $e) {
            echo "エラー: " . $e->getMessage() . "\n";
            $signer->removeDir();
            return false;
        }
    }

     /**
     * 公文書詳細の取得
     * 公文書取得により公文書のbase64エンコードされたバイナリデータを取得し、
     * 取得したデータからファイル名・拡張子・ファイルサイズを取得。
     * @param string $arrive_id 到達番号
     * @param int $notice_sub_id 通知通番
     * @return array|null 展開されたファイルの拡張子とサイズの配列
     *                      配列の各要素は以下のキーを持つ:
     *                      - string 'name': ファイル名(拡張子を省く)
     *                      - string 'extension': ファイルの拡張子
     *                      - string 'size': ファイルサイズ (キロバイト単位)
     *                  例:
     *                   [
     *                     ['name' => 'example', 'extension' => 'txt', 'size' => 1234KB],
     *                     ['name' => 'image', 'extension' => 'png', 'size' => 1.2KB]
     *                   ]
     *                   ZIPファイルの展開に失敗した場合や無効なデータの場合はnullを返します。
     */
    public function getOfficialDocumentData($arrive_id, $notice_sub_id)
    {
        function base64ToTemporaryFile($base64Data) {
            $binaryData = base64_decode($base64Data);
            if ($binaryData === false) {
                throw new \Exception('Base64デコードに失敗しました。');
            }
            $tempFilePath = tempnam(sys_get_temp_dir(), 'zipfile_');
            file_put_contents($tempFilePath, $binaryData);
            return $tempFilePath;
        }

        function extractZipFile($filePath, $extractTo) {
            $zip = new \ZipArchive();
            if ($zip->open($filePath) === TRUE) {
                $zip->extractTo($extractTo);
                $zip->close();
                return true;
            } else {
                return false;
            }
        }

        function getFilesInfo($directory) {
            $filesInfo = [];
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
            foreach ($files as $file) {
                if ($file->isFile()) {
                    $fileInfo = pathinfo($file->getFilename());
                    $fileSizeKB = $file->getSize() / 1024;
                    $fileSizeKB = round($fileSizeKB, 2);
                    $fileSizeKB = $fileSizeKB . 'KB';
                    $filesInfo[] = [
                        'name' => $fileInfo['filename'],
                        'extension' => $fileInfo['extension'] ?? '',
                        'size' => $fileSizeKB
                    ];
                }
            }
            return $filesInfo;
        }

        try {
            $title = '公文書詳細の取得';
            $counter = 0;
            $base64Data = "";
            while (True) {
                $counter++;
                $this->api = Egov::accessToken($this->account->access_token);
                $r = $this->api->getOfficialDocument($arrive_id, $notice_sub_id);
                $response = $r->toPsrResponse();
                $body = $response->getBody()->getContents();
                if (empty($body)) {
                    if ( $counter > 3 ) {
                        EgovTestLog::error('返却値が空、もしくは' . $title . 'に失敗しました。：' . $r->collect());
                        throw new \Exception('公文書取得に空、もしくは失敗しました');
                    }
                    $this->useRefreshToAccess();
                } else {
                    $guzzleResponse = $r->toPsrResponse();
                    $statusCode = $guzzleResponse->getStatusCode();
                    if ($statusCode == 200) {
                        EgovTestLog::info(print_r($title . 'に成功しました', true));
                        EgovTestLog::info(print_r($r, true));
                        EgovTestLog::info(print_r($r->collect(), true));
                        $fileData = $r->collect()->get('results')['file_data'];
                        $base64Data = $fileData;
                        break;
                    } else {
                        EgovTestLog::error('返却値エラー：' . $title . 'に失敗しました');
                        EgovTestLog::info(print_r($r->collect(), true));
                        throw new \Exception('公文書取得に失敗しました');
                    }
                }
            }

            $tempFilePath = base64ToTemporaryFile($base64Data);
            $extractTo = sys_get_temp_dir() . '/extracted_' . uniqid();
            mkdir($extractTo);

            if (extractZipFile($tempFilePath, $extractTo)) {
                $filesInfo = getFilesInfo($extractTo);
                foreach ($filesInfo as $info) {
                    $fileInfoArray[] = [
                        'name' => $info['name'],
                        'extension' => $info['extension'] ?? '',
                        'size' => $info['size']
                    ];
                }
            } else {
                return null;
            }
            unlink($tempFilePath);
            array_map('unlink', glob("$extractTo/*.*"));
            rmdir($extractTo);
            return $fileInfoArray;

        } catch (\Exception $e) {
            echo "エラー: " . $e->getMessage() . "\n";
            return null;
        }
    }
}
