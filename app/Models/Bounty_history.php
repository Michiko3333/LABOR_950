<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounty_history extends Model
{
    protected $table = 'm_bounty_history';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bounty_id',
        'department_id',
        'branch_id',
        'applied_date',
        'bonus_payment_month',
    ];

    public function bounty()
    {
        return $this->belongsTo(Bounty::class);
    }
}
