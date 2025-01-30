<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup_message extends Model
{
    protected $table = 'm_pickup_message';
    protected $primaryKey = 'id';

    public function pickup_type()
    {
        return $this->belongsTo(Pickup_type::class);
    }
}
