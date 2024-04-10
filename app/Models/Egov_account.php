<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egov_account extends Model
{
    protected $table = 'm_egov_account';
    protected $primaryKey = 'id';
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
