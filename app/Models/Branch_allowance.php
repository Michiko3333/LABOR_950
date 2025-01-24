<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_allowance extends Model
{
    protected $table = 'm_branch_allowance';
    protected $primaryKey = 'id';

    protected $fillable = [
        'branch_id',
        'allowance',
        'amount',
        'pay_month',
        'target',
        'remarks',
        'applied_date',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function branch_allowance_history()
    {
        return $this->hasMany(Branch_allowance_history::class);
    }
}
