<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    protected $table = 'm_shareholder';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
