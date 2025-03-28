<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterEmployeeColumns extends Model
{
    use HasFactory;

    protected $table = 't_filter_employee_columns';

    protected $fillable = [
        'company_id',
        'employee_id',
        'pattern_id',
        'value',
        'order',
        'delete_flg'
    ];

    public function pattern()
    {
        return $this->belongsTo(FilterEmployeePatterns::class, 'pattern_id', 'id');
    }
}
