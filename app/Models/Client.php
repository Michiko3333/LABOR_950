<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'm_client';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class,'client_company_id','id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

