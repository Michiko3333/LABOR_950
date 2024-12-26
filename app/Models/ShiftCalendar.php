<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShiftCalendar extends Model
{
    protected $table = 'm_shift_calendar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'branch_id',
        'title',
        'year',
        'month',
        'day',
        'week',
        'is_default'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
