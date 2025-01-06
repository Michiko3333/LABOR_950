<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;

    protected $table = 't_wage';
    protected $primaryKey = 'id';

    public function salary()
    {
        return $this->hasMany(WageSalary::class, 'wage_id', 'id');
    }

    public function allowance()
    {
        return $this->hasMany(WageAllowance::class, 'wage_id', 'id');
    }

    public function overtime()
    {
        return $this->hasMany(WageOvertime::class, 'wage_id', 'id');
    }
}
