<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup_type extends Model
{
    protected $table = 'm_pickup_type';
    protected $primaryKey = 'id';

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }

    public function pickup_message()
    {
        return $this->hasOne(Pickup_message::class);
    }
}
