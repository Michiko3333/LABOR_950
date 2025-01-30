<?php

namespace Database\Seeders;

use App\Models\FilterEmployeeList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterEmployeeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilterEmployeeList::truncate();
        FilterEmployeeList::create([
            'name' => '基本情報',
            'value' => 'basic_info',
            'order' => 1,
            'parent' => null,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '所属',
            'value' => 'belong',
            'order' => 2,
            'parent' => 'basic_info',
            'hidden_default' => 0,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '役職',
            'value' => 'managerial_position',
            'order' => 3,
            'parent' => 'basic_info',
            'hidden_default' => 0,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '等級',
            'value' => 'grade',
            'order' => 4,
            'parent' => 'basic_info',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '資格',
            'value' => 'qualification',
            'order' => 5,
            'parent' => 'basic_info',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '入社日',
            'value' => 'hired_date',
            'order' => 6,
            'parent' => 'basic_info',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '生年月日',
            'value' => 'birth_date',
            'order' => 7,
            'parent' => 'basic_info',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '住所',
            'value' => 'full_address',
            'order' => 8,
            'parent' => 'basic_info',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '雇用保険',
            'value' => 'employment-insurance',
            'order' => 9,
            'parent' => '',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '労災保険区分',
            'value' => 'labor_insurance_type',
            'order' => 10,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '雇用保険区分',
            'value' => 'employment_insurance_type',
            'order' => 11,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '被保険者番号（雇用保険）',
            'value' => 'employment_insured_no',
            'order' => 12,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '雇用保険取得日',
            'value' => 'employment_insured_date',
            'order' => 13,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '雇用保険喪失日',
            'value' => 'employment_not_insured_date',
            'order' => 14,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '被保険者状況',
            'value' => 'insured_status',
            'order' => 15,
            'parent' => 'employment-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);


        FilterEmployeeList::create([
            'name' => '健康保険',
            'value' => 'health-insurance',
            'order' => 16,
            'parent' => '',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '健保組合番号',
            'value' => 'health_insurance_association_number',
            'order' => 17,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '被保険者番号（健保）',
            'value' => 'insurer_no',
            'order' => 18,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '取得区分',
            'value' => 'acquisition_of_distinction',
            'order' => 19,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '健康保険取得日',
            'value' => 'health_insurance_acquisition_date',
            'order' => 20,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '健康保険喪失日',
            'value' => 'health_insurance_loss_date',
            'order' => 21,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '基礎年金番号',
            'value' => 'pension_no',
            'order' => 22,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '厚生年金基金',
            'value' => 'welfare_pension',
            'order' => 23,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '海外特例',
            'value' => 'overseas_special_exception',
            'order' => 24,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '海外特例該当日',
            'value' => 'overseas_special_exception_date',
            'order' => 25,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '海外特例非該当日',
            'value' => 'overseas_special_not_exception_date',
            'order' => 26,
            'parent' => 'health-insurance',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '外国人',
            'value' => 'overseas',
            'order' => 27,
            'parent' => '',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '国籍',
            'value' => 'country_id',
            'order' => 28,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '在留資格',
            'value' => 'residential_status_id',
            'order' => 29,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '在留期限',
            'value' => 'stay_date_period',
            'order' => 30,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '在留カード番号',
            'value' => 'residence_card_no',
            'order' => 31,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '資格外許可の有無',
            'value' => 'unauthorized_activities_permission_flg',
            'order' => 32,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '派遣請負就労区分',
            'value' => 'dispatch_contract_completion',
            'order' => 33,
            'parent' => 'overseas',
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
    }
}
