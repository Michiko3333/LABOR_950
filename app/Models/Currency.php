<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'm_currency';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

}
