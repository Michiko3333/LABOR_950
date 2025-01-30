<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_employee_recruitment_category_detail extends Model
{
    protected $table = 'm_values_employee_recruitment_category_detail';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','recruitment_category_detail');
    }
}