<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar_event extends Model
{
    protected $table = 't_calendar_event';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'subsidies_name',
        'from',
        'to',
        'contents'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
