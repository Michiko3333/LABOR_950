<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterEmployeePatterns extends Model
{
    use HasFactory;

    protected $table = 't_filter_employee_patterns';

    protected $fillable = [
        'employee_id',
        'company_id',
        'name',
        'default_flg',
        'delete_flg'
    ];

    public function columns()
    {
        return $this->hasMany(FilterEmployeeColumns::class, 'pattern_id', 'id');
    }
}
