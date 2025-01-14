<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerCategory extends Model
{
    protected $table = 'm_ledger_category';
    protected $primaryKey = 'id';

    public function ledger_category_medium()
    {
        return $this->belongsTo(LedgerCategoryMedium::class, 'id', 'medium_category_id');
    }
    
    public function ledger_category_big()
    {
        return $this->belongsTo(LedgerCategory::class, 'id', 'big_category_id');
    }

    public function ledger()
    {
        return $this->hasMany(Ledger::class, 'ledger_id', 'id');
    }
}

