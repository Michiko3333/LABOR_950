<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_qualifications extends Model
{
    protected $table = 'm_employee_qualifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'qualification_id',
        'delete_flg',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualifications::class);
    }
}
