<?php

namespace App\EgovAPI\APIs;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

use App\EgovAPI\APIs\EgovBase;

class AccessAPI extends EgovBase
{
    public function __construct(array $config, string $access_token)
    {
        parent::__construct();
        $this->config = $config;
        $this->access_token = $access_token;
    }

    /**
     * アクセストークン検証（アクセストークン）
     * 取得したアクセストークンまたはリフレッシュトークンの有効性を検証し、トークンに関連付けられている情報を取得する。
     *
     * @return Response | null
     */
    public function tokenIntrospect(): Response|null
    {
        if (!parent::requiredConfig(['client_id', 'api_key']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAccountPath('/auth/token/introspect');

        $form = [
            'token' => $this->access_token,
        ];

        $response = Http::asForm()
            ->withBasicAuth($this->config['client_id'], $this->config['api_key'])
            ->post($path, $form);

        return $response;
    }

    /**
     * 情報共有一覧取得
     * アカウント間情報共有の設定中の情報を応答する。
     *
     * @return Response | null
     */
    public function listShareSetting(): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/share-setting/lists');
        $response = $this->request()->get($path);

        return $response;
    }

    /**
     * 情報共有設定
     * 指定されたアカウント間情報共有の設定を行う。
     *
     * @param string $gbiz_id 共有対象のgBizIDのアカウントID(メールアドレス)
     * @param string $official_doc_permission 公文書に関する権限情報（READ|DOWNLOAD）
     * @param string $post_doc_permission 電子送達の通知文書に関する権限情報（READ|DOWNLOAD）
     * @return Response | null
     */
    public function createShareSetting(string $gbiz_id, $official_doc_permission, $post_doc_permission): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/share-setting');
        $form = [
            'gbiz_id' => $gbiz_id,
            'official_doc_permission' => $official_doc_permission,
            'post_doc_permission' => $post_doc_permission
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 情報共有更新
     * 指定されたアカウント間情報共有の更新を行う
     *
     * @param string $gbiz_id 共有中のgBizIDのアカウントID(メールアドレス)
     * @param string $official_doc_permission 公文書に関する権限情報（READ|DOWNLOAD）
     * @param string $post_doc_permission 電子送達の通知文書に関する権限情報（READ|DOWNLOAD）
     * @return Response | null
     */
    public function updateShareSetting(string $gbiz_id, $official_doc_permission, $post_doc_permission): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/share-setting');
        $form = [
            'gbiz_id' => $gbiz_id,
            'official_doc_permission' => $official_doc_permission,
            'post_doc_permission' => $post_doc_permission
        ];
        $response = $this->request()->put($path, $form);

        return $response;
    }

    /**
     * 情報共有解除
     * 指定されたアカウント間情報共有の解除を行う。
     *
     * @param string $gbiz_id 共有中で解除を実施したいgBizIDのアカウントID(メールアドレス)
     * @return Response | null
     */
    public function deleteShareSetting(string $gbiz_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/share-setting');
        $form = [
            'gbiz_id' => $gbiz_id,
        ];
        $response = $this->request()->delete($path, $form);

        return $response;
    }

    /**
     * 共有設定確認
     * 指定されたアカウント間情報共有の有効化設定を行う。
     *
     * @param string $gbiz_id 共有依頼元のgBizIDのアカウントID(メールアドレス)
     * @return Response | null
     */
    public function shareConfirmation(string $gbiz_id, string $share_acceptance): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/share-confirmation');
        $form = [
            'gbiz_id' => $gbiz_id,
            'share_acceptance' => $share_acceptance
        ];
        $response = $this->request()->delete($path, $form);

        return $response;
    }


