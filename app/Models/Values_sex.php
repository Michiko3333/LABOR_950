<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_sex extends Model
{
    protected $table = 'm_values_sex';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class,'id','sex');
    }

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','sex');
    }
}