<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceColumnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_attendance_columns')->truncate();
        DB::table('m_attendance_columns')->insert([
            ['key' => 'employee_no', 'name' => '従業員番号', 'type' => 'label', 'width' => 120, 'fixed' => 1, 'order' => 1, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'employee_name', 'name' => '従業員氏名', 'type' => 'label', 'width' => 140, 'fixed' => 1, 'order' => 2, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'branch_name', 'name' => '事業所', 'type' => 'label', 'width' => 120, 'fixed' => 1, 'order' => 3, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'departments', 'name' => '部署', 'type' => 'label', 'width' => 120, 'fixed' => 1, 'order' => 3, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'employment_type', 'name' => '雇用区分', 'type' => 'label', 'width' => 120, 'fixed' => 0, 'order' => 4, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'work_type', 'name' => '勤務区分', 'type' => 'label', 'width' => 120, 'fixed' => 0, 'order' => 5, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'month', 'name' => '年月', 'type' => 'label', 'width' => 120, 'fixed' => 0, 'order' => 6, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'actual_working_days', 'name' => '労働日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 7, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 1, 'parent_key' => ''],

            ['key' => 'working_days', 'name' => '出勤日数', 'type' => 'label', 'width' => 100, 'fixed' => 0, 'order' => 8, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'working_normal_days', 'name' => '通常出勤', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 9, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'working_days'],
            ['key' => 'working_off_days', 'name' => '休出日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 10, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'working_days'],
            ['key' => 'working_legal_days', 'name' => '法出日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 11, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'working_days'],

            ['key' => 'working_time', 'name' => '勤務時間', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 12, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 5, 'parent_key' => ''],

            ['key' => 'overtime', 'name' => '残業時間', 'type' => 'label', 'width' => 100, 'fixed' => 0, 'order' => 13, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 7, 'parent_key' => ''],
            ['key' => 'overtime_low', 'name' => '所定残業時間', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 14, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'overtime'],
            ['key' => 'overtime_normal', 'name' => '普通残業時間', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 15, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'overtime'],
            ['key' => 'overtime_early', 'name' => '早出残業時間', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 16, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'overtime'],
            ['key' => 'overtime_late', 'name' => '深夜残業時間', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 17, 'show' => 0, 'is_ledger' => 1, 'ledger_order' => 0, 'ledger_order' => 8, 'parent_key' => 'overtime'],
            ['key' => 'overtime_off', 'name' => '休出残業時間', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 18, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'overtime'],

            ['key' => 'working_off_time', 'name' => '休日労働時間数', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 19, 'show' => 0, 'is_ledger' => 1, 'ledger_order' => 6, 'parent_key' => ''],

            ['key' => 'holidays', 'name' => '休日日数', 'type' => 'label', 'width' => 100, 'fixed' => 0, 'order' => 20, 'show' => 1, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => ''],
            ['key' => 'holidays_special', 'name' => '特休日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 21, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'holidays'],
            ['key' => 'holidays_comp', 'name' => '代休日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 22, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'holidays'],
            ['key' => 'holidays_legal', 'name' => '公休日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 23, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'holidays'],
            ['key' => 'holidays_public', 'name' => '振休日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 24, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'holidays'],
            ['key' => 'holidays_transfered', 'name' => '代替休日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 25, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'holidays'],

            ['key' => 'late_days', 'name' => '遅刻日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 26, 'show' => 0, 'is_ledger' => 1, 'ledger_order' => 4, 'parent_key' => ''],
            ['key' => 'early_days', 'name' => '早退日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 27, 'show' => 0, 'is_ledger' => 1, 'ledger_order' => 4, 'parent_key' => ''],
            ['key' => 'late_time', 'name' => '遅刻時間', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 28, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 9, 'parent_key' => ''],
            ['key' => 'early_time', 'name' => '早退時間', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 29, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 9, 'parent_key' => ''],

            ['key' => 'absent_days', 'name' => '欠勤日数', 'type' => 'number', 'width' => 100, 'fixed' => 0, 'order' => 30, 'show' => 1, 'is_ledger' => 1, 'ledger_order' => 3, 'parent_key' => ''],

            ['key' => 'paid_leave', 'name' => '有給取得日数', 'type' => 'number', 'width' => 110, 'fixed' => 0, 'order' => 31, 'show' => 0, 'is_ledger' => 1, 'ledger_order' => 2, 'parent_key' => 'absent_days'],
            ['key' => 'remaining_paid_leave', 'name' => '有給残日数', 'type' => 'number', 'width' => 110, 'fixed' => 0, 'order' => 32, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'absent_days'],

            ['key' => 'maternity_leave', 'name' => '産前産後休日日数', 'type' => 'number', 'width' => 150, 'fixed' => 0, 'order' => 33, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'leaves'],
            ['key' => 'childcare_leave', 'name' => '育児休業日数', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 34, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'leaves'],
            ['key' => 'nursing_leave', 'name' => '介護休業日数', 'type' => 'number', 'width' => 120, 'fixed' => 0, 'order' => 35, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'leaves'],

            ['key' => 'other1', 'name' => 'その他１（企業特有）', 'type' => 'number', 'width' => 160, 'fixed' => 0, 'order' => 36, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'others'],
            ['key' => 'other2', 'name' => 'その他２（企業特有）', 'type' => 'number', 'width' => 160, 'fixed' => 0, 'order' => 37, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'others'],
            ['key' => 'other3', 'name' => 'その他３（企業特有）', 'type' => 'number', 'width' => 160, 'fixed' => 0, 'order' => 38, 'show' => 0, 'is_ledger' => 0, 'ledger_order' => 0, 'parent_key' => 'others'],
        ]);
    }
}
