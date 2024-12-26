<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary_history extends Model
{
    protected $table = 'm_salary_history';
    protected $primaryKey = 'id';

    protected $fillable = [
        'salary_id',
        'department_id',
        'branch_id',
        'applied_date',
        'payroll_deadline',
        'payroll_month',
        'payroll_day',
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
