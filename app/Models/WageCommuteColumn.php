<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageCommuteColumn extends Model
{
    use HasFactory;

    protected $table = 'm_wage_commute_column';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'branch_id',
        'employee_id',
        'keys',
        'delete_flg'
    ];
}