    /**
     * 電子送達利用申込み
     * 送信された申請データの形式チェックと電子送達の申込み処理を行い、到達番号等を応答する。
     *
     * @param string $proc_id 手続識別子 (半角英数字, 16文字)
     * @param array $send_file 申請データをZIPファイル形式で圧縮したものを設定
     *                         申請データは構成管理XMLファイル、申請書XMLファイル、添付ファイルを含む連想配列
     * @return Response | null
     */
    public function postApply(string $proc_id, array $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/post-apply');
        $form = [
            'proc_id' => $proc_id,
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 電子送達状況確認
     * 指定した電子送達の申込みの詳細情報を取得する。
     *
     * @param string $arrive_id 到達番号
     * @return Response | null
     */
    public function getPostApply(string $arrive_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/post-apply/' . $arrive_id);
        $response = $this->request()->get($path);

        return $response;
    }

    /**
     * 電子送達一覧取得
     * 期間等を指定して、電子送達に関する一覧情報を取得する。
     * @param string $date_from 取得対象期間開始日 (半角、10桁、YYYY-MM-DD形式)
     * @param string $date_to 取得対象期間終了日 (半角、10桁、YYYY-MM-DD形式)
     * @param int $limit 取得件数 (数字、1-2桁、上限値50)
     * @param int $offset 取得ページ番号 (数字、1-4桁)
     * @return Response | null
     */
    public function listPost(string $date_from, string $date_to, int $limit, int $offset): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/post/lists');
        $form = [
            'date_from' => $date_from,
            'date_to' => $date_to,
            'limit' => $limit,
            'offset' => $offset
        ];
        $response = $this->request()->get($path, $form);

        return $response;
    }

    /**
     * 電子送達取得
     * 指定された電子送達の通知文書を取得する。（半角英数字、1-50桁）
     *
     * @param string $post_id 電子送達識別子
     * @return Response | null
     */
    public function getPost(string $post_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/post/' . $post_id);
        $response = $this->request()->get($path);

        return $response;
    }

    /**
     * 電子送達取得完了
     * 指定された通知文書の取得日時を登録する。
     *
     * @param string $post_id 電子送達識別子 (半角英数字、1-50桁)
     * @return Response|null
     */
    public function getElectronicDeliveryInfo(string $post_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/post');
        $form = [
            'post_id' => $post_id
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    private function request(): PendingRequest
    {
        return Http::withHeaders(['X-eGovAPI-Trial' => $this->config['dev']])->withToken($this->access_token);
    }

    /**
     * 手続選択
     * 事前登録された基本情報と選択された手続識別子をもとに電子申請を行うための申請データ構造として基本情報をセットしたデータ一式を取得する。
     *
     * @param string $proc_id 手続識別子 (半角英数字、16桁)
     * @return Response | null
     */
    public function procedureSelection(string $proc_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/procedure/' . $proc_id);
        $response = $this->request()->get($path);

        return $response;
    }

    /**
     * プレ印字データ取得
     * プレ印字対象手続に対して、府省に問い合わせて、府省に登録されているプレ印字データを取得して返却する。
     *
     * @param array $application_info 申請届出識別情報 (繰り返し回数1～10)
     * @param string $proc_id 手続識別子 (半角英数字、16文字)
     * @param string $form_id 様式ID (半角英数字、18文字)
     * @param int $form_version 様式バージョン (数字、1~9999)
     * @param string $file_data 申請書XMLデータ (半角、バイナリデータはBASE64エンコードしたものを使用する。、<byte> non-empty)
     * @return Response|null
     */
    public function getPrePrintDataAcquisition(array $application_info, string $proc_id, string $form_id, int $form_version, string $file_data): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/preprint');
        $form = [
            'application_info' => $application_info,
            'proc_id' => $proc_id,
            'form_id' => $form_id,
            'form_version' => $form_version,
            'file_data' => $file_data
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 申請データ送信
     * 送信された申請データの形式チェックと申請処理を行い、到達番号等を応答する。
     * ※再提出を行う場合も当APIを使用する。申請するデータの「初回受付番号」には申請受付番号の初回受付時の到達番号、「申請種別」には"再提出"を指定する。設定方法の詳細は、申請データ仕様共通データ仕様書を参照。
     *
     * @param string $proc_id 手続識別子 (半角英数字、16文字)
     * @param object $send_file 申請データをZIPファイル形式で圧縮したものを設定
     *                         申請データは構成管理XMLファイル、申請書XMLファイル、添付ファイル
     * @return Response|null
     */
    public function ApplicationDataTransmission(string $proc_id, object $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/apply');
        $form = [
            'proc_id' => $proc_id,
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 申請データbulk送信
     * 送信された複数の申請データを受信し、後続の一括申請開始バッチに引き継ぐ情報を登録する。
     * ※再提出を行う場合は、申請データ送信を使用すること。
     *
     * @param object $send_file 申請データをZIPファイル形式で圧縮したものを設定
     *                         申請データは構成管理XMLファイル、申請書XMLファイル、添付ファイル
     * @return Response|null
     */
    public function ApplicationDataBulkTransmission(object $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/bulk-apply');
        $form = [
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 補正データ送信
     * 補正申請可能な到達番号に対して、
     * 送信された補正データの形式チェックを行い、指定された到達番号の申請案件に関する補正処理を行う。
     * ※補正申請可能な到達番号について
     * 　・申請案件に関する通知取得の補正種別が"部分補正"であること。
     * 　・補正種別が"再提出"、"手続終了(再提出可)"の場合は、申請データ送信を使用すること。
     *
     * @param string $arrive_id 到達番号 (半角数字、16~18文字)
     * @param object $send_file 申請データをZIPファイル形式で圧縮したものを設定
     *                         申請データは構成管理XMLファイル、申請書XMLファイル、添付ファイル
     * @return Response|null
     */
    public function CorrectionDataTransmission(string $arrive_id, object $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/apply/amend');
        $form = [
            'arrive_id' => $arrive_id,
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 取り下げ依頼送信
     * 指定された到達番号の取下げ処理を行う。
     *
     * @param string $arrive_id 到達番号 (半角数字、16~18文字)
     * @param object $send_file 取下げ依頼データをZIPファイル形式で圧縮したものを設定
     *                          構成管理XMLファイル、取下げ依頼の申請書XMLファイル
     * @return Response|null
     */
    public function WithdrawalRequestSent(string $arrive_id, object $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/apply/withdraw');
        $form = [
            'arrive_id' => $arrive_id,
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 形式チェック実行
     * 送信された申請データに対して、形式チェックを実行し、結果を応答する。
     *
     * @param string $proc_id 手続識別子 (半角英数字、16文字)
     * @param object $send_file 申請データをZIPファイル形式で圧縮したものを設定
     *                          申請データは構成管理XMLファイル、申請書XMLファイル、添付ファイル
     * @return Response|null
     */
    public function ExecuteFormatCheck(string $proc_id, object $send_file): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;

        $path = parent::getAPIPath('/apply/check');
        $form = [
            'proc_id' => $proc_id,
            'send_file' => $send_file
        ];
        $response = $this->request()->post($path, $form);

        return $response;
    }

    /**
     * 申請案件一覧取得
     * 期間等を指定して、申請案件の一覧情報を取得する。対象期間内の到達日時の申請案件を取得対象とする。
     * ※送信番号のみを指定または対象期間及び取得件数/ページを指定
     *
     * @param string $send_number 送信番号 (半角数字、18桁、送信番号で取得する場合のみ指定)
     * @param string $proc_id 手続識別子 (半角英数字、16桁)
     * @param string $date_from 取得対象期間開始日 (半角、10桁、YYYY-MM-DD形式、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定)
     * @param int $limit 取得件数 (数字、1-2桁、上限値50、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定)
     * @param int $offset 取得ページ番号 (数字、1-4桁、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定)
     * @return Response | null
     */
    public function getListApplications(string $send_number, string $proc_id, string $date_from, int $limit, int $offset): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/apply/lists');
        $form = [
            'send_number' => $send_number,
            'proc_id' => $proc_id,
            'date_from' => $date_from,
            'limit' => $limit,
            'offset' => $offset
        ];
        $response = $this->request()->get($path, $form);

        return $response;
    }

    /**
     * 申請案件取得
     * 指定した申請案件の詳細情報を取得する。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁) エラー文より"到達番号は半角英数字の形式模様?"
     * @return Response | null
     */
    public function getMatterFiling(string $arrive_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/apply/' . $arrive_id);
        $response = $this->request()->get($path);

        return $response;
    }

    /**
     * エラーレポート取得
     * 申請データbulk送信の申請データに対して、後続の処理にて実行された形式チェックの実行結果を、取得して応答する。
     * リクエストの対象期間内に受信した申請データに対するエラーレポートを取得対象とする。
     * 形式チェック実行にてチェックエラーが発生せずに到達した申請については、発行された到達番号等を応答する。
     * ※送信番号のみを指定または対象期間及び取得件数/ページを指定
     *
     * @param string $send_number 送信番号 (半角数字、18桁、 送信番号で取得する場合のみ指定）
     * @param string $date_from 取得対象期間開始日 (半角、10桁、YYYY-MM-DD形式、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定）
     * @param string $date_to 取得対象期間終了日 (半角、10桁、YYYY-MM-DD形式、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定）
     * @param int $limit 取得件数 (数字、1-2桁、上限値30、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定）
     * @param int $offset 取得ページ番号 (数字、1-4桁、1~9999、対象期間及び取得件数/ページオフセット件数で取得する場合のみ指定）
     * @return Response | null
     */
    public function getErrorReport(string $send_number, string $date_from, string $date_to, int $limit, int $offset): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/apply/report');
        $form = [
            'send_number' => $send_number,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'limit' => $limit,
            'offset' => $offset
        ];
        $response = $this->request()->get($path, $form);
        return $response;
    }

    /**
     * 手続に関するご案内一覧取得
     * 期間等を指定して、手続に関するご案内情報を一覧で取得する。
     *
     * @param string $date_from 取得対象期間開始日 (半角、10桁、YYYY-MM-DD形式）
     * @param string $date_to 取得対象期間終了日 (半角、10桁、YYYY-MM-DD形式）
     * @param int $limit 取得件数 (数字、1-2桁、上限値50）
     * @param int $offset 取得ページ番号 (数字、1-4桁、1~9999）
     * @return Response | null
     */
    public function getGuideList(string $date_from, string $date_to, int $limit, int $offset): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/message/lists');
        $form = [
            'date_from' => $date_from,
            'date_to' => $date_to,
            'limit' => $limit,
            'offset' => $offset
        ];
        $response = $this->request()->get($path, $form);
        return $response;
    }

    /**
     * 手続に関するご案内取得
     * 指定したお知らせ（手続に関するご案内）の情報を取得する。
     *
     * @param string $information_id お知らせID (半角英数字、1-16桁）
     * @return Response | null
     */
    public function getInformation(string $information_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/message/' . $information_id);
        $response = $this->request()->get($path);
        return $response;
    }

    /**
     * 申請案件に関する通知一覧取得
     * 期間等を指定して、申請案件に関する通知情報を一覧で取得する。
     *
     * @param string $date_from 取得対象期間開始日 (半角、10桁、YYYY-MM-DD形式）
     * @param string $date_to 取得対象期間終了日 (半角、10桁、YYYY-MM-DD形式）
     * @param int $limit 取得件数 (数字、1-2桁、上限値50）
     * @param int $offset 取得ページ番号 (数字、1-4桁、1~9999）
     * @return Response | null
     */
    public function getNotificationList(string $date_from, string $date_to, int $limit, int $offset): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/notice/lists');
        $form = [
            'date_from' => $date_from,
            'date_to' => $date_to,
            'limit' => $limit,
            'offset' => $offset
        ];
        $response = $this->request()->get($path, $form);
        return $response;
    }

    /**
     * 申請案件に関する通知取得
     * 期間等を指定して、申請案件に関する通知情報を一覧で取得する。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁）
     * @param int $notice_sub_id 通知通番 (数字、1-3桁、1~999）
     * @return Response | null
     */
    public function getNotificationInformation(string $arrive_id, int $notice_sub_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/notice/' . $arrive_id . '/' . $notice_sub_id);
        $response = $this->request()->get($path);
        return $response;
    }

    /**
     * 公文書取得
     * 指定された申請案件の公文書を取得する。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁）
     * @param int $notice_sub_id 通知通番 (数字、1-3桁、1~999）
     * @return Response | null
     */
    public function getOfficialDocument(string $arrive_id, int $notice_sub_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/official_document/' . $arrive_id . '/' . $notice_sub_id);
        $response = $this->request()->get($path);
        return $response;
    }

    /**
     * 公文書取得完了
     * 指定された申請案件の公文書の取得日時を登録する。
     * また、申請案件に紐づくすべての公文書が取得された状態となった場合は、申請案件のステータスを手続完了に更新する。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁）
     * @param int $notice_sub_id 通知通番 (数字、1-3桁、1~999）
     * @return Response | null
     */
    public function registerDatetimeOfOfficialDocument(string $arrive_id, int $notice_sub_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/official_document/');
        $form = [
            'arrive_id' => $arrive_id,
            'notice_sub_id' => $notice_sub_id
        ];
        $response = $this->request()->post($path, $form);
        return $response;
    }

    /**
     * 公文書署名検証要求
     * 送信された公文書に対して署名検証を行う。
     *
     * @param string $file_name ファイル名 (全半角,1~256文字）
     * @param string $file_data ファイル圧縮データ (半角、鑑ファイル、添付ファイル。バイナリデータはBase64エンコードしたものを使用する。<byte> non-empty）
     * @param string $sig_verification_xml_file_name 署名検証XMLファイル名 (半角英数字、1~256文字）
     * @return Response | null
     */
    public function signatureVerification(string $file_name, string $file_data, string $sig_verification_xml_file_name): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/official_document/verify');
        $form = [
            'file_name' => $file_name,
            'file_data' => $file_data,
            'sig_verification_xml_file_name' => $sig_verification_xml_file_name
        ];
        $response = $this->request()->post($path, $form);
        return $response;
    }

    /**
     * 国庫金電子納付取扱金融機関一覧取得
     * 電子納付金融機関一覧取得要求を受け付け、国庫金の電子納付が可能な金融機関一覧（金融機関名、ネットバンキングのサービス名、URL 等）を応答する。
     *
     * @return Response | null
     */
    public function getPaymentLists(): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/payment/lists');
        $response = $this->request()->get($path);
        return $response;
    }

    /**
     * 電子納付情報一覧取得
     * 指定された到達番号に発行された手数料等の納付情報（到達番号、納付番号、確認番号、収納期間番号等）を応答する。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁）
     * @return Response | null
     */
    public function getPaymentInformation(string $arrive_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/payment/' . $arrive_id);
        $response = $this->request()->get($path);
        return $response;
    }

    /**
     * 電子納付金融機関サイト表示
     * 電子納付金融機関サイトのURL（リダイレクト先）およびリダイレクト先へ受け渡すパラメータ情報（収納機関番号、国庫金コード、パラメータタグ名、情報リンクデータ）を応答する。
     * 応答結果を受け、API対応ソフトウェア開発事業者側で電子納付金融機関サイトのURLへリダイレクトさせる必要がある。
     *
     * @param string $arrive_id 到達番号 (半角数字、16-18桁）
     * @param string $pay_number 納付番号 (半角英数字、16文字）
     * @param string $back_name 金融機関名称 (全半角、1~256文字）
     * @param string $proc_id 手続識別子 (半角英数字、16文字）
     * @return Response | null
     */
    public function getPaymentURL(string $arrive_id, string $pay_number, string $back_name, string $proc_id): Response|null
    {
        if (!parent::requiredConfig(['dev']))
            return null;

        if (!parent::requiredAccessToken())
            return null;
        
        $path = parent::getAPIPath('/payment');
        $form = [
            'arrive_id' => $arrive_id,
            'pay_number' => $pay_number,
            'back_name' => $back_name,
            'proc_id' => $proc_id
        ];
        $response = $this->request()->post($path, $form);
        return $response;
    }
}
