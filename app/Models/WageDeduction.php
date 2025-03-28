<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageDeduction extends Model
{
    use HasFactory;
    protected $table = 't_wage_deduction';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'wage_id',
        'name',
        'amount',
        'delete_flg'
    ];

    public function wage()
    {
        return $this->belongsTo(Wage::class, 'wage_id');
    }
}
