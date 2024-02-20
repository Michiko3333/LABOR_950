<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'm_employee';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
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

    public function payment_status_before_retirement()
    {
        return $this->hasOne(Payment_status_before_retirement::class);
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
        return $this->hasMany(External_advisor_receptionist::class,'id','external_advisor_id');
    }

    public function values_employee_sex()
    {
        return $this->belongsTo(Values_employee_sex::class,'sex','id');
    }

    public function values_employee_insured_age_type()
    {
        return $this->belongsTo(Values_employee_insured_age_type::class,'insured_age_type','id');
    }

    public function values_employee_labor_insurance_type()
    {
        return $this->belongsTo(Values_employee_labor_insurance_type::class,'labor_insurance_type','id');
    }

    public function values_employee_employment_insurance_type()
    {
        return $this->belongsTo(Values_employee_employment_insurance_type::class,'employment_insurance_type','id');
    }

    public function values_employee_employee_type()
    {
        return $this->belongsTo(Values_employee_employee_type::class,'employee_type','id');
    }

    public function values_employee_employee_status()
    {
        return $this->belongsTo(Values_employee_employee_status::class,'employee_status','id');
    }

    public function values_employee_employment_route()
    {
        return $this->belongsTo(Values_employee_employment_route::class,'employment_route','id');
    }

    public function values_employee_insured_reason()
    {
        return $this->belongsTo(Values_employee_insured_reason::class,'insured_reason','id');
    }

    public function values_employee_employment_type()
    {
        return $this->belongsTo(Values_employee_employment_type::class,'employment_type','id');
    }

    public function values_employee_employment_status()
    {
        return $this->belongsTo(Values_employee_employment_status::class,'employment_status','id');
    }

    public function values_employee_employer_type()
    {
        return $this->belongsTo(Values_employee_employer_type::class,'employer_type','id');
    }

    public function values_employee_occupation_type()
    {
        return $this->belongsTo(Values_employee_occupation_type::class,'occupation_type','id');
    }

    public function values_employee_over_retired_insurance_loss_reason()
    {
        return $this->belongsTo(Values_employee_over_retired_insurance_loss_reason::class,'over_retired_insurance_loss_reason','id');
    }

    public function values_employee_insurance_loss_reason()
    {
        return $this->belongsTo(Values_employee_insurance_loss_reason::class,'insurance_loss_reason','id');
    }

    public function values_employee_salary_payment_system()
    {
        return $this->belongsTo(Values_employee_salary_payment_system::class,'salary_payment_system','id');
    }
}
