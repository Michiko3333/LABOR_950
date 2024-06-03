<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csv_count extends Model
{
    protected $table = 'm_csv_count';
    protected $primaryKey = 'id';
    protected $fillable = ['count'];

    public function company()
    {
        return $this->hasMany(Company::class, 'company_id');
    }
}
