<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    protected $table = 'm_executive';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
