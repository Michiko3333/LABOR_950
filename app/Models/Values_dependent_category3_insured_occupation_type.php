<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_dependent_category3_insured_occupation_type extends Model
{
    protected $table = 'm_values_dependent_category3_insured_occupation_type';
    protected $primaryKey = 'id';

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','category3_insured_occupation_type');
    }
}