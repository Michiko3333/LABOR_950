<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;

    protected $table = 't_wage';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'branch_id',
        'employee_id',
        'employee_no',
        'employee_name',
        'branch_name',
        'departments',
        'employment_type',
        'work_type',
        'grade',
        'gradational_salary',
        'other_type',
        'month',
        'total_amount',
        'wage_type',
        'wage_base_amount',
        'overtime_label',
        'allowance_label',
        'salary_amount',
        'absence_deduction',
        'late_deduction',
        'other_deduction',
        'taxable_payment',
        'non_taxable_payment',
        'labor_insurance_target',
        'social_insurance_target',
        'health_insurance_deduction',
        'nursing_care_insurance_deduction',
        'welfare_pension_deduction',
        'welfare_pension_insurance_deduction',
        'employment_insurance_deduction',
        'other_insurance_deduction',
        'social_insurance_amount',
        'withholding_tax',
        'resident_tax',
        'mutual_aid',
        'asset_saving',
        'other_deduction2',
        'deduction_sum',
        'wage_amount'
    ];

    public function salary()
    {
        return $this->hasMany(WageSalary::class, 'wage_id', 'id');
    }

    public function allowance()
    {
        return $this->hasMany(WageAllowance::class, 'wage_id', 'id');
    }

    public function overtime()
    {
        return $this->hasMany(WageOvertime::class, 'wage_id', 'id');
    }
}
