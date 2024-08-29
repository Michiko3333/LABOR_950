<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csv_count extends Model
{
    protected $table = 'm_csv_count';
    protected $primaryKey = 'id';
    protected $fillable = ['branch_id', 'pension_office_no', 'count'];

    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }
}
