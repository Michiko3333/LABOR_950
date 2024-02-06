<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_shareholder_shareholder_type;

class ValuesShareholderShareholderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_shareholder_shareholder_type = Values_shareholder_shareholder_type::create([
            'name' => '代表取締役', 
        ]);

        $values_shareholder_shareholder_type = Values_shareholder_shareholder_type::create([
            'name' => '取締役', 
        ]);

    }
}
