<?php

namespace App\EgovAPI;

use Illuminate\Support\Facades\Log;

class EgovTestLog
{
    public static function info($message, $logPath = null, $context = [])
    {
        // .envのEgovTestがtrueの場合はログを出力
        if (config('egov.test') == true) {
            Log::info($message, $context);
            if ($logPath !== null) {
                file_put_contents($logPath, $message) !== false;
            }
        } else {
            return;
        }
    }

    public static function error($message, $logPath = null, $context = [])
    {
        if (config('egov.test') == true) {
            Log::error($message, $context);
            if ($logPath !== null) {
                file_put_contents($logPath, $message) !== false;
            }
        } else {
            return;
        }
    }
}
