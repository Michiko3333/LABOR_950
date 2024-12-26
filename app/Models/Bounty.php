<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounty extends Model
{
    protected $table = 'm_bounty';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bounty_id',
        'department_id',
        'branch_id',
        'applied_date',
        'bonus_payment_month',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function bounty_history()
    {
        return $this->hasMany(Bounty_history::class);
    }
}
