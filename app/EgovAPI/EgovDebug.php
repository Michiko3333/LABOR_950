<?php

namespace App\EgovAPI;

use Illuminate\Http\Client\PendingRequest;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class EgovDebug
{
    public static $isActive = false;
    public static $requestHeader = '';
    public static $requestBody = '';

    // ログを記録
    public static function recordRequest($req)
    {
        self::$requestHeader = '';
        self::$requestBody = '';

        $headerStrings = [];
        foreach ($req['Headers'] as $key => $values) {
            if (is_array($values) && count($values) > 0) {
                $headerStrings[] = "$key: {$values[0]}";
            }
        }

        self::$requestHeader = '> ' . $req['Method'] . ' ' . $req['URI'] . "\r\n";
        self::$requestHeader .= implode("\r\n", $headerStrings);

        self::$requestBody = $req['Body'];
    }

    public static function setMiddleware($req): PendingRequest
    {
        // for debug mode
        if (config('egov.test') == true && EgovDebug::$isActive == true) {
            $stack = HandlerStack::create();
            $stack->push(Middleware::mapRequest(function ($request) {
                self::recordRequest([
                    'Headers' => $request->getHeaders(),
                    'Body' => (string) $request->getBody(),
                    'Method' => $request->getMethod(),
                    'URI' => (string) $request->getUri(),
                ]);
                return $request;
            }));
            $req = $req->withOptions(['handler' => $stack]);
        }

        return $req;
    }
}
