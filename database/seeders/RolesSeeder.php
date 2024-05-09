<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Log;

use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_data = [
            ['id' => 999, 'name' => '管理者'],
            ['id' => 500, 'name' => '社労士'],
            ['id' => 100, 'name' => '一般社員']
        ];
        Roles::insert($roles_data);
    }
}
