<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'm_branch';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'company_id',
        'post_code',
        'address_prefecture',
        'address_city',
        'address_ward',
        'address_apartment',
        'tel_area_code',
        'tel_city_code',
        'tel_subscriber_code',
        'tel_overseas',
        'place_type',
        'branch_type',
        'labor_insurance_no',
        'labor_insurance_payment_method',
        'labor_insurance_establishment_date',
        'insurance_office_no',
        'insurance_office_reference_no',
        'pension_office_no',
        'pension_office_reference_prefecture',
        'pension_office_reference_no_cities',
        'pension_office_reference_no_office',
        'pension_office_id',
        'employment_insurance_office_no',
        'employment_insurance_establishment_date',
        'hello_work_id',
        'labor_bureau_id',
        'labor_supervision_id',
        'start_date_of_month',
        'start_days_of_week',
        'start_time_of_day',
        'work_time_start',
        'work_time_end',
        'agreed_hours_year',
        'agreed_hours_month',
        'agreed_hours_week',
        'agreed_hours_day',
        'working_days_yearly',
        'working_days_monthly',
        'holiday_yearly',
        'holiday_monthly',
        'holiday_legal',
        'holiday_not_logal',
        'work_style_type',
        'mail_address',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function salary_breakdown()
    {
        return $this->hasMany(Salary_breakdown::class);
    }

    public function labor_contract()
    {
        return $this->hasMany(Labor_contract::class);
    }

    public function work_contract()
    {
        return $this->hasMany(Work_contract::class);
    }
}
