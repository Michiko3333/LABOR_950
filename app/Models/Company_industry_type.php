<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_industry_type extends Model
{
    protected $table = 'm_company_industry_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'industry_type_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function industry_type()
    {
        return $this->belongsTo(Industry_type::class);
    }
}
