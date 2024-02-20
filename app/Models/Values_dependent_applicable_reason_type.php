<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_dependent_applicable_reason_type extends Model
{
    protected $table = 'm_values_dependent_applicable_reason_type';
    protected $primaryKey = 'id';

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','special_requirements_applicable_reason_type');
    }
}