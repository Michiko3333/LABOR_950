<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Log;

use App\Models\Roles;

class DepartmentPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_data = [
            ['id' => 1, 'name' => '一般'],
            ['id' => 2, 'name' => '人事総務'],
            ['id' => 3, 'name' => '経理']
        ];
        Roles::insert($roles_data);
    }
}
