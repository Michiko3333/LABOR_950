<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Values_branch_place_type;

class ValuesBranchPlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_branch_place_type = values_branch_place_type::create([
            'name' => '国内', 
        ]);

        $values_branch_place_type = values_branch_place_type::create([
            'name' => '国外', 
        ]);

    }
}
