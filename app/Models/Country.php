<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'm_country';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function dependent()
    {
        return $this->hasMany(Dependent::class);
    }
}
