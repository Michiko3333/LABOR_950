<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageInsuranceColumn extends Model
{
    use HasFactory;

    protected $table = 'm_wage_insurance_column';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'branch_id',
        'employee_id',
        'type',
        'keys',
        'delete_flg'
    ];
}
