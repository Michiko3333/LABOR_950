<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account_permission extends Model
{
    protected $table = 't_account_permission';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'feature_id',
        'read',
        'write',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
