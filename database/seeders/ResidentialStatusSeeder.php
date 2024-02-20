<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentialStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_residential_status')->insert([
            [
                'setting_value' => '35',
                'content' => '技術・人文知識・国際業務',
            ],
            [
                'setting_value' => '10',
                'content' => '技術（※廃止済）',
            ],
            [
                'setting_value' => '11',
                'content' => '人文知識・国際業務（※廃止済）',
            ],
            [
                'setting_value' => '12',
                'content' => '企業内転勤',
            ],
            [
                'setting_value' => '09',
                'content' => '教育',
            ],
            [
                'setting_value' => '01',
                'content' => '教授',
            ],
            [
                'setting_value' => '14',
                'content' => '技能',
            ],
            [
                'setting_value' => '39',
                'content' => '高度専門職1号',
            ],
            [
                'setting_value' => '40',
                'content' => '高度専門職2号',
            ],
            [
                'setting_value' => '26',
                'content' => '永住者',
            ],
            [
                'setting_value' => '27',
                'content' => '日本人の配偶者等',
            ],
            [
                'setting_value' => '28',
                'content' => '永住者の配偶者等',
            ],
            [
                'setting_value' => '29',
                'content' => '定住者',
            ],
            [
                'setting_value' => '15',
                'content' => '技能実習',
            ],
            [
                'setting_value' => '23',
                'content' => '特定活動（ワーキングホリデー）',
            ],
            [
                'setting_value' => '24',
                'content' => '特定活動（EPA）',
            ],
            [
                'setting_value' => '36',
                'content' => '特定活動（建設分野）',
            ],
            [
                'setting_value' => '37',
                'content' => '特定活動（造船分野）',
            ],
            [
                'setting_value' => '38',
                'content' => '特定活動（外国人調理師）',
            ],
            [
                'setting_value' => '41',
                'content' => '特定活動（ハラール牛肉生産）',
            ],
            [
                'setting_value' => '42',
                'content' => '特定活動（製造分野）',
            ],
            [
                'setting_value' => '43',
                'content' => '特定活動（家事支援）',
            ],
            [
                'setting_value' => '44',
                'content' => '特定活動（就職活動）',
            ],
            [
                'setting_value' => '48',
                'content' => '特定活動（本邦大卒者）',
            ],
            [
                'setting_value' => '46',
                'content' => '特定活動（農業）',
            ],
            [
                'setting_value' => '47',
                'content' => '特定活動（日系四世）',
            ],
            [
                'setting_value' => '31',
                'content' => '特定活動（高度学術研究活動）',
            ],
            [
                'setting_value' => '32',
                'content' => '特定活動（高度専門・技術活動）',
            ],
            [
                'setting_value' => '33',
                'content' => '特定活動（高度経営・管理活動）',
            ],
            [
                'setting_value' => '34',
                'content' => '特定活動（高度人材外国人の就労配偶者）',
            ],
            [
                'setting_value' => '65',
                'content' => '特定活動（就労可）',
            ],
            [
                'setting_value' => '25',
                'content' => '特定活動（その他）',
            ],
            [
                'setting_value' => '18',
                'content' => '留学',
            ],
            [
                'setting_value' => '21',
                'content' => '家族滞在',
            ],
            [
                'setting_value' => '02',
                'content' => '芸術',
            ],
            [
                'setting_value' => '03',
                'content' => '宗教',
            ],
            [
                'setting_value' => '04',
                'content' => '報道',
            ],
            [
                'setting_value' => '05',
                'content' => '経営・管理',
            ],
            [
                'setting_value' => '06',
                'content' => '法律・会計業務',
            ],
            [
                'setting_value' => '07',
                'content' => '医療',
            ],
            [
                'setting_value' => '45',
                'content' => '介護',
            ],
            [
                'setting_value' => '08',
                'content' => '研究',
            ],
            [
                'setting_value' => '13',
                'content' => '興行',
            ],
            [
                'setting_value' => '16',
                'content' => '文化活動',
            ],
            [
                'setting_value' => '17',
                'content' => '短期滞在',
            ],
            [
                'setting_value' => '20',
                'content' => '研修',
            ],
            [
                'setting_value' => '49',
                'content' => '特定技能1号（介護）',
            ],
            [
                'setting_value' => '50',
                'content' => '特定技能1号（ビルクリーニング）',
            ],
            [
                'setting_value' => '66',
                'content' => '特定技能1号（素形材・産業機械・電気電子情報関連製造業）',
            ],
            [
                'setting_value' => '51',
                'content' => '特定技能1号（素形材産業）（※廃止済）',
            ],
            [
                'setting_value' => '52',
                'content' => '特定技能1号（産業機械製造業）（※廃止済）',
            ],
            [
                'setting_value' => '53',
                'content' => '特定技能1号（電気・電子情報関連産業）（※廃止済）',
            ],
            [
                'setting_value' => '54',
                'content' => '特定技能1号（建設）',
            ],
            [
                'setting_value' => '55',
                'content' => '特定技能1号（造船・舶用工業）',
            ],
            [
                'setting_value' => '56',
                'content' => '特定技能1号（自動車整備）',
            ],
            [
                'setting_value' => '57',
                'content' => '特定技能1号（航空）',
            ],
            [
                'setting_value' => '58',
                'content' => '特定技能1号（宿泊）',
            ],
            [
                'setting_value' => '59',
                'content' => '特定技能1号（農業）',
            ],
            [
                'setting_value' => '60',
                'content' => '特定技能1号（漁業）',
            ],
            [
                'setting_value' => '61',
                'content' => '特定技能1号（飲食料品製造業）',
            ],
            [
                'setting_value' => '62',
                'content' => '特定技能1号（外食業）',
            ],
            [
                'setting_value' => '67',
                'content' => '特定技能2号（ビルクリーニング）',
            ],
            [
                'setting_value' => '68',
                'content' => '特定技能2号（素形材・産業機械・電気電子情報関連製造業）',
            ],
            [
                'setting_value' => '63',
                'content' => '特定技能2号（建設）',
            ],
            [
                'setting_value' => '64',
                'content' => '特定技能2号（造船・舶用工業）',
            ],
            [
                'setting_value' => '69',
                'content' => '特定技能2号（自動車整備）',
            ],
            [
                'setting_value' => '70',
                'content' => '特定技能2号（航空）',
            ],
            [
                'setting_value' => '71',
                'content' => '特定技能2号（宿泊）',
            ],
            [
                'setting_value' => '72',
                'content' => '特定技能2号（農業）',
            ],
            [
                'setting_value' => '73',
                'content' => '特定技能2号（漁業）',
            ],
            [
                'setting_value' => '74',
                'content' => '特定技能2号（飲食料品製造業）',
            ],
            [
                'setting_value' => '75',
                'content' => '特定技能2号（外食業）',
            ],
            [
                'setting_value' => '76',
                'content' => '被監理者',
            ],
            [
                'setting_value' => '77',
                'content' => '仮滞在許可者',
            ],
            [
                'setting_value' => '78',
                'content' => '【※指示がある場合のみ使用１】',
            ],
            [
                'setting_value' => '79',
                'content' => '【※指示がある場合のみ使用２】',
            ],
            [
                'setting_value' => '80',
                'content' => '【※指示がある場合のみ使用３】',
            ],
            [
                'setting_value' => '81',
                'content' => '【※指示がある場合のみ使用４】',
            ],
            [
                'setting_value' => '82',
                'content' => '【※指示がある場合のみ使用５】',
            ],
            [
                'setting_value' => '83',
                'content' => '【※指示がある場合のみ使用６】',
            ],
            [
                'setting_value' => '84',
                'content' => '【※指示がある場合のみ使用７】',
            ],
            [
                'setting_value' => '85',
                'content' => '【※指示がある場合のみ使用８】',
            ],
            [
                'setting_value' => '30',
                'content' => '不明（例：日米地位協定に基づく在留・就労）',
            ],
        ]);

        DB::table('m_residential_status')
            ->where('setting_value', '51')
            ->update(['unused_flg' => '1']);

        DB::table('m_residential_status')
            ->where('setting_value', '52')
            ->update(['unused_flg' => '1']);

        DB::table('m_residential_status')
            ->where('setting_value', '53')
            ->update(['unused_flg' => '1']);
    }
}
