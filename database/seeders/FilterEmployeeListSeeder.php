<?php

namespace Database\Seeders;

use App\Models\FilterEmployeeList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterEmployeeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilterEmployeeList::truncate();
        FilterEmployeeList::create([
            'name' => '氏名',
            'value' => 'full_name',
            'order' => 1,
            'hidden_default' => 0,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '顔写真',
            'value' => 'icon',
            'order' => 2,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);

        FilterEmployeeList::create([
            'name' => '役職',
            'value' => 'managerial_position',
            'order' => 3,
            'hidden_default' => 0,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '部署',
            'value' => 'departments',
            'order' => 4,
            'hidden_default' => 0,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '事業所',
            'value' => 'branch',
            'order' => 5,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '住所',
            'value' => 'full_address',
            'order' => 6,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => '電話番号',
            'value' => 'tel',
            'order' => 7,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
        FilterEmployeeList::create([
            'name' => 'Email',
            'value' => 'email',
            'order' => 8,
            'hidden_default' => 1,
            'hidden_basic_department' => 0
        ]);
    }
}
