<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 't_attendance';
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
        'month',
        'actual_working_days',
        'working_days',
        'working_normal_days',
        'working_off_days',
        'working_legal_days',
        'working_time',
        'overtime',
        'overtime_low',
        'overtime_normal',
        'overtime_early',
        'overtime_late',
        'overtime_off',
        'working_off_time',
        'holidays',
        'holidays_special',
        'holidays_comp',
        'holidays_legal',
        'holidays_public',
        'holidays_transfered',
        'absent_days',
        'paid_leave',
        'remaining_paid_leave',
        'late_days',
        'early_days',
        'late_time',
        'early_time',
        'maternity_leave',
        'childcare_leave',
        'nursing_leave',
        'other1',
        'other2',
        'other3'
    ];
}
