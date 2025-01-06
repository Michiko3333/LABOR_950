<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageColumns extends Model
{
    use HasFactory;

    protected $table = 'm_wage_columns';
    protected $primaryKey = 'id';
}
