<?php

use Carbon\Carbon;

class commonHelpers{
    public static function convertJapaneseCalendarToWesternCalendar(int $era, Carbon $japaneseCalendar)
    {
        $arr = [
            ['date' => '1912-07-30', 'year' => '1912', 'era' => 3],
            ['date' => '1926-12-25', 'year' => '1926', 'era' => 5],
            ['date' => '1989-01-08', 'year' => '1989', 'era' => 7],
            ['date' => '2019-05-01', 'year' => '2019', 'era' => 9],
        ];

        // $japaneseCalendarの年,月,日を取り出す
        $westernCalendarYear = $japaneseCalendar->year;
        $westernCalendarMonth = $japaneseCalendar->month;
        $westernCalendarDate = $japaneseCalendar->day;

        // 西暦年
        foreach ($arr as $item) {
            if ($era == $item['era']) {
                $westernCalendarYear = $item['year'] + $westernCalendarYear - 1;
                $startYear = $item['year'];
                break;
            }
        }
        foreach ($arr as $item) {
            if ($era + 1 == $item['era']) {
                $endYear = $item['year'];
                break;
            } else {
                $endYear = 10000;
            }
        }
    
        // 元号の期間が存在し、入力日付がその期間よりも前かどうかを判定
        if ($endYear <= $westernCalendarYear || $westernCalendarYear < $startYear) {
            return false;
        } else {
            // 日付をCarbonオブジェクトに変換
            $westernCalendarResult = Carbon::create($westernCalendarYear, $westernCalendarMonth, $westernCalendarDate);
    
            return $westernCalendarResult;
        }
    }
}

if (!function_exists('radioChecked')) {
    function radioChecked($v, $or)
    {
        return $v == $or ? 'checked' : '';
    }
}

if (!function_exists('err')) {
    function err($errors, $name, $i = null)
    {
        if (is_null($errors)) return '';
        if ($i !== null) {
            $name = $name . ".$i";
        }
        return $errors->has($name) ? 'error' : '';
    }
}

if (!function_exists('err_bind')) {
    function err_bind($array, $name, $i = null)
    {
        if ($i !== null) {
            $name = $name . ".$i";
        }
        return in_array($name, $array) ? 'error' : '';
    }
}

if (!function_exists('err_sub')) {
    function err_sub($array, $name, $br = null, $i = null)
    {
        if ($i !== null) {
            $name = $name . ".$br" . ".$i";
        }
        return in_array($name, $array) ? 'error' : '';
    }
}
