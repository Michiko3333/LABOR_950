<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar_event extends Model
{
    protected $table = 't_calendar_event';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'employee_id',
        'name',
        'subsidies_name',
        'category_type',
        'from',
        'to',
        'contents',
        'repetition_type',
        'identifier'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }
}
