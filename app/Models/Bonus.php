<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table = 'm_bonus';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bonus_id',
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

    public function bonus_history()
    {
        return $this->hasMany(Bonus_history::class);
    }
}
