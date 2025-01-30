<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_allowance_history extends Model
{
    protected $table = 'm_branch_allowance_history';
    protected $primaryKey = 'id';

    protected $fillable = [
        'branch_id',
        'allowance_id',
        'allowance',
        'amount',
        'pay_month',
        'target',
        'remarks',
        'applied_date',
    ];

    public function branch_allowance()
    {
        return $this->belongsTo(Branch_allowance::class);
    }
}
