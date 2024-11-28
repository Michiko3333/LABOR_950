<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    protected $table = 'm_qualifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'qualification_name',
        'qualification_allowance',
        'applicable_grade',
        'delete_flg',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee_qualifications()
    {
        return $this->belongsTo(Company::class);
    }
}
