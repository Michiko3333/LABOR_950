<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracted_bank extends Model
{
    protected $table = 'm_contracted_bank_list';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

}

