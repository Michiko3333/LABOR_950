<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary_revision extends Model
{
    protected $table = 'm_salary_revision';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'monthly_standard_salary',
        'health_insurance',
        'welfare_annuity_insurance',
        'revision_date',
        'fixed_flg',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
