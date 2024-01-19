<?php

namespace App\EgovAPI\APIs;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

use App\EgovAPI\APIs\EgovBase;

class RefreshAPI extends EgovBase
{
    public function __construct(array $config, string $refresh_token)
    {
        parent::__construct();
        $this->config = $config;
        $this->refresh_token = $refresh_token;
    }

    /**
     * アクセストークン再取得
     * ユーザー認可リクエストで返却された認可コードを認可サーバへ送信し、アクセストークンとアクセストークン更新用のリフレッシュトークンを取得する。
     *
     * @return Response | null
     */
    public function getToken(): Response|null
    {
        if (!parent::requiredConfig(['client_id', 'api_key']))
            return null;

        if (!parent::requiredRefreshToken())
            return null;

        $path = parent::getAccountPath('/auth/token');

        $form = [
            'grant_type' => parent::AUTH_REFRESH,
            'code' => '',
            'redirect_uri' => '',
            'refresh_token' => $this->refresh_token
        ];

        $response = Http::asForm()
            ->withBasicAuth($this->config['client_id'], $this->config['api_key'])
            ->post($path, $form);

        return $response;
    }

    /**
     * アクセストークン検証（リフレッシュトークン）
     * 取得したアクセストークンまたはリフレッシュトークンの有効性を検証し、トークンに関連付けられている情報を取得する。
     *
     * @return Response | null
     */
    public function tokenIntrospect(): Response|null
    {
        if (!parent::requiredConfig(['client_id', 'api_key']))
            return null;

        if (!parent::requiredRefreshToken())
            return null;

        $path = parent::getAccountPath('/auth/token/introspect');

        $form = [
            'token' => $this->refresh_token,
        ];

        $response = Http::asForm()
            ->withBasicAuth($this->config['client_id'], $this->config['api_key'])
            ->post($path, $form);

        return $response;
    }

    /**
     * ログアウト
     * e-Gov認可サーバとの認証状態を破棄し、ログアウトを行う。取得済みのアクセストークン、リフレッシュトークンが無効化される。
     *
     * @return Response | null
     */
    public function logout(): Response|null
    {
        if (!parent::requiredConfig(['client_id', 'api_key']))
            return null;

        if (!parent::requiredRefreshToken())
            return null;

        $path = parent::getAccountPath('/auth/logout');

        $form = [
            'refresh_token' => $this->refresh_token,
        ];

        $response = Http::asForm()
            ->withBasicAuth($this->config['client_id'], $this->config['api_key'])
            ->post($path, $form);

        return $response;
    }
}
