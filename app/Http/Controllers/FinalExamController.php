<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\EgovAPI\Egov;
use App\EgovAPI\EgovTestLog;
use App\EgovAPI\APIs\RefreshAPI;
use App\Models\Egov_account;
use App\Models\CurrentUser;
use App\Http\Controllers\EgovController;
use App\EgovAPI\LedgerIssues;
use UnderflowException;
use Illuminate\Support\Facades\Storage;
use ReflectionClass;

use App\EgovAPI\EgovDebug;

class FinalExamController extends Controller
{
    // ユーザー認可 + アクセストークン取得
    public function get_auth(Request $request)
    {
        $title = 'ユーザー認可';
        EgovTestLog::info(print_r('request:' . $request, true));
        $company = CurrentUser::currentCompany();
        $company_id = $company->id;

        $auth = Egov::getAuth([
            'state' => $company_id
        ]);
        EgovTestLog::info(print_r($title . 'response: ' . $auth, true));
        return redirect($auth);
    }

    // アクセストークン再取得
    public function getReToken(Request $request)
    {
        $title = "アクセストークン再取得";
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->getToken();

        $guzzleResponse  = $r->toPsrResponse();
        $headers = $guzzleResponse->getHeaders();
        $headersText = '';
        foreach ($headers as $name => $values) {
            $headersText .= $name . ': ' . implode(",\n", $values) . "\n";
        }
        EgovTestLog::info(print_r($title . ' :' . $headersText, true));

        EgovTestLog::info(print_r($title . '返却値: ' . $r, true));
        $access_token = $r['access_token'];
        $refresh_token = $r['refresh_token'];

        $account->access_token = $access_token;
        $account->refresh_token = $refresh_token;
        $account->delete_flg = 0;
        $account->save();
        EgovTestLog::info(print_r('リフレッシュトークンよりアクセストークンの再取得に成功しました', true));
        return $r->collect();
    }

    // アクセストークン再取得　artisanコマンド
    public static function getReToken_command($companyId, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->getToken();

        $body = self::logoutput($r, $examNo);
        $access_token = $r['access_token'];
        $refresh_token = $r['refresh_token'];

        $account->access_token = $access_token;
        $account->refresh_token = $refresh_token;
        $account->delete_flg = 0;
        $account->save();
        return $body;
    }

