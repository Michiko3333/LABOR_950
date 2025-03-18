<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigWageUpload extends Model
{
    use HasFactory;

    protected $table = 'm_config_wage_upload';

    protected $fillable = [
        'company_id',
        'key',
        'name',
        'delete_flg'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
