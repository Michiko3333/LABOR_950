<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $table = 'm_allowance';
    protected $primaryKey = 'id';
    protected $fillable = [
        'branch_id',
        'name',
        'history_flg',
        'delete_flg',
        'end_date_of_application',
        'applied_date',
    ];
}
