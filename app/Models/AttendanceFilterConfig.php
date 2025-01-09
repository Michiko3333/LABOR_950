<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceFilterConfig extends Model
{
    use HasFactory;
    protected $table = 't_attendance_filter_config';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'employee_id',
        'data'
    ];
}
