<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egov_application extends Model
{
    protected $table = 't_egov_application';
    protected $primaryKey = 'id';
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
