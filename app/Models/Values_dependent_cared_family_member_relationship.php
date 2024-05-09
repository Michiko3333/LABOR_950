<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values_dependent_cared_family_member_relationship extends Model
{
    protected $table = 'm_values_dependent_cared_family_member_relationship';
    protected $primaryKey = 'id';

    public function dependent()
    {
        return $this->hasMany(Dependent::class,'id','cared_family_member_relationship');
    }
}