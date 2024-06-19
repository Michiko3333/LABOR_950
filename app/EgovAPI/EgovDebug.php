<?php

namespace App\EgovAPI;

use Illuminate\Http\Client\PendingRequest;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Storage;

class EgovDebug
{
    public static $isActive = false;
    public static $requestHeader = '';
    public static $requestBody = '';
    public static $responseBody = '';
    public static $url = '';

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

    public static function recordResponse($r)
    {
        $body = $r->body();
        $decodebody = json_decode($body);
        self::$responseBody = json_encode($decodebody, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return $body;
    }

    public static function setMiddleware($req): PendingRequest
    {
        // for debug mode
        if (config('egov.test') == true && self::$isActive == true) {
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

    public static function output($suffix)
    {
        $directoryNameBase = 'egov-test-log/' . $suffix;
        $directoryName = $directoryNameBase;
        $counter = 1;

        while (Storage::exists($directoryName)) {
            $directoryName = $directoryNameBase . '_' . $counter;
            $counter++;
        }

        // フォルダ作成
        Storage::makeDirectory($directoryName);
        Storage::setVisibility($directoryName, 'public');

        // ログ書込み
        $responsePath = $directoryName . '/response.json';
        Storage::put($responsePath, self::$responseBody);
        Storage::put($directoryName . '/header.txt', self::$requestHeader);
        Storage::put($directoryName . '/body.txt', self::$requestBody);

        // 日時とステータスコードの追加
        $newData = [
            'time' => date('Y/m/d H:i'),
            "HTTP status_code" => 200
        ];
        $existingData = [];
        $existingContent = Storage::get($responsePath);
        $existingData = json_decode($existingContent, true);
        $combinedData = [$existingData, $newData];
        $newContent = json_encode($combinedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        Storage::put($responsePath, $newContent);
    }

    public static function outputForGetAuth()
    {
        $directoryNameBase = 'egov-test-log/01-1';
        $directoryName = $directoryNameBase;
        $counter = 1;

        while (Storage::exists($directoryName)) {
            $directoryName = $directoryNameBase . '_' . $counter;
            $counter++;
        }

        // フォルダ作成
        Storage::makeDirectory($directoryName);
        Storage::setVisibility($directoryName, 'public');
        Storage::put($directoryName . '/url.txt', self::$url);
    }
}
