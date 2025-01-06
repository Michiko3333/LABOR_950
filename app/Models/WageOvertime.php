<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageOvertime extends Model
{
    use HasFactory;

    protected $table = 't_wage_overtime';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'wage_id',
        'name',
        'amount'
    ];

    public function wage()
    {
        return $this->belongsTo(Wage::class, 'wage_id');
    }
}
