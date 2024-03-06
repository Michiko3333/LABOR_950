<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'm_ledger';
    protected $primaryKey = 'id';

    public function application_form()
    {
        return $this->hasMany(ApplicationForm::class);
    }
}

