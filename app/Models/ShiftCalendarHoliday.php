<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShiftCalendarHoliday extends Model
{
    protected $table = 't_shift_calendar_holidays';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'shift_calendar_id',
        'year',
        'month',
        'day',
        'full_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function holidays()
    {
        return $this->belongsTo(ShiftCalendarHoliday::class, 'company_id', 'id');
    }
}
