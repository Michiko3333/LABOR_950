<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'm_feature';
    protected $primaryKey = 'id';

    public function account_permission()
    {
        return $this->hasMany(Account_permission::class);
    }
}
