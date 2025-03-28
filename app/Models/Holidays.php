<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $table = 'm_holidays';
    protected $primaryKey = 'id';

    protected $fillable = [
        'holiday_name',
        'holiday_date',
        'delete_flg',
    ];
}
