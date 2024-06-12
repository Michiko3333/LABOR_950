<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csv_count extends Model
{
    protected $table = 'm_csv_count';
    protected $primaryKey = 'id';
    protected $fillable = ['branch_id', 'employee_id', 'count'];

    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }
}
