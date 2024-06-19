<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_application_form')->insert([
            [
                'id' => '1', 
                'ledger_id' => '1', 
                'style_id' => '495008680033800330', 
                'style_name' => '雇用保険被保険者資格取得届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '2', 
                'ledger_id' => '2', 
                'style_id' => '495008680034800340', 
                'style_name' => '雇用保険被保険者資格喪失届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '3', 
                'ledger_id' => '3', 
                'style_id' => '495008680035800350', 
                'style_name' => '雇用保険被保険者資格喪失届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '4', 
                'ledger_id' => '4', 
                'style_id' => '495008680040800400', 
                'style_name' => '雇用保険被保険者転勤届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '5', 
                'ledger_id' => '5', 
                'style_id' => '495008680048800480', 
                'style_name' => '雇用保険被保険者休業開始時賃金月額証明書／所定労働時間短縮開始時賃金証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '6', 
                'ledger_id' => '6', 
                'style_id' => '495008680048800480', 
                'style_name' => '高年齢雇用継続給付支給申請書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '7', 
                'ledger_id' => '7', 
                'style_id' => '495008680047800470', 
                'style_name' => '高年齢雇用継続給付支給申請書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '8', 
                'ledger_id' => '8', 
                'style_id' => '495008680035800350', 
                'style_name' => '雇用保険被保険者資格喪失届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '9', 
                'ledger_id' => '9', 
                'style_id' => '495008680035800350', 
                'style_name' => '雇用保険育児休業給付（育児休業給付金）の申請（令和４年６月以降手続き）／電子申請 ', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '10', 
                'ledger_id' => '10', 
                'style_id' => '495008680045800450', 
                'style_name' => '高年齢雇用継続給付受給資格確認票・（初回）高年齢雇用継続給付支給申請書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '11', 
                'ledger_id' => '10', 
                'style_id' => '495008680045800451', 
                'style_name' => '雇用保険被保険者六十歳到達時等賃金証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '12', 
                'ledger_id' => '11', 
                'style_id' => '495008680044800440', 
                'style_name' => '高年齢雇用継続給付受給資格確認票・（初回）高年齢雇用継続給付支給申請書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '13', 
                'ledger_id' => '11', 
                'style_id' => '495008680044800441', 
                'style_name' => '雇用保険被保険者六十歳到達時等賃金証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '14', 
                'ledger_id' => '12', 
                'style_id' => '495008680051800510', 
                'style_name' => '介護休業給付金支給申請書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '15', 
                'ledger_id' => '12', 
                'style_id' => '495008680051800511', 
                'style_name' => '雇用保険被保険者休業開始時賃金月額証明書／所定労働時間短縮開始時賃金証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '16', 
                'ledger_id' => '13', 
                'style_id' => '495013520711030508', 
                'style_name' => '健康保険・厚生年金保険被保険者資格取得届（単記用）（２０１９年５月以降手続き）／電子申請', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '17', 
                'ledger_id' => '14', 
                'style_id' => '495013520714030511', 
                'style_name' => '健康保険・厚生年金保険被保険者資格取得届（単記用）（２０１９年５月以降手続き）／電子申請', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '18', 
                'ledger_id' => '15', 
                'style_id' => '495013520996030719', 
                'style_name' => '健康保険被扶養者（異動）届/国民年金第３号被保険者関係届', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '19', 
                'ledger_id' => '15', 
                'style_id' => '495013520996030720', 
                'style_name' => '事業主等証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '20', 
                'ledger_id' => '15', 
                'style_id' => '495013520996030721', 
                'style_name' => '医療保険者証明書', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '21', 
                'ledger_id' => '16', 
                'style_id' => '4950013520990000', 
                'style_name' => '健康保険・厚生年金保険被保険者報酬月額変更届／７０歳以上被用者月額変更届／電子申請', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '22', 
                'ledger_id' => '17', 
                'style_id' => '495013520729030524', 
                'style_name' => '健康保険・厚生年金保険被保険者報酬月額算定基礎届／７０歳以上被用者算定基礎届／電子申請', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '23', 
                'ledger_id' => '18', 
                'style_id' => '495013520733030526', 
                'style_name' => '健康保険・厚生年金保険被保険者賞与支払届／７０歳以上被用者賞与支払届／電子申請', 
                'delete_flg' => '0', 
            ],
            [
                'id' => '24', 
                'ledger_id' => '19', 
                'style_id' => '495013520873030701', 
                'style_name' => '健康保険・厚生年金保険賞与不支給報告書／電子申請', 
                'delete_flg' => '0', 
            ]
        ]);
    }
}
