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
        DB::table('m_ledger')->truncate();
        DB::table('m_ledger')->insert([
            [
                'id' => '1',
                'procedure_id' => '4950008680033000',
                'procedure_name' => '雇用保険被保険者資格取得届（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '2',
                'procedure_id' => '4950008680034000',
                'procedure_name' => '雇用保険被保険者資格喪失届（離職票交付なし）（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '3',
                'procedure_id' => '4950008680035000',
                'procedure_name' => '雇用保険被保険者資格喪失届（離職票交付あり）（令和４年６月以降手続き）',
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
                'procedure_name' => '雇用保険被保険者休業開始時賃金月額証明書又は同休業・所定労働時間短縮開始時賃金証明書の提出（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '6',
                'procedure_id' => '4950008680046000',
                'procedure_name' => '雇用保険高年齢雇用継続給付（高年齢雇用継続基本給付金）の申請（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '7',
                'procedure_id' => '4950008680047000',
                'procedure_name' => '雇用保険高年齢雇用継続給付（高年齢再就職給付金）の申請（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '8',
                'procedure_id' => '4950008680182000',
                'procedure_name' => '雇用保険育児休業給付（育児休業給付金）の申請（初回申請）（令和４年１０月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '9',
                'procedure_id' => '4950008680050000',
                'procedure_name' => '雇用保険育児休業給付（育児休業給付金）の申請（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '10',
                'procedure_id' => '4950008680045000',
                'procedure_name' => '雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認・高年齢雇用継続給付（高年齢雇用継続基本給付金・高年齢再就職給付金）の申請（初回申請）（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '11',
                'procedure_id' => '4950008680044000',
                'procedure_name' => '雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '12',
                'procedure_id' => '4950008680051000',
                'procedure_name' => '雇用保険介護休業給付（介護休業給付金）の申請（令和４年６月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '13',
                'procedure_id' => '4950013520711000',
                'procedure_name' => '健康保険・厚生年金保険被保険者資格取得届（単記用）（２０１９年５月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '14',
                'procedure_id' => '4950013520714000',
                'procedure_name' => '健康保険・厚生年金保険被保険者資格喪失届（単記用）（２０１９年５月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '15',
                'procedure_id' => '4950013520996000',
                'procedure_name' => '健康保険被扶養者（異動）・国民年金第３号被保険者関係届（２０２２年１０月以降手続き）',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '16',
                'procedure_id' => '4950013520990000',
                'procedure_name' => '健康保険・厚生年金保険被保険者報酬月額変更届／７０歳以上被用者月額変更届',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '17',
                'procedure_id' => '4950013520989000',
                'procedure_name' => '健康保険・厚生年金保険被保険者報酬月額算定基礎届／７０歳以上被用者算定基礎届',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '18',
                'procedure_id' => '4950013520991000',
                'procedure_name' => '健康保険・厚生年金保険被保険者賞与支払届／７０歳以上被用者賞与支払届',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ],
            [
                'id' => '19',
                'procedure_id' => '4950013520873000',
                'procedure_name' => '健康保険・厚生年金保険賞与不支給報告書',
                'procedure_type' => NULL,
                'delete_flg' => '0',
            ]
        ]);
    }
}
