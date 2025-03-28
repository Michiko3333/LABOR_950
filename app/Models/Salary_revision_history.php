<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary_revision_history extends Model
{
    protected $table = 'm_salary_revision_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'monthly_standard_salary',
        'health_insurance',
        'welfare_annuity_insurance',
        'revision_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
