<?php
namespace App\EgovAPI\APIs;

use Illuminate\Support\Facades\Log;

class EgovBase
{
    const ACCOUNT_PATH = 'https://account.e-gov.go.jp';
    const ACCOUNT_DEV_PATH = 'https://account2.kn.e-gov.go.jp';
    const API_PATH = 'https://api.e-gov.go.jp/shinsei/v2';
    const API_DEV_PATH = 'https://api2.kn.e-gov.go.jp/shinsei/v2';
    const RESPONSE_TYPE = 'code';
    const SCOPE = 'openid offline_access';
    const AUTH_CODE = 'authorization_code';
    const AUTH_REFRESH = 'refresh_token';

    protected $config;
    protected $access_token;
    protected $refresh_token;

    public function __construct()
    {
        $this->config = [];
        $this->access_token = '';
        $this->refresh_token = '';
    }

    protected function requiredConfig(array $keys): bool
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $this->config)) {
                Log::error("{$key}が設定あされていません");
                return false;
            }
        }
        return true;
    }

    protected function requiredAccessToken(): bool
    {
        if (empty($this->access_token))
            Log::error("アクセストークンが設定されていません");
        return !empty($this->access_token);
    }

    protected function requiredRefreshToken(): bool
    {
        if (empty($this->refresh_token))
            Log::error("リフレッシュトークンが設定されていません");
        return !empty($this->refresh_token);
    }
    protected function getAccountPath(string $path)
    {
        $url = $this->config['dev'] ? self::ACCOUNT_DEV_PATH : self::ACCOUNT_PATH;
        $url = $url . $path;
        return $url;
    }
    protected function getAPIPath(string $path)
    {
        $url = $this->config['dev'] ? self::API_DEV_PATH : self::API_PATH;
        $url = $url . $path;
        return $url;
    }

    protected function clean($d)
    {
        return array_filter($d, function ($v) {
            return !empty($v);
        });
    }
}
