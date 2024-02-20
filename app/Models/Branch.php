<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'm_branch';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function salary_breakdown()
    {
        return $this->hasMany(Salary_breakdown::class);
    }

    public function labor_contract()
    {
        return $this->hasMany(Labor_contract::class);
    }
}
