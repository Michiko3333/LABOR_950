<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_dependent_living_type extends Model
{
    protected $table = 'm_values_dependent_living_type';
    protected $primaryKey = 'id';

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','living_type');
    }
}