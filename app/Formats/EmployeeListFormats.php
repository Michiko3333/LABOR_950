<?php

namespace App\Formats;

use Carbon\Carbon;

trait EmployeeListFormats
{
    public function formatDate($d)
    {
        if (empty($d)) return '-';
        return Carbon::parse($d)->format('Y年m月d日');
    }

    public function format_insured_status($v)
    {
        if ($v == 1) return '海外勤務者（介護保険適用除外）';
        if ($v == 2) return '育児休業者、産前産後休業者（社会保険免除）';
        if ($v == 3) return '特定第二号被保険者（介護保険負担有）';
        if ($v == 4) return '短期雇用特例被保険者';
        if ($v == 5) return 'その他';
        return $v;
    }

    public function format_acquisition_of_distinction($v)
    {
        if ($v == 1) return '健保・厚年';
        if ($v == 2) return '共済出向';
        if ($v == 3) return '船保任続';
        return $v;
    }

    public function format_overseas_special_exception($v)
    {
        if ($v == 1) return '海外在住';
        if ($v == 2) return '短期在留';
        if ($v == 3) return 'その他';
        return $v;
    }

    public function format_welfare_pension($v)
    {
        if ($v == 1) return '加入';
        return $v;
    }

    public function format_country_id($v)
    {
        return $this->country_type[$v] ?? '日本';
    }

    public function format_residential_status_id($v)
    {
        return $this->residential_status[$v] ?? '-';
    }

    public function format_dispatch_contract_completion($v)
    {
        if ($v == 1) return '特定の事業所に勤務';
        if ($v == 2) return '不特定の事業所に勤務';
        return $v;
    }
}
