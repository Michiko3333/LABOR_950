<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus_history extends Model
{
    protected $table = 'm_bonus_history';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bonus_id',
        'department_id',
        'branch_id',
        'applied_date',
        'bonus_payment_month',
    ];

    public function bonus()
    {
        return $this->belongsTo(Bonus::class);
    }
}
