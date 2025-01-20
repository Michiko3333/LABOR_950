<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterEmployeeList extends Model
{
    use HasFactory;

    protected $table = 'm_filter_employee_list';

    protected $fillable = [
        'name',
        'value',
        'order',
        'parent',
        'hidden_default',
        'hidden_normal',
        'hidden_basic_department',
        'delete_flg'
    ];
}
