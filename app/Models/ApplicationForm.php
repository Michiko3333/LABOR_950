<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    protected $table = 'm_application_form';
    protected $primaryKey = 'id';

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
