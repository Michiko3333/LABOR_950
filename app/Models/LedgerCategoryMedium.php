<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerCategoryMedium extends Model
{
    protected $table = 'm_ledger_category_medium';
    protected $primaryKey = 'id';

    public function ledger_category()
    {
        return $this->hasMany(LedgerCategory::class, 'medium_category_id', 'id');
    }

    public function ledger_category_big()
    {
        return $this->hasMany(LedgerCategoryBig::class, 'big_category_id', 'id');
    }
}

