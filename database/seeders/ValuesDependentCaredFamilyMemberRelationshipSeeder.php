<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValuesDependentCaredFamilyMemberRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_values_dependent_cared_family_member_relationship')->insert([
            ['name' => '配偶者'],
            ['name' => '父母'],
            ['name' => '子'],
            ['name' => '配偶者の父母'],
            ['name' => '祖父母'],
            ['name' => '兄弟姉妹'],
            ['name' => '孫']
        ]);
    }
}
