<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFilterEmployeeList extends Model
{
    use HasFactory;

    protected $table = 't_user_filter_employee_list';
    protected $fillable = [
        'employee_id',
        'value',
        'order',
        'delete_flg'
    ];
}
