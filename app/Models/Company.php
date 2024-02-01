<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'm_company';
    protected $primaryKey = 'id';

    public function company_type()
    {
        return $this->belongsTo(Company_type::class);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    public function contracted_bank()
    {
        return $this->hasMany(Contracted_bank::class);
    }

    public function shareholder()
    {
        return $this->hasMany(Shareholder::class);
    }

    public function executive()
    {
        return $this->hasMany(Executive::class);
    }

    public function company_industry_type()
    {
        return $this->hasMany(Company_industry_type::class);
    }

    public function receptionist()
    {
        return $this->hasMany(Receptionist::class,'id','client_company_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class,'id','client_company_id');
    }
}

