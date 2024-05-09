<?php

namespace App\EgovAPI;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

use App\EgovAPI\APIs\AccessAPI;
use App\EgovAPI\APIs\RefreshAPI;
use App\EgovAPI\APIs\AuthAPI;

class Egov
{
    const READ = 'READ';
    const DOWNLOAD = 'DOWNLOAD';
    const ACCEPT = 'ACCEPT';
    const DENY = 'DENY';

    private static $config = [];
    public static function config(array $config = []): void
    {
        self::$config = array_merge([
            'dev' => true,
            'client_id' => '',
            'api_key' => '',
            'redirect_uri' => '',
        ], $config);
    }

    public static function accessToken($access_token): AccessAPI
    {
        return new AccessAPI(self::$config, $access_token);
    }

    public static function refreshToken($refresh_token): RefreshAPI
    {
        return new RefreshAPI(self::$config, $refresh_token);
    }

    public static function getAuth(array $option = []): string
    {
        $client = new AuthAPI(self::$config);

        return $client->getAuth($option);
    }

    public static function getToken($code, $code_verifier = ''): Response|null
    {
        $client = new AuthAPI(self::$config);
        return $client->getToken($code, $code_verifier);
    }
}
