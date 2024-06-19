<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_type extends Model
{
    protected $table = 'm_company_type';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
