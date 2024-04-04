<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_ledger')->insert([
            [
                'id' => '1', 
                'procedure_id' => '4950008680033000', 
                'procedure_name' => '雇用保険被保険者資格取得届（令和４年６月以降手続き）／電子申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '2', 
                'procedure_id' => '4950008680034000', 
                'procedure_name' => '雇用保険被保険者資格喪失届（離職票交付なし）', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '3', 
                'procedure_id' => '4950008680035000', 
                'procedure_name' => '雇用保険被保険者資格喪失届（離職票交付あり）', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '4', 
                'procedure_id' => '4950008680040000', 
                'procedure_name' => '雇用保険被保険者転勤届（令和４年６月以降手続き）', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '5', 
                'procedure_id' => '4950008680048000', 
                'procedure_name' => '休業開始時賃金月額証明書', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '6', 
                'procedure_id' => '4950008680046000', 
                'procedure_name' => '雇用保険高年齢雇用継続給付（高年齢雇用継続基本給付金）の申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '7', 
                'procedure_id' => '4950008680047000', 
                'procedure_name' => '高年齢雇用継続給付（高年齢再就職給付金）の申請 / 雇用保険高年齢雇用継続給付（高年齢再就職給付金）の申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '8', 
                'procedure_id' => '4950008680182000', 
                'procedure_name' => '育児休業給付金の申請（初回申請含む） （令和４年１０月以降手続き）／電子申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '9', 
                'procedure_id' => '4950008680050000', 
                'procedure_name' => '育児休業給付金の申請（初回申請含む）/（令和４年６月以降手続き）／電子申請　2回目以降', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '10', 
                'procedure_id' => '4950008680045000', 
                'procedure_name' => '雇用保険被保険者六十歳到達時賃金証明書の提出及び高年齢雇用継続給付金受給資格確認（初回申請含む）　/　雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '11', 
                'procedure_id' => '4950008680044000', 
                'procedure_name' => '雇用保険被保険者六十歳到達時賃金証明書の提出及び高年齢雇用継続給付金受給資格確認（初回申請含む）/雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '12', 
                'procedure_id' => '4950008680051000', 
                'procedure_name' => '介護休業給付（介護休業給付金）の申請 / 雇用保険介護休業給付（介護休業給付金）の申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '13', 
                'procedure_id' => '4950013520711000', 
                'procedure_name' => '資格取得届（CSVを含む） /  健康保険・厚生年金保険被保険者資格取得届', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '14', 
                'procedure_id' => '4950013520714000', 
                'procedure_name' => '資格喪失届（CSVを含む）  / 健康保険・厚生年金保険被保険者資格喪失届', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '15', 
                'procedure_id' => '4950013520996000', 
                'procedure_name' => '健康保険被扶養者（異動）届 / 健康保険被扶養者（異動）・国民年金第3号被保険者関係届', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '16', 
                'procedure_id' => '4950013520990000', 
                'procedure_name' => '健康保険・厚生年金保険被保険者報酬月額変更届（単記用）（２０１９年５月以降手続き） ', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '17', 
                'procedure_id' => '4950013520989000', 
                'procedure_name' => '健康保険・厚生年金保険被保険者報酬月額算定基礎届（単記用）（２０１９年５月以降手続き） ', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '18', 
                'procedure_id' => '4950013520733000', 
                'procedure_name' => '健康保険・厚生年金保険被保険者賞与支払届（単記用）（２０１９年５月以降手続き） ', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ],
            [
                'id' => '19', 
                'procedure_id' => '4950013520873000', 
                'procedure_name' => '健康保険・厚生年金保険賞与不支給報告書／電子申請', 
                'procedure_type' => NULL, 
                'delete_flg' => '0', 
            ]
          ]);
    }
}
