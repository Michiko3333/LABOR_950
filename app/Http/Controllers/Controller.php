<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

use App\Models\CurrentUser;
use App\Models\Prefecture;
use App\Models\Values_sex;
use App\Models\Egov_account;
use App\Models\Ledger;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function isSelectedCompany()
    {
        $user = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();

        if ($user->role_id == 999 || $user->role_id == 500) {
            if (empty($currentCompany)) {
                return false;
            }
        }
        return true;
    }

    public function convertSex(string $sex)
    {
        $sexMap = Values_sex::pluck('id', 'name')->toArray();

        if (!array_key_exists($sex, $sexMap)) {
            return 0;
        }

        return (int)$sexMap[$sex];
    }

    public function getPrefectures()
    {
        $prefectures = Prefecture::all(['id', 'name']);
        $prefectureArray = $prefectures->toArray();
        return $prefectureArray;
    }

    public static function convertEra(string $era)
    {
        $eraMap = [
            '大正' => 1,
            '昭和' => 2,
            '平成' => 3,
            '令和' => 4,
        ];
        foreach ($eraMap as $key => $value) {
            if ($era === $key) {
                return $eraMap[$era];
            }
        }
        return false;
    }

    public function convertFirstYear(string $date)
    {
        if (strpos($date, '元') !== false) {
            return 1;
        } elseif (preg_match('/[^0-9元]/', $date)) {
            return false;
        }
    }

    public static function convertJapaneseCalendarToWesternCalendar(int $era, Carbon $japaneseCalendar)
    {
        $arr = [
            ['date' => '1912-07-30', 'year' => '1912', 'era' => 1],
            ['date' => '1926-12-25', 'year' => '1926', 'era' => 2],
            ['date' => '1989-01-08', 'year' => '1989', 'era' => 3],
            ['date' => '2019-05-01', 'year' => '2019', 'era' => 4],
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
        if ($endYear < $westernCalendarYear || $westernCalendarYear < $startYear) {
            return false;
        } else {
            // 日付をCarbonオブジェクトに変換
            $westernCalendarResult = Carbon::create($westernCalendarYear, $westernCalendarMonth, $westernCalendarDate);

            return $westernCalendarResult;
        }
    }

    public static function convertWesternCalendarToJapaneseCalendar(Carbon $westernCalendar)
    {
        $arr = [
            ['date' => '1912-07-30', 'year' => '1912', 'era_string' => '大正'],
            ['date' => '1926-12-25', 'year' => '1926', 'era_string' => '昭和'],
            ['date' => '1989-01-08', 'year' => '1989', 'era_string' => '平成'],
            ['date' => '2019-05-01', 'year' => '2019', 'era_string' => '令和'],
        ];

        // $westernCalendarの年,月,日を取り出す
        $westernCalendarMonth = (string)$westernCalendar->month;
        $westernCalendarDay = (string)$westernCalendar->day;
        $westernCalendarYear = $westernCalendar->year;

        $japaneseCalendarYear = false;
        $japaneseCalendarEraNum = false;
        $japaneseCalendarEraString = false;
        $japaneseCalendarResult = false;
        for ($i = 3; $i >= 0; $i--) {
            if ($westernCalendar >= Carbon::parse($arr[$i]['date'])) {
                $japaneseCalendarYear = $westernCalendarYear - $arr[$i]['year'] + 1;
                $japaneseCalendarEraString = $arr[$i]['era_string'];
                $japaneseCalendarResult = Carbon::create($japaneseCalendarYear, $westernCalendarMonth, $westernCalendarDay);
                break;
            }
        }
        if ($japaneseCalendarEraString) {
            $japaneseCalendarEraNum = self::convertEra($japaneseCalendarEraString);
        }

        return [
            'japanese_calendar_era_num' => $japaneseCalendarEraNum,
            'japanese_calendar_era_string' => $japaneseCalendarEraString,
            'japanese_calendar_result' => $japaneseCalendarResult,
        ];
    }
    protected function putSuccess($msg = "更新が完了しました")
    {
        session()->flash('post-success', $msg);
    }

    public function egovAcount()
    {
        $user = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();
        $company_id = $currentCompany->id;
        $egovAcount = Egov_account::where('company_id', $company_id)->where('delete_flg', 0)->first();
        if ($egovAcount !== null) {
            $egovAcount = true;
        } else {
            $egovAcount = false;
        }
        return $egovAcount;
    }

    public function getProcedureName(Request $request)
    {
        $request->url();
        $pattern = "/ledger/";
        $procedureId = substr($request, strpos($request, $pattern) + strlen($pattern));
        $procedureName = Ledger::where('procedure_id', $procedureId)->pluck('procedure_name')->first();

        return $procedureName;
    }
}
