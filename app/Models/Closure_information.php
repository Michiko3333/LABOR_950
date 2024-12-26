<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Closure_information extends Model
{
    protected $table = 'm_closure_information';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'closure_type',
        'start_date_of_closed',
        'end_date_of_losed',
        'date_of_return_to_work',
        'due_date',
        'planned_end_date_of_closure',
        'date_of_birth',
        'date_of_start_of_foster_care',
        'planned_end_date_of_child_support',
        'end_date_of_foster_care',
        'date_of_commencement_of_special_childcare_provision',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
