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
                'example' => null,
            ],
            [
                'company_type_name' => '有限会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => null,
                'example' => null,
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '弁護士法人弁理士（特許業務）法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '司法書士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '行政書士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '税理士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '社会保険労務士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '土地家屋調査士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => '海事代理士法人',
            ],
            [
                'company_type_name' => '合名会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => 'その他　士業法人',
            ],
            [
                'company_type_name' => '合同会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => 'null',
            ],
            [
                'company_type_name' => '合資会社',
                'big_category' => '私法人',
                'medium_category' => '営利法人',
                'small_category' => '持分会社',
                'example' => null,
            ],
            [
                'company_type_name' => '協力組合',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
                'example' => null,
            ],
            [
                'company_type_name' => '管理組合',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
                'example' => null,
            ],
            [
                'company_type_name' => '互助会',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '中間法人',
                'example' => null,
            ],
            [
                'company_type_name' => '一般財団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => '公益財団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => '一般社団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => '公益社団法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => 'NPO法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => '宗教法人',
                'big_category' => '私法人',
                'medium_category' => '非営利法人',
                'small_category' => '公益法人',
                'example' => null,
            ],
            [
                'company_type_name' => '地方公共団体',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
                'example' => null,
            ],
            [
                'company_type_name' => '独立行政法人',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
                'example' => null,
            ],
            [
                'company_type_name' => '特殊法人',
                'big_category' => '公的法人',
                'medium_category' => null,
                'small_category' => null,
                'example' => null,
            ],
        ]);
    }
}
