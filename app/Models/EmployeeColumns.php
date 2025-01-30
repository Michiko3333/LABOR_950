<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeColumns extends Model
{
    use HasFactory;
    protected $table = 'm_employee_columns';
    protected $primaryKey = 'id';
}
