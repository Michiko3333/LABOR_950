<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_status_before_retirement extends Model
{
    protected $table = 't_payment_status_before_retirement';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
