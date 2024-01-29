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
}
