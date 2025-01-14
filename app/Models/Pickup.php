<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'm_pickup';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'pickup_type',
        'employee_id',
        'dependent_id',
        'year',
        'month',
        'starting_date',
        'due_date',
        'calendar_event_id',
        'business_name',
        'content',
        'responder_id',
        'pickup_situation_id',
        'anonymous_flg',
        'delete_flg',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function dependent()
    {
        return $this->belongsTo(Dependent::class);
    }

    public function pickup_type()
    {
        return $this->hasMany(Pickup_type::class);
    }

    public function calendar_event()
    {
        return $this->hasMany(Calendar_event::class);
    }

    public function pickup_situation()
    {
        return $this->belongsTo(Pickup_situation::class);
    }
}
