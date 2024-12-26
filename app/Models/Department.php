<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'm_department';
    protected $primaryKey = 'id';

    public function employee_department()
    {
        return $this->hasMany(Employee_department::class);
    }

    public function department_permission()
    {
        return $this->hasOne(DepartmentPermission::class, 'department_permission_id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bonus()
    {
        return $this->hasMany(Bonus::class);
    }

    public function bounty()
    {
        return $this->hasMany(Bounty::class);
    }
}
