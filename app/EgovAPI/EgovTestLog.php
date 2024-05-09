<?php

namespace App\EgovAPI;

use Illuminate\Support\Facades\Log;

class EgovTestLog {
    public static function info($message, $context = []) {
        // .envのEgovTestがtrueの場合はログを出力する
        if (isset($_SERVER['EGOV_TEST']) && $_SERVER['EGOV_TEST'] == 'true') {
            Log::info($message, $context);     
        }else{
            return;
        }
    }

    public static function error($message, $context = []) {
        if (isset($_SERVER['EGOV_TEST']) && $_SERVER['EGOV_TEST'] == 'true') {
            Log::error($message, $context);     
        }else{
            return;
        }
    }
}
