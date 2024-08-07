<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_files extends Model
{
    protected $table = 't_company_files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'document_type',
        'file_name',
        'data',
        'delete_flg',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