    // ログアウト
    public function logout(Request $request)
    {
        $title = 'ログアウト';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->logout();
        $guzzleResponse  = $r->toPsrResponse();
        $headers = $guzzleResponse->getHeaders();
        $headersText = '';
        foreach ($headers as $name => $values) {
            $headersText .= $name . ': ' . implode(",\n", $values) . "\n";
        }
        EgovTestLog::info(print_r($title . ' :' . $headersText, true));
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // ログアウト　artisanコマンド
    public static function logout_command($companyId, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $r = Egov::refreshToken($account['refresh_token'])->logout();
        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 申請案件一覧取得
    // 送信番号から取得する場合はsend_numberを設定
    public function getlist(Request $request, $send_number = null)
    {
        $title = '申請案件一覧取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        if ($send_number == null) {
            $r = $api->getListApplications(null, '2000-01-01', '2050-01-01', 50, 0);
        } else {
            $r = $api->getListApplications($send_number);
        }
        $headers = getallheaders();
        EgovTestLog::info(print_r($headers, true));
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 申請案件一覧取得　artisanコマンド
    public static function getlist_command($companyId, $examNo)
    {
        $date_from = '2024-05-16';
        $today = new \DateTime();
        $date_to = $today->format('Y-m-d');

        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getListApplications(null, $date_from, $date_to, 50, 0);
        $body = self::logoutput($r, $examNo);

        return $body;
    }

    // 申請案件取得
    public function get_matter_filing(Request $request, $arrive_id)
    {
        $title = '申請案件取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getMatterFiling($arrive_id);
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 申請案件取得　artisanコマンド
    public static function get_matter_filing_command($companyId, $arrive_id, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getMatterFiling($arrive_id);
        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 公文書取得
    public function get_official_document(Request $request, $arrive_id, $notice_sub_id = 1)
    {
        $title = '公文書取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getOfficialDocument($arrive_id, $notice_sub_id);
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 公文書取得　artisanコマンド
    public static function get_official_document_commnad($companyId, $arrive_id, $notice_sub_id, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getOfficialDocument($arrive_id, $notice_sub_id);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 公文書取得完了
    public function registerDatetimeOfOfficialDocument(Request $request, $arrive_id)
    {
        $title = '公文書取得完了';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $notice_sub_id = 1;
        $r = $api->registerDatetimeOfOfficialDocument($arrive_id, $notice_sub_id);
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
        return redirect()->route('finalexam.index');
    }

    // 公文書取得完了　artisanコマンド
    public static function registerDatetimeOfOfficialDocument_command($companyId, $arrive_id, $notice_sub_id, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        // $notice_sub_id = 1;
        $r = $api->registerDatetimeOfOfficialDocument($arrive_id, $notice_sub_id);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 公文書署名検証要求
    public function signatureVerification(Request $request)
    {
        $title = '公文書署名検証要求';
        $file_name = "test";
        $zipfilepath = storage_path('/koubunsho.zip');
        $file_data = base64_encode(file_get_contents($zipfilepath));

        $file_data = $file_data;

        $sig_verification_xml_file_name = "filename";
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->signatureVerification($file_name, $file_data, $sig_verification_xml_file_name);
        $status = $r->status();
        EgovTestLog::info(print_r($title . 'status: ' . $status, true));
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 公文書署名検証要求　artisanコマンド
    public static function signatureVerification_command($companyId, $examNo)
    {
        $file_name = "koubunsho.zip";
        $zipfilepath = Storage::path('egov-test/koubunsho.zip');
        echo $zipfilepath;
        $file_data = base64_encode(file_get_contents($zipfilepath));

        $file_data = $file_data;

        $sig_verification_xml_file_name = "official_doc4.xml";
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->signatureVerification($file_name, $file_data, $sig_verification_xml_file_name);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 申請案件に関する通知一覧取得
    public function get_notification_list(Request $request)
    {
        $title = '申請案件に関する通知一覧取得';
        $date_from = '2024-05-16';
        $today = new \DateTime();
        $date_to = $today->format('Y-m-d');
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getNotificationList($date_from, $date_to, 50, 0);
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 申請案件に関する通知一覧取得　artisanコマンド
    public static function get_notification_list_command($companyId, $examNo)
    {
        $title = '申請案件に関する通知一覧取得';
        $date_from = '2024-05-16';
        $today = new \DateTime();
        $date_to = $today->format('Y-m-d');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getNotificationList($date_from, $date_to, 50, 0);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 申請案件に関する通知取得
    public function getNotificationInformation(Request $request, $arrive_id)
    {
        $title = '申請案件に関する通知取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $notice_sub_id = 1;
        $r = $api->getNotificationInformation($arrive_id, $notice_sub_id);
        EgovTestLog::info(print_r($title . 'response: ' . $r, true));
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 申請案件に関する通知取得　artisanコマンド
    public static function getNotificationInformation_command($companyId, $arrive_id, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $notice_sub_id = 1;
        $r = $api->getNotificationInformation($arrive_id, $notice_sub_id);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // アクセストークン検証（アクセストークン）
    public function tokenIntrospect(Request $request)
    {
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->tokenIntrospect();
        EgovTestLog::info(print_r($title . '返却値: ' . $r, true));
        return $r->collect();
    }

    // アクセストークン検証（アクセストークン＆リフレッシュトークン）　artisanコマンド
    public static function tokenIntrospect_command($companyId, $refreshflag = False, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        if ($refreshflag == False) {
            $api = Egov::accessToken($account->access_token);
        } else {
            $api = Egov::accessToken($account->refresh_token);
        }
        $r = $api->tokenIntrospect();

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // アクセストークン検証（リフレッシュトークン）
    public function retokenIntrospect(Request $request)
    {
        $title = 'アクセストークン検証（リフレッシュトークン）';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->refresh_token);
        $r = $api->tokenIntrospect();
        EgovTestLog::info(print_r($title . '返却値: ' . $r, true));
        return $r->collect();
    }

    // ログアウト後のアクセストークン検証（リフレッシュトークン）　artisanコマンド
    public static function logoutRetokenIntrospect($companyId, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->refresh_token);
        $r = $api->tokenIntrospect();

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 手続に関するご案内一覧取得
    public function getGuideList(Request $request)
    {
        $title = '手続に関するご案内一覧取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getGuideList('2000-01-01', '2050-01-01', 50, 0);
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true));
        return $decodedTitle;
    }

    // 手続に関するご案内一覧取得　artisanコマンド
    public static function getGuideList_command($companyId, $examNo)
    {
        $title = '手続に関するご案内一覧取得';
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getGuideList('2000-01-01', '2050-01-01', 50, 0);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 手続に関するご案内取得
    public function getInformation(Request $request, $information_id)
    {
        $title = '手続に関するご案内取得';
        $companyId = $request->session()->get('company_id');
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getInformation($information_id);
        $decodedTitle = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $r->collect());
        EgovTestLog::info(print_r($title . '返却値: ' . $decodedTitle, true,), $logpath);
        return $decodedTitle;
    }

    // 手続に関するご案内取得　artisanコマンド
    public static function getInformation_command($companyId, $information_id, $examNo)
    {
        $title = '手続に関するご案内取得';
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->getInformation($information_id);

        $body = self::logoutput($r, $examNo);
        return $body;
    }

    // 手続選択　artisanコマンド
    public static function procedureSelection_command($companyId, $proc_id, $toZipFlag = False, $examNo)
    {
        $account = Egov_account::where('company_id', $companyId)->where('delete_flg', 0)->first();
        $api = Egov::accessToken($account->access_token);
        $r = $api->procedureSelection($proc_id);
        $body = self::logoutput($r, $examNo);

        if ($toZipFlag == True) {
            $binaryData = $r['results']['file_data'];
            $decodedData = base64_decode($binaryData);
            $zipfilepath = Storage::path('egov-test/test.zip');
            file_put_contents($zipfilepath, $decodedData);
            return 'done';
        }

        return $body;
    }

    // base64エンコードされたバイナリデータを保存　artisanコマンド
    public static function binaryToZip($binaryData = '')
    {
        if ($binaryData == '') {
            $binaryData = '';
        }
        $decodedData = base64_decode($binaryData);
        $zipfilepath = storage_path('/test.zip');
        file_put_contents($zipfilepath, $decodedData);
        return 'binaryToZip done';
    }

    // ログ出力用専用メソッド
    public static function logoutput($r, $examNo)
    {
        $body = EgovDebug::recordResponse($r);
        EgovDebug::output($examNo);

        return $body;
    }

    // zipからバイナリデータ取得
    public function getbinary(Request $request)
    {
        $zipfilepath = storage_path('/koubunsho.zip');
        $base64Data = base64_encode(file_get_contents($zipfilepath));
        dd($base64Data);
    }
}
