<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'm_salary';
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

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function salary_history()
    {
        return $this->hasMany(Salary_history::class);
    }
}
