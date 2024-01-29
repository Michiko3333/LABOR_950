<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_department extends Model
{
    protected $table = 'm_employee_department';
    protected $primaryKey = 'id';

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
