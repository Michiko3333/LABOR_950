<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_company_type')->insert([
            [
                'company_type_name' => '株式会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => null,
            ],
            [
                'company_type_name' => '有限会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => null,
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
            ],
            [
                'company_type_name' => '合同会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
            ],
            [
                'company_type_name' => '合資会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
            ],
            [
                'company_type_name' => '協力組合',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
            ],
            [
                'company_type_name' => '管理組合',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
            ],
            [
                'company_type_name' => '互助会',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
            ],
            [
                'company_type_name' => '一般社団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
            ],
            [
                'company_type_name' => '公益社団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
            ],
            [
                'company_type_name' => 'NPO法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
            ],
            [
                'company_type_name' => '宗教法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
            ],
            [
                'company_type_name' => '地方公共団体',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
            ],
            [
                'company_type_name' => '独立行政法人',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
            ],
            [
                'company_type_name' => '特殊法人',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
            ],
        ]);
    }
}
