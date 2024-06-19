<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry_type extends Model
{
    protected $table = 'm_industry_type';
    protected $primaryKey = 'id';

    public function company_industry_type()
    {
        return $this->hasMany(Company_industry_type::class);
    }
}
