<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceColumns extends Model
{
    use HasFactory;
    protected $table = 'm_attendance_columns';
    protected $primaryKey = 'id';
}
