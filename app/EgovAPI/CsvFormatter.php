<?php

namespace App\EgovAPI;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Support\Facades\Storage;

class CsvFormatter
{
    private $medium = '';
    private $kanri = [];
    private $office = [];
    private $data = [];
    private $code = '';

    public static $codes = [
        '4950013520990000', // 健康保険・厚生年金保険被保険者報酬月額変更届／７０歳以上被用者月額変更届
        '4950013520989000', // 健康保険・厚生年金保険被保険者報酬月額算定基礎届／７０歳以上被用者算定基礎届
        '4950013520991000', // 健康保険・厚生年金保険被保険者賞与支払届／７０歳以上被用者賞与支払届
    ];

    public function __construct($code, $medium)
    {
        $this->code = $code;
        $this->medium = $medium;
    }

    public function setKanri($request)
    {
        $companyId = $request->session()->get('company_id');
        $companyData = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
        ->join('m_prefecture', 'm_branch.address_prefecture', '=', 'm_prefecture.id')
            ->select('m_branch.pension_office_no as pension_office_no', 'm_branch.post_code as post_code',
                'm_prefecture.name as address_prefecture', 'm_branch.address_city as address_city', 'm_branch.address_ward as address_ward', 'm_branch.address_apartment as address_apartment',
                'm_branch.name as name', 'm_branch.tel_area_code as tel_area_code', 'm_branch.tel_city_code as tel_city_code', 'm_branch.tel_subscriber_code as tel_subscriber_code')
            ->where('m_company.id', $companyId)
            ->where('m_branch.branch_type', 1)
            ->first();
        $post_code = $companyData->post_code;
        $parent_post_code = substr($post_code, 0, 3);
        $child_post_code = substr($post_code, 3, 4);

        $businessOwnerName = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
            ->join('m_employee', 'm_branch.id', '=', 'm_employee.branch_id')
            ->select('m_employee.last_name as last_name', 'm_employee.first_name as first_name')
            ->where('m_employee.employee_type', 1)
            ->first();

        $this->kanri = [
            '都道府県コード' => $request->input('pension_office_reference_prefecture'),
            '郡市区符号' => $request->input('pension_office_reference_no_cities'),
            '事業所記号' => mb_convert_kana($request->input('pension_office_reference_no_office'), 'k'),
            '媒体通番' => str_pad($this->medium, 3, '0', STR_PAD_LEFT),
            '作成年月日' => now()->format('Ymd'),
            '代表届書コード' => 22223
        ];

        $this->office = [
            '都道府県コード' => $request->input('pension_office_reference_prefecture'),
            '郡市区符号' => $request->input('pension_office_reference_no_cities'),
            '事業所記号' => mb_convert_kana($request->input('pension_office_reference_no_office'), 'k'),
            '事業所番号' => $companyData->pension_office_no,
            '親番号（郵便番号）' => $parent_post_code,
            '子番号（郵便番号）' => $child_post_code,
            '事業所所在地' => $companyData->address_prefecture.$companyData->address_city.$companyData->address_ward.$companyData->address_apartment,
            '事業所名称' => $companyData->name,
            '事業主氏名' => `$businessOwnerName->last_name.'　'.$businessOwnerName->first_name`,
            '局番１（電話番号）' => $companyData->tel_area_code,
            '局番２（電話番号）' => $companyData->tel_city_code,
            '局番３（電話番号）' => $companyData->tel_subscriber_code
        ];
    }

