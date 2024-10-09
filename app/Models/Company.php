<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'm_company';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'name_kana',
        'name_en',
        'name_abbreviation',
        'company_no',
        'company_type_id',
        'license_no',
        'business_type',
        'listed_type',
        'stock_code',
        'founding_date',
        'establishment_date',
        'capital',
        'annual_sales',
        'employee_sum',
        'qualification',
        'authorized_shares',
        'issued_shares',
        'supplier_company',
        'outsourcing_company',
        'sales_company',
        'representative',
        'bank_name',
        'url',
        'purpose',
        'company_division',
        'start_month_of_year',
        'start_day_of_month',
        'start_day_of_week'
    ];

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
        return $this->hasMany(Receptionist::class, 'id', 'client_company_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'id', 'client_company_id');
    }

    public function managerial_position()
    {
        return $this->hasMany(Managerial_position::class);
    }

    public function external_advisor_receptioninst()
    {
        return $this->hasMany(External_advisor_receptioninst::class);
    }

    public function egov_account()
    {
        return $this->hasOne(Egov_account::class);
    }

    public function company_files()
    {
        return $this->hasMany(Company_files::class);
    }
}
