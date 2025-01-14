<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerCategoryBig extends Model
{
    protected $table = 'm_ledger_category_big';
    protected $primaryKey = 'id';

    public function ledger_category_medium()
    {
        return $this->belongsTo(LedgerCategoryMedium::class, 'big_category_id', 'id');
    }
    
    public function ledger_category()
    {
        return $this->hasMany(LedgerCategory::class, 'big_category_id', 'id');
    }
}

