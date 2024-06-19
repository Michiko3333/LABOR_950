<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'm_bank';
    protected $primaryKey = 'id';

    public function contracted_bank()
    {
        return $this->hasMany(Contracted_bank::class);
    }
}