    public function setData($request)
    {
        switch ($this->code) {
                // 健康保険・厚生年金保険被保険者報酬月額変更届／７０歳以上被用者月額変更届
            case '4950013520990000':
                $before_revision_date = self::convertToWareki($request->input('before_revision_date_year'), $request->input('before_revision_date_month'));
                $before_revision_date_era_year = $before_revision_date[0];
                $before_revision_date_year = $before_revision_date[1];

                $birth_date = str_pad($request->input('birthday_year'), 2, '0', STR_PAD_LEFT).str_pad($request->input('birthday_month'), 2, '0', STR_PAD_LEFT).str_pad($request->input('birthday_date'), 2, '0', STR_PAD_LEFT);

                $salary_raise_and_reduction = 1;
                if($request->input('salary_raise_and_reduction') === '昇給') {
                    $salary_raise_and_reduction = 1;
                } elseif($request->input('salary_raise_and_reduction') === '降給') {
                    $salary_raise_and_reduction = 2;
                }

                $location_code = '';
                $sequence_number = '';
                if($request->input('basic_pension_number') !== null) {
                    $location_code = substr($request->input('basic_pension_number'), 0, 4);
                    $sequence_number = substr($request->input('basic_pension_number'), 4, 10);
                }

                $over_70_check = '';
                if($request->input('over_70_check') === 'on') {
                    $over_70_check = 1;
                }

                $this->data = [
                    '様式コード' => 2221700,
                    '都道府県コード' => $request->input('pension_office_reference_prefecture'),
                    '郡市区符号' => $request->input('pension_office_reference_no_cities'),
                    '事業所記号' => mb_convert_kana($request->input('pension_office_reference_no_office'), 'k'),
                    '被保険者整理番号' => $request->input('insurer_reference_no'),
                    '被保険者氏名（カナ）' => mb_convert_kana($request->input('insured_fullname_kana'), 'ks'),
                    '被保険者氏名（漢字）' => $request->input('insured_fullname'),
                    '元号（生年月日）' => $request->input('birthday_era'),
                    '年月日（生年月日）' => $birth_date,
                    '元号（改定年月）' => $request->input('revision_date_era'),
                    '年（改定年月）' => str_pad($request->input('revision_date_year'), 2, '0', STR_PAD_LEFT),
                    '月（改定年月）' => str_pad($request->input('revision_date_month'), 2, '0', STR_PAD_LEFT),
                    '従前の標準報酬月額（健保）' => str_pad($request->input('previous_average_monthly_salary_health_insurance'), 4, '0', STR_PAD_LEFT),
                    '従前の標準報酬月額（厚年）' => str_pad($request->input('previous_average_monthly_salary_pension'), 4, '0', STR_PAD_LEFT),
                    '元号（従前の改定月）' => $before_revision_date_era_year,
                    '年（従前の改定月）' => str_pad($before_revision_date_year, 2, '0', STR_PAD_LEFT),
                    '月（従前の改定月）' => str_pad($request->input('before_revision_date_month'), 2, '0', STR_PAD_LEFT),
                    '昇(降)給月' => str_pad($request->input('salary_raise_and_reduction_month'),2 , '0', STR_PAD_LEFT),
                    '昇(降)給区分' => $salary_raise_and_reduction,
                    '遡及支払月' => str_pad($request->input('retroactive_payment_month'), 2, '0', STR_PAD_LEFT),
                    '遡及支払額' => $request->input('retroactive_payment_amount'),
                    '給与支給月（前三ヶ月）' => str_pad($request->input('salary_payment_month1'), 2, '0', STR_PAD_LEFT),
                    '給与支給月（前二ヶ月）' => str_pad($request->input('salary_payment_month2'), 2, '0', STR_PAD_LEFT),
                    '給与支給月（前一ヶ月）' => str_pad($request->input('salary_payment_month3'), 2, '0', STR_PAD_LEFT),
                    '給与計算の基礎日数（前三ヶ月）' => str_pad($request->input('salary_calculation_basic_days1'), 2, '0', STR_PAD_LEFT),
                    '給与計算の基礎日数（前二ヶ月）' => str_pad($request->input('salary_calculation_basic_days2'), 2, '0', STR_PAD_LEFT),
                    '給与計算の基礎日数（前一ヶ月）' => str_pad($request->input('salary_calculation_basic_days3'), 2, '0', STR_PAD_LEFT),
                    '通貨によるものの額（前三ヶ月）' => str_pad($request->input('monthly_salary_currency1'), 7, '0', STR_PAD_LEFT),
                    '通貨によるものの額（前二ヶ月）' => str_pad($request->input('monthly_salary_currency2'), 7, '0', STR_PAD_LEFT),
                    '通貨によるものの額（前一ヶ月）' => str_pad($request->input('monthly_salary_currency3'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（前三ヶ月）' => str_pad($request->input('monthly_salary_in_kind1'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（前二ヶ月）' => str_pad($request->input('monthly_salary_in_kind2'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（前一ヶ月）' => str_pad($request->input('monthly_salary_in_kind3'), 7, '0', STR_PAD_LEFT),
                    '合計（前三ヶ月）' => str_pad($request->input('monthly_salary_sum1'), 7, '0', STR_PAD_LEFT),
                    '合計（前二ヶ月）' => str_pad($request->input('monthly_salary_sum2'), 7, '0', STR_PAD_LEFT),
                    '合計（前一ヶ月）' => str_pad($request->input('monthly_salary_sum3'), 7, '0', STR_PAD_LEFT),
                    '総計' => str_pad($request->input('sum'), 7, '0', STR_PAD_LEFT),
                    '平均額' => str_pad($request->input('average_amount'), 7, '0', STR_PAD_LEFT),
                    '修正平均額' => str_pad($request->input('adjusted_average_amount'), 7, '0', STR_PAD_LEFT),
                    '個人番号' => $request->input('mynumber_no_or_pension_no'),
                    '課所符号（年番）' => $location_code,
                    '一連番号（年番）' => $sequence_number,
                    '備考欄項目１' => $request->input('remarks_over_70_monthly_salary_change'),
                    '備考欄項目２' => $request->input('remarks_multi_work'),
                    '備考欄項目３' => $request->input('remarks_part_time_workers'),
                    '備考欄項目４' => $request->input('remarks_salary_raise_and_reduction_reasons_text'),
                    '備考欄項目５' => $request->input('remarks_only_health_insurance_salary_change'),
                    '備考欄' => $request->input('remarks_others'),
                    '70歳以上被用者届のみ提出' => $over_70_check
                ];
                break;

                // 健康保険・厚生年金保険被保険者報酬月額算定基礎届／７０歳以上被用者算定基礎届
            case '4950013520989000':
                $birth_date = str_pad($request->input('year_of_birth'),2, '0', STR_PAD_LEFT).str_pad($request->input('month_of_birth'), 2, '0', STR_PAD_LEFT).str_pad($request->input('date_of_birth'), 2, '0', STR_PAD_LEFT);
                $remarks_calculation_basic_month_month = $request->input('remarks_calculation_basic_month_month1').$request->input('remarks_calculation_basic_month_month2');

                $previous_revision_date = self::convertToWareki($request->input('previous_revision_year'), $request->input('previous_revision_month'));
                $previous_revision_date_era_year = $previous_revision_date[0];
                $previous_revision_date_year = $previous_revision_date[1];

                $salary_raise_and_reduction = 1;
                if($request->input('salary_raise_and_reduction') === '昇給') {
                    $salary_raise_and_reduction = 1;
                } elseif($request->input('salary_raise_and_reduction') === '降給') {
                    $salary_raise_and_reduction = 2;
                }

                $location_code = '';
                $sequence_number = '';
                if($request->input('basic_pension_number') !== null) {
                    $location_code = substr($request->input('basic_pension_number'), 0, 4);
                    $sequence_number = substr($request->input('basic_pension_number'), 4, 10);
                }

                $over_70_check = '';
                if($request->input('over_70_check') === 'on') {
                    $over_70_check = 1;
                }

                $this->data = [
                    '様式コード' => 2225700,
                    '都道府県コード' => $request->input('pension_office_reference_prefecture'),
                    '郡市区符号' => $request->input('pension_office_reference_no_cities'),
                    '事業所記号' => mb_convert_kana($request->input('pension_office_reference_no_office'), 'k'),
                    '被保険者整理番号' => $request->input('Insured_person_reference_number'),
                    '被保険者氏名（カナ）' => mb_convert_kana($request->input('insured_person_name_in_kana'), 'ks'),
                    '被保険者氏名（漢字）' => $request->input('Insured_person_name_in_kanji'),
                    '元号（生年月日）' => $request->input('era_name'),
                    '年月日（生年月日）' => $birth_date,
                    '元号（適用年月）' => $request->input('applicable_era_name'),
                    '年（適用年月）' => str_pad($request->input('applicable_year'), 2, '0', STR_PAD_LEFT),
                    '月（適用年月）' => '09',
                    '従前の標準報酬月額（健保）' => str_pad($request->input('previous_standard_monthly_remuneration_health_insurance'), 4, '0', STR_PAD_LEFT),
                    '従前の標準報酬月額（厚年）' => str_pad($request->input('previous_standard_monthly_remuneration_employees_pension'), 4, '0', STR_PAD_LEFT),
                    '元号（従前の改定月）' => $previous_revision_date_era_year,
                    '年（従前の改定月）' => str_pad($previous_revision_date_year, 2, '0', STR_PAD_LEFT),
                    '月（従前の改定月）' => str_pad($request->input('previous_revision_month'), 2, '0', STR_PAD_LEFT),
                    '昇(降)給月' => str_pad($request->input('monthly_salary_increase'), 2, '0', STR_PAD_LEFT),
                    '昇(降)給区分' => $salary_raise_and_reduction,
                    '遡及支払月' => str_pad($request->input('retroactive_payment_amount_month'), 2, '0', STR_PAD_LEFT),
                    '遡及支払額' => str_pad($request->input('retroactive_payment_amount'), 7, '0', STR_PAD_LEFT),
                    '給与支給月（４月）' => '04',
                    '給与支給月（５月）' => '05',
                    '給与支給月（６月）' => '06',
                    '給与計算の基礎日数（４月）' => str_pad($request->input('basic_number_of_days_for_payroll_calculatio1'), 2, '0', STR_PAD_LEFT),
                    '給与計算の基礎日数（５月）' => str_pad($request->input('basic_number_of_days_for_payroll_calculatio2'), 2, '0', STR_PAD_LEFT),
                    '給与計算の基礎日数（６月）' => str_pad($request->input('basic_number_of_days_for_payroll_calculatio3'), 2, '0', STR_PAD_LEFT),
                    '通貨によるものの額（４月）' => str_pad($request->input('monthly_remuneration_amount_in_currency1'), 7, '0', STR_PAD_LEFT),
                    '通貨によるものの額（５月）' => str_pad($request->input('monthly_remuneration_amount_in_currency2'), 7, '0', STR_PAD_LEFT),
                    '通貨によるものの額（６月）' => str_pad($request->input('monthly_remuneration_amount_in_currency3'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（４月）' => str_pad($request->input('monthly_remuneration_amount_in_kind1'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（５月）' => str_pad($request->input('monthly_remuneration_amount_in_kind2'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額（６月）' => str_pad($request->input('monthly_remuneration_amount_in_kind3'), 7, '0', STR_PAD_LEFT),
                    '合計（４月）' => str_pad($request->input('monthly_remuneration_total1'), 7, '0', STR_PAD_LEFT),
                    '合計（５月）' => str_pad($request->input('monthly_remuneration_total2'), 7, '0', STR_PAD_LEFT),
                    '合計（６月）' => str_pad($request->input('monthly_remuneration_total3'), 7, '0', STR_PAD_LEFT),
                    '総計' => str_pad($request->input('grand_total'), 7, '0', STR_PAD_LEFT),
                    '平均額' => str_pad($request->input('average_amount'), 7, '0', STR_PAD_LEFT),
                    '修正平均額' => str_pad($request->input('adjusted_average_amount'), 7, '0', STR_PAD_LEFT),
                    '個人番号' => $request->input('my_number_or_basic_pension_number'),
                    '課所符号（年番）' => $location_code,
                    '一連番号（年番）' => $sequence_number,
                    '備考欄項目１' => $request->input('remarks_and_calculation_of_employees_aged_70_and_over'),
                    '70歳算定基礎月' => $remarks_calculation_basic_month_month,
                    '備考欄項目２' => $request->input('remarks_and_two_or_more_jobs'),
                    '備考欄項目３' => $request->input('remarks_and_part'),
                    '備考欄項目４' => $request->input('remarks_and_scheduled_monthly_changes'),
                    '備考欄項目５' => $request->input('remarks_and_annual_average'),
                    '備考欄項目６' => $request->input('remarks_and_Joined_midway'),
                    '備考欄項目７' => $request->input('remarks_and_sick_leave_childcare_leave'),
                    '備考欄項目８' => $request->input('remarks_and_others'),
                    '備考欄' => $request->input('remarks_and_part_time_worker'),
                    '70歳以上被用者届のみ提出' => $over_70_check
                ];
                break;

                // 健康保険・厚生年金保険被保険者賞与支払届／７０歳以上被用者賞与支払届
            case '4950013520991000':
                $birth_date = str_pad($request->input('employee_birthday_year'), 2, '0', STR_PAD_LEFT).str_pad($request->input('employee_birthday_month'), 2, '0', STR_PAD_LEFT).str_pad($request->input('date_of_birth'), 2, '0', STR_PAD_LEFT);
                $bonus_payment_date = str_pad($request->input('bonus_payment_date_year'), 2, '0', STR_PAD_LEFT).str_pad($request->input('bonus_payment_date_month'), 2, '0', STR_PAD_LEFT).str_pad($request->input('bonus_payment_date_date'), 2, '0', STR_PAD_LEFT);

                $location_code = '';
                $sequence_number = '';
                if($request->input('basic_pension_number') !== null) {
                    $location_code = substr($request->input('basic_pension_number'), 0, 4);
                    $sequence_number = substr($request->input('basic_pension_number'), 4, 10);
                }

                $bonus_payment_sum = $request->input('bonus_payment_sum').'000';

                $remarks_first_payment_date = '';
                if($request->input('remarks_first_payment_date')) {
                    str_pad($request->input('remarks_first_payment_date'), 2, '0', STR_PAD_LEFT);
                }

                $over_70_check = '';
                if($request->input('over_70_check') === 'on') {
                    $over_70_check = 1;
                }

                $this->data = [
                    '様式コード' => 2265700,
                    '都道府県コード' => $request->input('pension_office_reference_prefecture'),
                    '郡市区符号' => $request->input('pension_office_reference_no_cities'),
                    '事業所記号' => mb_convert_kana($request->input('pension_office_reference_no_office'), 'k'),
                    '被保険者整理番号' => $request->input('employment_insured_no'),
                    '被保険者氏名（カナ）' => mb_convert_kana($request->input('insured_fullname_kana'), 'ks'),
                    '被保険者氏名（漢字）' => $request->input('insured_fullname'),
                    '元号（生年月日）' => $birth_date,
                    '年月日（生年月日）' => $request->input('employee_birthday_date'),
                    '元号（賞与支払年月日）' => $request->input('bonus_payment_date_era'),
                    '年月日（賞与支払年月日）' => $bonus_payment_date,
                    '通貨によるものの額' => str_pad($request->input('bonus_payment_currency'), 7, '0', STR_PAD_LEFT),
                    '現物によるものの額' => str_pad($request->input('bonus_payment_goods'), 7, '0', STR_PAD_LEFT),
                    '合計（賞与額）' => str_pad($bonus_payment_sum, 7, '0', STR_PAD_LEFT),
                    '個人番号' => $request->input('mynumber_no_or_pension_no'),
                    '課所符号（年番）' => $location_code,
                    '一連番号（年番）' => $sequence_number,
                    '備考欄項目１' => $request->input('remarks_over_70_insured'),
                    '備考欄項目２' => $request->input('remarks_more_than_twice_work'),
                    '備考欄項目３' => $remarks_first_payment_date,
                    '70歳以上被用者届のみ提出' => $over_70_check
                ];
                break;
            default:
                # nothing
                break;
        }
    }

    public function getCsvText()
    {
        $medium = $this->medium;
        $data_kanri = implode(',', array_values($this->kanri));
        $data_office = implode(',', array_values($this->office));
        $data_values = implode(',', array_values($this->data));

        if (empty($medium) || empty($data_kanri) || empty($data_office) || empty($data_values)) {
            return '';
        }

        $str = "$data_kanri\n[kanri]\n,$medium\n$data_office\n[data]\n$data_values\n";
        return $str;
    }

    public function setCSVSummaryTable($request)
    {
        $companyId = $request->session()->get('company_id');
        $companyData = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
            ->join('m_prefecture', 'm_branch.address_prefecture', '=', 'm_prefecture.id')
            ->select('m_branch.pension_office_reference_prefecture as pension_office_reference_prefecture', 'm_branch.pension_office_reference_no_cities as pension_office_reference_no_cities', 'm_branch.pension_office_reference_no_office as pension_office_reference_no_office',
                'm_branch.pension_office_no as pension_office_no', 'm_branch.post_code as post_code', 'm_prefecture.name as address_prefecture', 'm_branch.address_city as address_city', 'm_branch.address_ward as address_ward', 'm_branch.address_apartment as address_apartment',
                'm_company.name as name', 'm_branch.tel_area_code as tel_area_code', 'm_branch.tel_city_code as tel_city_code', 'm_branch.tel_subscriber_code as tel_subscriber_code')
            ->where('m_company.id', $companyId)
            ->where('m_branch.branch_type', 1)
            ->first();
        $business_owner_name = Employee::join('m_branch', 'm_employee.branch_id', '=', 'm_branch.id')
            ->join('m_company', 'm_branch.company_id', '=', 'm_company.id')
            ->select('m_employee.last_name as last_name', 'm_employee.first_name as first_name')
            ->where('m_company.id', $companyId)
            ->where('m_employee.employee_type', 1)
            ->first();

        $monthly_change_sheets = 0;
        $basis_of_calculation_sheets = 0;
        $bonus_payment_sheets = 0;
        switch($this->code){
            case '4950013520990000':
                $monthly_change_sheets = 1;
                $basis_of_calculation_sheets = 0;
                $bonus_payment_sheets = 0;
            break;
            case '4950013520989000':
                $monthly_change_sheets = 0;
                $basis_of_calculation_sheets = 1;
                $bonus_payment_sheets = 0;
            break;
            case '4950013520991000':
                $monthly_change_sheets = 0;
                $basis_of_calculation_sheets = 0;
                $bonus_payment_sheets = 1;
            break;
        }

        $post_code_first = substr($companyData->post_code, 0, 3);
        $post_code_last = substr($companyData->post_code, 3, 7);

        $csv_submission_agent;
        switch($this->code){
            case '4950013520990000':
                $csv_submission_agent = $request->input('labor_consultant_submission_agent_name');
            break;
            case '4950013520989000':
                $csv_submission_agent = $request->input('labor_consultant_name');
            break;
            case '4950013520991000':
                $csv_submission_agent = $request->input('labor_consultant_submission_agent_name');
            break;
        }

        $today_year = self::convertToWareki(now()->format('Y'), 0);

        $csvData = [
            'identification_information_1' => $companyData->pension_office_reference_prefecture.$companyData->pension_office_reference_no_cities.$companyData->pension_office_reference_no_office,
            'identification_information_2' => str_pad($this->medium, 3, '0', STR_PAD_LEFT),
            'csv_create_date_year' => $today_year,
            'csv_create_date_month' => ltrim(now()->format('m'), '0'),
            'csv_create_date_day' => ltrim(now()->format('d'), '0'),
            'business_serial_number_prefecture' => $companyData->pension_office_reference_prefecture,
            'business_serial_number_city' => $companyData->pension_office_reference_no_cities,
            'business_serial_number_office' => $companyData->pension_office_reference_no_office,
            'csv_pension_office_no' => $companyData->pension_office_no,
            'qualifications_sheets' => 0,
            'change_in_dependents_sheets' => 0,
            'disqualification_sheets' => 0,
            'monthly_change_sheets' => $monthly_change_sheets,
            'basis_of_calculation_sheets' => $basis_of_calculation_sheets,
            'bonus_payment_sheets' => $bonus_payment_sheets,
            'childcare_leave_sheets' => 0,
            'maternity_leave_sheets' => 0,
            'csv_sheets_total' => 1,
            'national_pension_sheets' => 0,
            'sheets_total' => 0,
            'csv_remarks' => '',
            'csv_post_code_first' => $post_code_first,
            'csv_post_code_last' => $post_code_last,
            'csv_business_address' => $companyData->address_prefecture.$companyData->address_city.$companyData->address_ward.$companyData->address_apartment,
            'csv_business_name' => $companyData->name,
            'csv_business_owner' => $business_owner_name->last_name . '　' . $business_owner_name->first_name,
            'csv_tel_area_code' => $companyData->tel_area_code,
            'csv_tel_city_code' => $companyData->tel_city_code,
            'csv_tel_subscriber_code' => $companyData->tel_subscriber_code,
            'csv_application_year' => $today_year,
            'csv_application_month' => ltrim(now()->format('m'), '0'),
            'csv_application_day' => ltrim(now()->format('d'), '0'),
            'csv_submission_agent' => $csv_submission_agent,
        ];
        return $csvData;
    }

    function convertToWareki($year, $month) {
        $wareki = '';
        if($month === 0) {
            if($year >= 2019) {
                $wareki = $year - 2018;
            } elseif($year >= 1989) {
                $wareki = $year - 1988;
            } else {
                $wareki = '';
            }
        } else {
            if($year >= 2019 || $year === 2019 && $month >= 5) {
                $wareki = [9, $year - 2018];
            } elseif($year >= 1989) {
                $wareki = [7, $year - 1988];
            } else {
                $wareki = ['', ''];
            }
        }
        return $wareki;
    }
}
