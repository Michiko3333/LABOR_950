<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_dependent_relationship extends Model
{
    protected $table = 'm_values_dependent_relationship';
    protected $primaryKey = 'id';

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','relationship');
    }
}