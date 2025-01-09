<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DepartmentPermission;
use Illuminate\Support\Facades\DB;

class wageColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_wage_columns')->truncate();
        DB::table('m_wage_columns')->insert([
            ['key' => 'employee_no', 'name' => '従業員CD', 'width' => 120, 'type' => 'label', 'fixed' => 1, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 1, 'ledger_order' => 1, 'hide_bonus' => 1],
            ['key' => 'employee_name', 'name' => '従業員氏名', 'width' => 140, 'type' => 'label', 'fixed' => 1, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 2, 'ledger_order' => 2, 'hide_bonus' => 1],
            ['key' => 'branch_name', 'name' => '事業所名', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 3, 'ledger_order' => 3, 'hide_bonus' => 1],
            ['key' => 'departments', 'name' => '部署', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 3, 'ledger_order' => 4, 'hide_bonus' => 1],
            ['key' => 'employment_type', 'name' => '雇用区分', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 4, 'ledger_order' => 5, 'hide_bonus' => 1],
            ['key' => 'work_type', 'name' => '勤務区分', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 5, 'ledger_order' => 6, 'hide_bonus' => 1],
            ['key' => 'grade', 'name' => '等級区分', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 6, 'ledger_order' => 7, 'hide_bonus' => 1],
            ['key' => 'gradational_salary', 'name' => '号棒区分', 'width' => 120, 'type' => 'label', 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'fixed' => 0, 'order' => 7, 'ledger_order' => 8, 'hide_bonus' => 1],
            ['key' => 'other_type', 'name' => 'その他区分', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 0, 'order' => 8, 'ledger_order' => 9, 'hide_bonus' => 1],
            ['key' => 'month', 'name' => '月', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 9, 'ledger_order' => 10, 'hide_bonus' => 1],
            ['key' => 'wage_type', 'name' => '賃金区分', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 10, 'ledger_order' => 11, 'hide_bonus' => 1],
            ['key' => 'total_amount', 'name' => '総支給額', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 11, 'ledger_order' => 12, 'hide_bonus' => 1],
            ['key' => 'wage_base_amount', 'name' => '基本給', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 1, 'show' => 1, 'is_ledger' => 1, 'order' => 12, 'ledger_order' => 13, 'hide_bonus' => 0],
            ['key' => 'salary_values', 'name' => '支給', 'width' => 120, 'type' => 'array', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 1, 'order' => 13, 'ledger_order' => 14, 'hide_bonus' => 1],

            ['key' => 'overtime_label', 'name' => '時間外手当合計', 'width' => 150, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 14, 'ledger_order' => 15, 'hide_bonus' => 1],
            ['key' => 'overtime_values', 'name' => '時間外手当', 'width' => 120, 'type' => 'array', 'fixed' => 0, 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 1, 'order' => 15, 'ledger_order' => 16, 'hide_bonus' => 1],

            ['key' => 'allowance_label', 'name' => '諸手当合計', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 16, 'ledger_order' => 17, 'hide_bonus' => 1],
            ['key' => 'allowance_values', 'name' => '手当', 'width' => 120, 'type' => 'array', 'fixed' => 0, 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 1, 'order' => 17, 'ledger_order' => 18, 'hide_bonus' => 1],

            ['key' => 'absence_deduction', 'name' => '欠勤控除', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 18, 'ledger_order' => 24, 'hide_bonus' => 1],
            ['key' => 'late_deduction', 'name' => '遅早控除', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 19, 'ledger_order' => 25, 'hide_bonus' => 1],
            ['key' => 'other_deduction', 'name' => 'その他控除', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 20, 'ledger_order' => 26, 'hide_bonus' => 1],

            ['key' => 'taxable_paymment', 'name' => '課税支給額', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 1, 'order' => 21, 'ledger_order' => 19, 'hide_bonus' => 0],
            ['key' => 'non_taxable_paymment', 'name' => '非課税支額', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 1, 'order' => 22, 'ledger_order' => 20, 'hide_bonus' => 0],
            ['key' => 'taxable_paymment_label', 'name' => '支給合計', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 23, 'ledger_order' => 21, 'hide_bonus' => 1],

            ['key' => 'labor_insurance_target', 'name' => '労働保険対象賃金', 'width' => 150, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 1, 'order' => 24, 'ledger_order' => 22, 'hide_bonus' => 0],
            ['key' => 'social_insurance_target', 'name' => '社会保険対象賃金', 'width' => 150, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 0, 'is_ledger' => 1, 'order' => 25, 'ledger_order' => 23, 'hide_bonus' => 0],

            ['key' => 'health_insurance_deduction', 'name' => '健康保険', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 26, 'ledger_order' => 27, 'hide_bonus' => 0],
            ['key' => 'nursing_care_insurance_deduction', 'name' => '介護保険', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 27, 'ledger_order' => 28, 'hide_bonus' => 0],
            ['key' => 'welfare_pension_deduction', 'name' => '厚生年金', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 28, 'ledger_order' => 29, 'hide_bonus' => 0],
            ['key' => 'welfare_pension_insurance_deduction', 'name' => '厚生年金基金', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 29, 'ledger_order' => 30, 'hide_bonus' => 0],
            ['key' => 'employment_insurance_deduction', 'name' => '雇用保険', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 30, 'ledger_order' => 31, 'hide_bonus' => 0],
            ['key' => 'other_insurance_deduction', 'name' => 'その他', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 31, 'ledger_order' => 32, 'hide_bonus' => 0],
            ['key' => 'social_insurance_deduction', 'name' => '社会保険控除', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 32, 'ledger_order' => 33, 'hide_bonus' => 0],
            ['key' => 'withholding_tax', 'naame' => '源泉所得税', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 33, 'ledger_order' => 34, 'hide_bonus' => 0],
            ['key' => 'resident_tax', 'name' => '住民税', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 34, 'ledger_order' => 35, 'hide_bonus' => 0],
            ['key' => 'mutual_aid', 'name' => '共済費', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 35, 'ledger_order' => 36, 'hide_bonus' => 0],
            ['key' => 'asset_saving', 'name' => '財形貯蓄', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 36, 'ledger_order' => 37, 'hide_bonus' => 0],
            ['key' => 'other_deduction2', 'name' => 'その他控除', 'width' => 120, 'type' => 'number', 'fixed' => 0, 'calc' => 2, 'show' => 0, 'is_ledger' => 1, 'order' => 37, 'ledger_order' => 38, 'hide_bonus' => 0],
            ['key' => 'deduction_sum', 'name' => '控除合計額', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 1, 'order' => 38, 'ledger_order' => 39, 'hide_bonus' => 0],
            ['key' => 'wage_amount', 'name' => '差引支給額', 'width' => 120, 'type' => 'label', 'fixed' => 0, 'calc' => 0, 'show' => 1, 'is_ledger' => 0, 'order' => 39, 'ledger_order' => 40, 'hide_bonus' => 1],
        ]);
    }
}
