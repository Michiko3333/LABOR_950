<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup_setting extends Model
{
    protected $table = 'm_pickup_setting';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'nursing_care_insurance_premium_deduction_begins',
        'application_for_attainment_wage_certificate',
        'end_of_nursing_care_insurance_premium_deduction',
        'loss_of_eligibility_for_employees_pension_insurance',
        'loss_of_health_insurance_status',
        'labor_insurance_annual_renewal_start',
        'labor_insurance_annual_renewal_end',
        'year_end_tax_adjustment_start',
        'year_end_tax_adjustment_end',
        'retirement_age',
        'retirement',
        'officers_ids',
        'officers_birthday',
        'settlement_date',
        'start_of_closure',
        'end_of_closure',
        'change_in_dependent_status',
        'subsidies_and_grants',
        'report_on_the_status_of_elderly_and_disabled_people',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
