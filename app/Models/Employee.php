<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'm_employee';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_no',
        'branch_id',
        'managerial_position_id',
        'division_name',
        'division_name_kana',
        'last_name',
        'last_name_kana',
        'last_name_alphabet',
        'first_name',
        'first_name_kana',
        'first_name_alphabet',
        'old_last_name',
        'old_last_name_kana',
        'old_last_name_alphabet',
        'old_first_name',
        'old_first_name_kana',
        'old_first_name_alphabet',
        'name_common',
        'name_common_kana',
        'sex',
        'birthday',
        'post_code',
        'address_prefecture',
        'address_city',
        'address_ward',
        'address_apartment',
        'address_prefecture_kana',
        'address_city_kana',
        'address_ward_kana',
        'address_apartment_kana',
        'tel_area_code',
        'tel_city_code',
        'tel_subscriber_code',
        'fax',
        'mail_address1',
        'mail_address2',
        'emergency_contact1',
        'emergency_relationship1',
        'emergency_tel1',
        'emergency_address_prefecture1',
        'emergency_address_city1',
        'emergency_address_ward1',
        'emergency_address_apartment1',
        'emergency_contact2',
        'emergency_relationship2',
        'emergency_tel2',
        'emergency_address_prefecture2',
        'emergency_address_city2',
        'emergency_address_ward2',
        'emergency_address_apartment2',
        'spouse_flg',
        'dependent_flg',
        'dependent_family_number',
        'country_id',
        'salary_notices',
        'insured_age_type',
        'residence_card_no',
        'stay_date_period',
        'residential_status_id',
        'residential_status_unknown_reason',
        'unauthorized_activities_permission_flg',
        'mynumber_card_no',
        'social_insurance_no',
        'pension_office_no',
        'pension_office_reference_no',
        'pension_no',
        'labor_insurance_type',
        'employment_insurance_type',
        'insurance_office_no',
        'insurance_office_reference_no',
        'insurer_no',
        'employment_insurance_applied_date',
        'employment_insured_date',
        'employee_type',
        'employee_status',
        'contract_period_flg',
        'contract_start_date',
        'contract_end_date',
        'contract_renewal_flg',
        'hired_date',
        'retirement_date',
        'intended_retirement_date',
        'resignation_letter_request_flg',
        'retired_reason_type',
        'insurance_loss_reason',
        'over_retired_insurance_loss_reason',
        'over_70_non_applicable_flg',
        'passed_away_date',
        'personal_information_access_flg',
        'personal_information_access_flg_tmsp',
        'external_advisor_flg',
        'occupation_type',
        'employment_route',
        'insured_reason',
        'insured_reason_details',
        'currency_id',
        'salary_payment_system',
        'caregiver_leave_benefit_receive_bank_id',
        'japan_post_bank_code_no',
        'japan_post_bank_account_no',
        'bank_account_no',
        'employment_type',
        'employment_status',
        'employer_type',
        'employment_start_date',
        'employment_end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function receptionist()
    {
        return $this->hasMany(Receptionist::class);
    }

    public function employee_department()
    {
        return $this->hasMany(Employee_department::class);
    }

    public function employee_salary_breakdown()
    {
        return $this->hasMany(Employee_salary_breakdown::class);
    }

    public function labor_contract()
    {
        return $this->hasMany(Labor_contract::class);
    }

    public function calendar_event()
    {
        return $this->hasMany(Calendar_event::class);
    }

    public function dependent()
    {
        return $this->hasMany(Dependent::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function retirement_reason_age()
    {
        return $this->hasOne(Retirement_reason_age::class);
    }

    public function retirement_reason_contract_period_reached_limit()
    {
        return $this->hasOne(Retirement_reason_contract_period_reached_limit::class);
    }

    public function retirement_reason_contract_period_expired_eternal_hire()
    {
        return $this->hasOne(Retirement_reason_contract_period_expired_eternal_hire::class);
    }

    public function retirement_reason_contract_period_expired_except_eternal_hire()
    {
        return $this->hasOne(Retirement_reason_contract_period_expired_except_eternal_hire::class);
    }

    public function retirement_reason_business_owner_suggestion()
    {
        return $this->hasOne(Retirement_reason_business_owner_suggestion::class);
    }

    public function retirement_reason_employee_decision_change_job_type()
    {
        return $this->hasOne(Retirement_reason_employee_decision_change_job_type::class);
    }

    public function retirement_reason_employee_decision_change_office()
    {
        return $this->hasOne(Retirement_reason_employee_decision_change_office::class);
    }

    public function retirement_reason_employee_decision_reasons()
    {
        return $this->hasOne(Retirement_reason_employee_decision_reasons::class);
    }

    public function retirement_reason_other_reasons()
    {
        return $this->hasOne(Retirement_reason_other_reasons::class);
    }

    public function external_advisor_receptionist()
    {
        return $this->hasMany(External_advisor_receptionist::class, 'id', 'external_advisor_id');
    }

    public function values_sex()
    {
        return $this->belongsTo(Values_sex::class, 'sex', 'id');
    }

    public function values_employee_insured_age_type()
    {
        return $this->belongsTo(Values_employee_insured_age_type::class, 'insured_age_type', 'id');
    }

    public function values_employee_labor_insurance_type()
    {
        return $this->belongsTo(Values_employee_labor_insurance_type::class, 'labor_insurance_type', 'id');
    }

    public function values_employee_employment_insurance_type()
    {
        return $this->belongsTo(Values_employee_employment_insurance_type::class, 'employment_insurance_type', 'id');
    }

    public function values_employee_employee_type()
    {
        return $this->belongsTo(Values_employee_employee_type::class, 'employee_type', 'id');
    }

    public function values_employee_employee_status()
    {
        return $this->belongsTo(Values_employee_employee_status::class, 'employee_status', 'id');
    }

    public function values_employee_employment_route()
    {
        return $this->belongsTo(Values_employee_employment_route::class, 'employment_route', 'id');
    }

    public function values_employee_insured_reason()
    {
        return $this->belongsTo(Values_employee_insured_reason::class, 'insured_reason', 'id');
    }

    public function values_employee_employment_type()
    {
        return $this->belongsTo(Values_employee_employment_type::class, 'employment_type', 'id');
    }

    public function values_employee_employment_status()
    {
        return $this->belongsTo(Values_employee_employment_status::class, 'employment_status', 'id');
    }

    public function values_employee_employer_type()
    {
        return $this->belongsTo(Values_employee_employer_type::class, 'employer_type', 'id');
    }

    public function values_employee_occupation_type()
    {
        return $this->belongsTo(Values_employee_occupation_type::class, 'occupation_type', 'id');
    }

    public function values_employee_over_retired_insurance_loss_reason()
    {
        return $this->belongsTo(Values_employee_over_retired_insurance_loss_reason::class, 'over_retired_insurance_loss_reason', 'id');
    }

    public function values_employee_insurance_loss_reason()
    {
        return $this->belongsTo(Values_employee_insurance_loss_reason::class, 'insurance_loss_reason', 'id');
    }

    public function values_employee_salary_payment_system()
    {
        return $this->belongsTo(Values_employee_salary_payment_system::class, 'salary_payment_system', 'id');
    }

    public function values_employee_insured_type()
    {
        return $this->belongsTo(Values_employee_insured_type::class, 'insured_type', 'id');
    }

    public function values_employee_childcare_reacquisition_reason()
    {
        return $this->belongsTo(Values_employee_childcare_reacquisition_reason::class, 'childcare_reacquisition_reason', 'id');
    }

    public function work_contract()
    {
        return $this->hasOne(Work_contract::class);
    }
}
