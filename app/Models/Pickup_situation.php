<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup_situation extends Model
{
    protected $table = 'm_pickup_situation';
    protected $primaryKey = 'id';

    public function pickup()
    {
        return $this->hsaOne(Company::class);
    }
}
