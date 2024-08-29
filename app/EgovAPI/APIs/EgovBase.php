<?php

namespace App\EgovAPI\APIs;

use Illuminate\Support\Facades\Log;

class EgovBase
{
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
        $url = $this->config['dev'] ? $this->config['account_dev_path'] : $this->config['account_path'];
        $url = $url . $path;
        return $url;
    }
    protected function getAPIPath(string $path)
    {
        $url = $this->config['dev'] ? $this->config['api_dev_path'] : $this->config['api_path'];
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
