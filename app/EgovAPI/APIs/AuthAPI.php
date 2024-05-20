<?php

namespace App\EgovAPI\APIs;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
use App\EgovAPI\EgovTestLog;
use App\EgovAPI\APIs\EgovBase;
use App\EgovAPI\EgovDebug;

class AuthAPI extends EgovBase
{
    public function __construct(array $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    /**
     * 利用者認証の開始
     * ユーザー認可:ユーザー認可リクエストを行い、認証・同意画面を表示するURLを生成する
     *
     * @param array $option
     * @return string
     */
    public function getAuth(array $option = []): string
    {
        if (!parent::requiredConfig(['redirect_uri', 'client_id']))
            return '';

        $path = parent::getAccountPath('/auth/auth');

        $option = array_merge([
            'state' => '',
            'code_challenge' => ''
        ], $option);

        $data = array(
            'client_id' => $this->config['client_id'],
            'response_type' => 'code',
            'scope' => 'openid offline_access',
            'redirect_uri' => $this->config['redirect_uri'],
            'state' => $option['state'],
            'code_challenge' => $option['code_challenge'],
            'code_challenge_method' => !empty($option['code_challenge']) ? 'S256' : ''
        );

        $data = parent::clean($data);

        return $path . '?' . http_build_query($data);
    }

    /**
     * アクセストークン取得（コード）
     * ユーザー認可リクエストで返却された認可コードを認可サーバへ送信し、アクセストークンとアクセストークン更新用のリフレッシュトークンを取得する。
     *
     * @param string $code
     * @param string $code_verifier
     * @return Response | null
     */
    public function getToken($code, $code_verifier = ''): Response|null
    {
        if (!parent::requiredConfig(['redirect_uri', 'client_id', 'api_key']))
            return null;

        if (empty($code))
            return null;

        $path = parent::getAccountPath('/auth/token');

        $form = [
            'grant_type' => parent::AUTH_CODE,
            'code' => $code,
            'redirect_uri' => $this->config['redirect_uri'],
            'code_verifier' => $code_verifier,
            'refresh_token' => ''
        ];

        $req = Http::asForm()
            ->withBasicAuth($this->config['client_id'], $this->config['api_key']);
        $req = EgovDebug::setMiddleware($req);
        $response = $req->post($path, $form);

        $status = $response->status();

        EgovTestLog::info(print_r('response status code: ' . $status, true));

        return $response;
    }
}
