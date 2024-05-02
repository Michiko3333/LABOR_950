<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Managerial_position extends Model
{
    protected $table = 'm_managerial_position';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
