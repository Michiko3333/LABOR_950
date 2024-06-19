<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $table = 'm_receptionist';
    protected $primaryKey = 'id';
    protected $fillable = ['client_company_id', 'employee_id', 'contract_start_date', 'contract_end_date'];

    public function company()
    {
        return $this->belongsTo(Company::class,'client_company_id','id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
