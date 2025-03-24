<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthStandardSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_month_standard_salary')->truncate();
        DB::table('m_month_standard_salary')->insert([
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 58000, 'monthly_salary_min' => 0, 'monthly_salary_max' => 63000, 'standard_salary_level' => 1],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 68000, 'monthly_salary_min' => 63000, 'monthly_salary_max' => 73000, 'standard_salary_level' => 2],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 78000, 'monthly_salary_min' => 73000, 'monthly_salary_max' => 83000, 'standard_salary_level' => 3],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 88000, 'monthly_salary_min' => 83000, 'monthly_salary_max' => 93000, 'standard_salary_level' => 4],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 98000, 'monthly_salary_min' => 93000, 'monthly_salary_max' => 101000, 'standard_salary_level' => 5],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 104000, 'monthly_salary_min' => 101000, 'monthly_salary_max' => 107000, 'standard_salary_level' => 6],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 110000, 'monthly_salary_min' => 107000, 'monthly_salary_max' => 114000, 'standard_salary_level' => 7],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 118000, 'monthly_salary_min' => 114000, 'monthly_salary_max' => 122000, 'standard_salary_level' => 8],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 126000, 'monthly_salary_min' => 122000, 'monthly_salary_max' => 130000, 'standard_salary_level' => 9],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 134000, 'monthly_salary_min' => 130000, 'monthly_salary_max' => 138000, 'standard_salary_level' => 10],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 142000, 'monthly_salary_min' => 138000, 'monthly_salary_max' => 146000, 'standard_salary_level' => 11],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 150000, 'monthly_salary_min' => 146000, 'monthly_salary_max' => 155000, 'standard_salary_level' => 12],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 160000, 'monthly_salary_min' => 155000, 'monthly_salary_max' => 165000, 'standard_salary_level' => 13],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 170000, 'monthly_salary_min' => 165000, 'monthly_salary_max' => 175000, 'standard_salary_level' => 14],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 180000, 'monthly_salary_min' => 175000, 'monthly_salary_max' => 185000, 'standard_salary_level' => 15],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 190000, 'monthly_salary_min' => 185000, 'monthly_salary_max' => 195000, 'standard_salary_level' => 16],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 200000, 'monthly_salary_min' => 195000, 'monthly_salary_max' => 210000, 'standard_salary_level' => 17],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 220000, 'monthly_salary_min' => 210000, 'monthly_salary_max' => 230000, 'standard_salary_level' => 18],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 240000, 'monthly_salary_min' => 230000, 'monthly_salary_max' => 250000, 'standard_salary_level' => 19],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 260000, 'monthly_salary_min' => 250000, 'monthly_salary_max' => 270000, 'standard_salary_level' => 20],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 280000, 'monthly_salary_min' => 270000, 'monthly_salary_max' => 290000, 'standard_salary_level' => 21],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 300000, 'monthly_salary_min' => 290000, 'monthly_salary_max' => 310000, 'standard_salary_level' => 22],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 320000, 'monthly_salary_min' => 310000, 'monthly_salary_max' => 330000, 'standard_salary_level' => 23],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 340000, 'monthly_salary_min' => 330000, 'monthly_salary_max' => 350000, 'standard_salary_level' => 24],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 360000, 'monthly_salary_min' => 350000, 'monthly_salary_max' => 370000, 'standard_salary_level' => 25],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 380000, 'monthly_salary_min' => 370000, 'monthly_salary_max' => 395000, 'standard_salary_level' => 26],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 410000, 'monthly_salary_min' => 395000, 'monthly_salary_max' => 425000, 'standard_salary_level' => 27],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 440000, 'monthly_salary_min' => 425000, 'monthly_salary_max' => 455000, 'standard_salary_level' => 28],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 470000, 'monthly_salary_min' => 455000, 'monthly_salary_max' => 485000, 'standard_salary_level' => 29],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 500000, 'monthly_salary_min' => 485000, 'monthly_salary_max' => 515000, 'standard_salary_level' => 30],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 530000, 'monthly_salary_min' => 515000, 'monthly_salary_max' => 545000, 'standard_salary_level' => 31],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 560000, 'monthly_salary_min' => 545000, 'monthly_salary_max' => 575000, 'standard_salary_level' => 32],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 590000, 'monthly_salary_min' => 575000, 'monthly_salary_max' => 605000, 'standard_salary_level' => 33],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 620000, 'monthly_salary_min' => 605000, 'monthly_salary_max' => 635000, 'standard_salary_level' => 34],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 650000, 'monthly_salary_min' => 635000, 'monthly_salary_max' => 665000, 'standard_salary_level' => 35],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 680000, 'monthly_salary_min' => 665000, 'monthly_salary_max' => 695000, 'standard_salary_level' => 36],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 710000, 'monthly_salary_min' => 695000, 'monthly_salary_max' => 730000, 'standard_salary_level' => 37],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 750000, 'monthly_salary_min' => 730000, 'monthly_salary_max' => 770000, 'standard_salary_level' => 38],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 790000, 'monthly_salary_min' => 770000, 'monthly_salary_max' => 810000, 'standard_salary_level' => 39],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 830000, 'monthly_salary_min' => 810000, 'monthly_salary_max' => 855000, 'standard_salary_level' => 40],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 880000, 'monthly_salary_min' => 855000, 'monthly_salary_max' => 905000, 'standard_salary_level' => 41],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 930000, 'monthly_salary_min' => 905000, 'monthly_salary_max' => 955000, 'standard_salary_level' => 42],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 980000, 'monthly_salary_min' => 955000, 'monthly_salary_max' => 1005000, 'standard_salary_level' => 43],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1030000, 'monthly_salary_min' => 1005000, 'monthly_salary_max' => 1055000, 'standard_salary_level' => 44],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1090000, 'monthly_salary_min' => 1055000, 'monthly_salary_max' => 1115000, 'standard_salary_level' => 45],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1150000, 'monthly_salary_min' => 1115000, 'monthly_salary_max' => 1175000, 'standard_salary_level' => 46],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1210000, 'monthly_salary_min' => 1175000, 'monthly_salary_max' => 1235000, 'standard_salary_level' => 47],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1270000, 'monthly_salary_min' => 1235000, 'monthly_salary_max' => 1295000, 'standard_salary_level' => 48],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1330000, 'monthly_salary_min' => 1295000, 'monthly_salary_max' => 1355000, 'standard_salary_level' => 49],
            ['applied_date' => '2024-03-01', 'monthly_standard_salary' => 1390000, 'monthly_salary_min' => 1355000, 'monthly_salary_max' => 9999999, 'standard_salary_level' => 50],
        ]);
    }
}
