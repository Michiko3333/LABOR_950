<?php

namespace App\Http;

class Common
{
    public static function convertToFullWidth($text) {
        if (isset($text)) {
            $convertText = mb_convert_kana($text, 'AS');
            $convertText = str_replace(['-', '－', '―'], '‐', $convertText);
            return $convertText;
        }else{
            return;
        }
    }

    public static function convertToHalfWidth($text) {
        if (isset($text)) {
            $convertText = mb_convert_kana($text, 'as');
            $convertText = str_replace(['－', 'ー', '―'], '-', $convertText);
            return $convertText;
        }else{
            return;
        }
    }
}
