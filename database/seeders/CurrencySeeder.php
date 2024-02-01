<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = Currency::create([
            'currency_no' => '008',
            'currency_code' => 'ALL',
            'country' => 'アルバニア',
            'currency' => 'レク',
        ]);

        $currency = Currency::create([
            'currency_no' => '012',
            'currency_code' => 'DZD',
            'country' => 'アルジェリア',
            'currency' => 'アルジェリアディナール',
        ]);

        $currency = Currency::create([
            'currency_no' => '032',
            'currency_code' => 'ARS',
            'country' => 'アルゼンチン',
            'currency' => 'アルゼンチンペソ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'オーストラリア',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'クリスマス諸島',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'ココス諸島（THE）',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'ハードアイランドとマクドナルドアイランド',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'キリバチ',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'ナウル',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'ノーフォーク島',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '036',
            'currency_code' => 'AUD',
            'country' => 'ツバル',
            'currency' => 'オーストラリアドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '044',
            'currency_code' => 'BSD',
            'country' => 'バハマ（THE）',
            'currency' => 'バハマドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '048',
            'currency_code' => 'BHD',
            'country' => 'バーレーン',
            'currency' => 'バーレーンディナール',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '050',
            'currency_code' => 'BDT',
            'country' => 'バングラデシュ',
            'currency' => 'タカ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '051',
            'currency_code' => 'AMD',
            'country' => 'アルメニア',
            'currency' => 'アルメニアドラム',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '052',
            'currency_code' => 'BBD',
            'country' => 'バルバドス',
            'currency' => 'バルバドスドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '060',
            'currency_code' => 'BMD',
            'country' => 'ベルムダ',
            'currency' => 'バミューダドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '064',
            'currency_code' => 'BTN',
            'country' => 'ブータン',
            'currency' => 'ニュルタム',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '068',
            'currency_code' => 'BOB',
            'country' => 'ボリビア（多国籍）',
            'currency' => 'ボリビアノ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '072',
            'currency_code' => 'BWP',
            'country' => 'ボツワナ',
            'currency' => 'プーラ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '084',
            'currency_code' => 'BZD',
            'country' => 'ベリーズ',
            'currency' => 'ベリーズドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '090',
            'currency_code' => 'SBD',
            'country' => 'ソロモン諸島',
            'currency' => 'ソロモン諸島ドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '096',
            'currency_code' => 'BND',
            'country' => 'ブルネイダラスサラム',
            'currency' => 'ブルネイドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '104',
            'currency_code' => 'MMK',
            'country' => 'ミャンマー',
            'currency' => 'チャット',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '108',
            'currency_code' => 'BIF',
            'country' => 'ブルンジ',
            'currency' => 'ブルンジフラン',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '116',
            'currency_code' => 'KHR',
            'country' => 'カンボジア',
            'currency' => 'リエル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '124',
            'currency_code' => 'CAD',
            'country' => 'カナダ',
            'currency' => 'カナダドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '132',
            'currency_code' => 'CVE',
            'country' => 'カーボベルデ',
            'currency' => 'カーボベルデ・エスクード',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '136',
            'currency_code' => 'KYD',
            'country' => 'カイマン諸島（THE）',
            'currency' => 'ケイマン諸島ドル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '144',
            'currency_code' => 'LKR',
            'country' => 'スリランカ',
            'currency' => 'スリランカルピー',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '152',
            'currency_code' => 'CLP',
            'country' => 'チリ',
            'currency' => 'チリペソ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '156',
            'currency_code' => 'CNY',
            'country' => '中国',
            'currency' => '人民元',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '170',
            'currency_code' => 'COP',
            'country' => 'コロンビア',
            'currency' => 'コロンビアペソ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '174',
            'currency_code' => 'KMF',
            'country' => 'コモロ（THE）',
            'currency' => 'コモロフラン',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '188',
            'currency_code' => 'CRC',
            'country' => 'コスタリカ',
            'currency' => 'コスタリカコロン',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '191',
            'currency_code' => 'HRK',
            'country' => 'クロアチア',
            'currency' => 'クナ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '192',
            'currency_code' => 'CUP',
            'country' => 'キューバ',
            'currency' => 'キューバペソ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '203',
            'currency_code' => 'CZK',
            'country' => 'チェコ共和国（THE）',
            'currency' => 'チェココルナ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '208',
            'currency_code' => 'DKK',
            'country' => 'デンマーク',
            'currency' => 'デンマーククローネ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '208',
            'currency_code' => 'DKK',
            'country' => 'ファロー諸島（THE）',
            'currency' => 'デンマーククローネ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '208',
            'currency_code' => 'DKK',
            'country' => 'グリーンランド',
            'currency' => 'デンマーククローネ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '214',
            'currency_code' => 'DOP',
            'country' => 'ドミニカ共和国（THE）',
            'currency' => 'ドミニカペソ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '222',
            'currency_code' => 'SVC',
            'country' => 'エルサルバドル',
            'currency' => 'エルサルバドルコロン',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '230',
            'currency_code' => 'ETB',
            'country' => 'エチオピア',
            'currency' => 'エチオピアブル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '232',
            'currency_code' => 'ERN',
            'country' => 'エリトリア',
            'currency' => 'ナクファ',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '238',
            'currency_code' => 'FKP',
            'country' => 'フォークランド諸島（THE）[マルビナス]',
            'currency' => 'フォークランド諸島ポンド',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '242',
            'currency_code' => 'FJD',
            'country' => 'フィジー',
            'currency' => 'フィジードル',
        ]);
        
        $currency = Currency::create([
            'currency_no' => '262', 
            'currency_code' => 'DJF', 
            'country' => 'ジブチ', 
            'currency' => 'ジブチフラン', 
        ]);

        $currency = Currency::create([
            'currency_no' => '270', 
            'currency_code' => 'GMD', 
            'country' => 'ガンビア（THE）', 
            'currency' => 'ダラシ', 
        ]);

        $currency = Currency::create([
            'currency_no' => '292', 
            'currency_code' => 'GIP', 
            'country' => 'ギブラルター', 
            'currency' => 'ジブラルタルポンド', 
        ]);

        $currency = Currency::create([
            'currency_no' => '320', 
            'currency_code' => 'GTQ', 
            'country' => 'グアテマラ', 
            'currency' => 'ケツァル', 
        ]);

        $currency = Currency::create([
            'currency_no' => '324', 
            'currency_code' => 'GNF', 
            'country' => 'ギニア', 
            'currency' => 'ギニアフラン', 
        ]);

        $currency = Currency::create([
            'currency_no' => '328', 
            'currency_code' => 'GYD', 
            'country' => 'ガイアナ', 
            'currency' => 'ガイアナドル', 
        ]);

        $currency = Currency::create([
            'currency_no' => '332', 
            'currency_code' => 'HTG', 
            'country' => 'ハイチ', 
            'currency' => 'グールド', 
        ]);

        $currency = Currency::create([
            'currency_no' => '340', 
            'currency_code' => 'HNL', 
            'country' => 'ホンドゥラス', 
            'currency' => 'レンピラ', 
        ]);

        $currency = Currency::create([
            'currency_no' => '344', 
            'currency_code' => 'HKD', 
            'country' => '香港', 
            'currency' => '香港ドル', 
        ]); 

        $currency = Currency::create([
            'currency_no' => '348', 
            'currency_code' => 'HUF', 
            'country' => 'ハンガリー', 
            'currency' => 'フォリント', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '352', 
            'currency_code' => 'ISK', 
            'country' => 'アイスランド', 
            'currency' => 'アイスランドクローナ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '356', 
            'currency_code' => 'INR', 
            'country' => 'ブータン', 
            'currency' => 'インドルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '356', 
            'currency_code' => 'INR', 
            'country' => 'インド', 
            'currency' => 'インドルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '360', 
            'currency_code' => 'IDR', 
            'country' => 'インドネシア', 
            'currency' => 'ルピア', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '364', 
            'currency_code' => 'IRR', 
            'country' => 'イラン', 
            'currency' => 'イランリアル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '368', 
            'currency_code' => 'IQD', 
            'country' => 'イラク', 
            'currency' => 'イラクディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '376', 
            'currency_code' => 'ILS', 
            'country' => 'イスラエル', 
            'currency' => '新イスラエルシェケル', 
        ]); 
        
        $currency = Currency::create([
             'currency_no' => '388', 
             'currency_code' => 'JMD', 
             'country' => 'ジャマイカ', 
             'currency' => 'ジャマイカドル', 
         ]); 
         
        $currency = Currency::create([
             'currency_no' => '392', 
             'currency_code' => 'JPY', 
             'country' => '日本', 
             'currency' => '円', 
         ]); 
        
        $currency = Currency::create([
            'currency_no' => '398', 
            'currency_code' => 'KZT', 
            'country' => 'カザフスタン', 
            'currency' => 'テンゲ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '400', 
            'currency_code' => 'JOD', 
            'country' => 'ヨルダン', 
            'currency' => 'ヨルダンディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '404', 
            'currency_code' => 'KES', 
            'country' => 'ケニア', 
            'currency' => 'ケニアシリング', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '408', 
            'currency_code' => 'KPW', 
            'country' => '北朝鮮', 
            'currency' => '北朝鮮ウォン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '410', 
            'currency_code' => 'KRW', 
            'country' => '大韓民国', 
            'currency' => 'ウォン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '414', 
            'currency_code' => 'KWD', 
            'country' => 'クウェート', 
            'currency' => 'クウェートディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '417', 
            'currency_code' => 'KGS', 
            'country' => 'キルギスタン', 
            'currency' => 'ソム', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '418', 
            'currency_code' => 'LAK', 
            'country' => 'ラオス人民民主共和国（THE）', 
            'currency' => 'キップ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '422', 
            'currency_code' => 'LBP', 
            'country' => 'レバノン', 
            'currency' => 'レバノンポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '426', 
            'currency_code' => 'LSL', 
            'country' => 'レソト', 
            'currency' => 'ロティ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '430', 
            'currency_code' => 'LRD', 
            'country' => 'リベリア', 
            'currency' => 'リベリアドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '434', 
            'currency_code' => 'LYD', 
            'country' => 'リビア', 
            'currency' => 'リビアディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '446', 
            'currency_code' => 'MOP', 
            'country' => 'マカオ', 
            'currency' => 'パタカ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '454', 
            'currency_code' => 'MWK', 
            'country' => 'マラウィ', 
            'currency' => 'クワチャ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '458', 
            'currency_code' => 'MYR', 
            'country' => 'マレーシア', 
            'currency' => 'マレーシアリンギット', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '462', 
            'currency_code' => 'MVR', 
            'country' => 'モルディブ', 
            'currency' => 'ルフィア', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '480', 
            'currency_code' => 'MUR', 
            'country' => 'モーリシャス', 
            'currency' => 'モーリシャスルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '484', 
            'currency_code' => 'MXN', 
            'country' => 'メキシコ', 
            'currency' => 'メキシコペソ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '496', 
            'currency_code' => 'MNT', 
            'country' => 'モンゴル', 
            'currency' => 'トゥグルグ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '498', 
            'currency_code' => 'MDL', 
            'country' => 'モルドバ（共和国）', 
            'currency' => 'モルドバレイ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '504', 
            'currency_code' => 'MAD', 
            'country' => 'モロッコ', 
            'currency' => 'モロッコディルハム', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '504', 
            'currency_code' => 'MAD', 
            'country' => '西サハラ', 
            'currency' => 'モロッコディルハム', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '512', 
            'currency_code' => 'OMR', 
            'country' => 'オマーン', 
            'currency' => 'Rial Omani', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '516', 
            'currency_code' => 'NAD', 
            'country' => 'ナミビア', 
            'currency' => 'ナミビアドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '524', 
            'currency_code' => 'NPR', 
            'country' => 'ネパール', 
            'currency' => 'ネパールルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '532', 
            'currency_code' => 'ANG', 
            'country' => 'キュラソー島', 
            'currency' => 'オランダ領アンティルギルダー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '532', 
            'currency_code' => 'ANG', 
            'country' => 'セントマーティン（オランダ領）', 
            'currency' => 'オランダ領アンティルギルダー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '533', 
            'currency_code' => 'AWG', 
            'country' => 'アルーバ', 
            'currency' => 'アルバンフロリン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '548', 
            'currency_code' => 'VUV', 
            'country' => 'バヌアツ​​', 
            'currency' => 'バツ', 
        ]); 

        $currency = Currency::create([
            'currency_no' => '554', 
            'currency_code' => 'NZD', 
            'country' => 'クック諸島（THE）', 
            'currency' => 'ニュージーランドドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '554', 
            'currency_code' => 'NZD', 
            'country' => 'ニュージーランド', 
            'currency' => 'ニュージーランドドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '554', 
            'currency_code' => 'NZD', 
            'country' => 'ニウエ', 
            'currency' => 'ニュージーランドドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '554', 
            'currency_code' => 'NZD', 
            'country' => 'ピットアン', 
            'currency' => 'ニュージーランドドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '554', 
            'currency_code' => 'NZD', 
            'country' => 'トケラウ', 
            'currency' => 'ニュージーランドドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '558', 
            'currency_code' => 'NIO', 
            'country' => 'ニカラグア', 
            'currency' => 'コルドバオロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '566', 
            'currency_code' => 'NGN', 
            'country' => 'ナイジェリア', 
            'currency' => 'ナイラ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '578', 
            'currency_code' => 'NOK', 
            'country' => 'ブーベ島', 
            'currency' => 'ノルウェークローネ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '578', 
            'currency_code' => 'NOK', 
            'country' => 'ノルウェー', 
            'currency' => 'ノルウェークローネ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '578', 
            'currency_code' => 'NOK', 
            'country' => 'スバルバードとジャン・マイエン', 
            'currency' => 'ノルウェークローネ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '586', 
            'currency_code' => 'PKR', 
            'country' => 'パキスタン', 
            'currency' => 'パキスタンルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '590', 
            'currency_code' => 'PAB', 
            'country' => 'パナマ', 
            'currency' => 'バルボア', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '598', 
            'currency_code' => 'PGK', 
            'country' => 'パプアニューギニア', 
            'currency' => 'キナ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '600', 
            'currency_code' => 'PYG', 
            'country' => 'パラグアイ', 
            'currency' => 'グアラニ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '604', 
            'currency_code' => 'PEN', 
            'country' => 'ペルー', 
            'currency' => 'ヌエボソル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '608', 
            'currency_code' => 'PHP', 
            'country' => 'フィリピン（THE）', 
            'currency' => 'フィリピンペソ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '634', 
            'currency_code' => 'QAR', 
            'country' => 'カタール', 
            'currency' => 'カタールリアル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '643', 
            'currency_code' => 'RUB', 
            'country' => 'ロシア連邦（THE）', 
            'currency' => 'ロシアルーブル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '646', 
            'currency_code' => 'RWF', 
            'country' => 'ルワンダ', 
            'currency' => 'ルワンダフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '654', 
            'currency_code' => 'SHP', 
            'country' => 'セント・ヘレナ、アセンション、トリスタン・ダ・クーニャ', 
            'currency' => 'セントヘレナポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '682', 
            'currency_code' => 'SAR', 
            'country' => 'サウジアラビア', 
            'currency' => 'サウジリヤル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '690', 
            'currency_code' => 'SCR', 
            'country' => 'セイシェル', 
            'currency' => 'セイシェルルピー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '694', 
            'currency_code' => 'SLL', 
            'country' => 'シエラレオネ', 
            'currency' => 'レオーネ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '702', 
            'currency_code' => 'SGD', 
            'country' => 'シンガポール', 
            'currency' => 'シンガポールドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '704', 
            'currency_code' => 'VND', 
            'country' => 'ベトナム', 
            'currency' => 'ドン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '706', 
            'currency_code' => 'SOS', 
            'country' => 'ソマリア', 
            'currency' => 'ソマリアシリング', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '710', 
            'currency_code' => 'ZAR', 
            'country' => 'レソト', 
            'currency' => 'ランド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '710', 
            'currency_code' => 'ZAR', 
            'country' => 'ナミビア', 
            'currency' => 'ランド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '710', 
            'currency_code' => 'ZAR', 
            'country' => '南アフリカ', 
            'currency' => 'ランド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '728', 
            'currency_code' => 'SSP', 
            'country' => '南スーダン', 
            'currency' => '南スーダンポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '748', 
            'currency_code' => 'SZL', 
            'country' => 'スワジランド', 
            'currency' => 'リランジェニ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '752', 
            'currency_code' => 'SEK', 
            'country' => 'スウェーデン', 
            'currency' => 'スウェーデンクローナ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '756', 
            'currency_code' => 'CHF', 
            'country' => 'リヒテンシュタイン', 
            'currency' => 'スイスフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '756', 
            'currency_code' => 'CHF', 
            'country' => 'スイス', 
            'currency' => 'スイスフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '760', 
            'currency_code' => 'SYP', 
            'country' => 'シリアアラブ共和国', 
            'currency' => 'シリアポンド', 
        ]); 

        $currency = Currency::create([
            'currency_no' => '764', 
            'currency_code' => 'THB', 
            'country' => 'タイ', 
            'currency' => 'バーツ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '776', 
            'currency_code' => 'TOP', 
            'country' => 'トンガ', 
            'currency' => 'パアンガ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '780', 
            'currency_code' => 'TTD', 
            'country' => 'トリニダードトバゴ', 
            'currency' => 'トリニダードトバゴドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '784', 
            'currency_code' => 'AED', 
            'country' => 'アラブ首長国連邦（THE）', 
            'currency' => 'アラブ首長国連邦ディルハム', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '788', 
            'currency_code' => 'TND', 
            'country' => 'チュニジア', 
            'currency' => 'チュニジアディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '800', 
            'currency_code' => 'UGX', 
            'country' => 'ウガンダ', 
            'currency' => 'ウガンダシリング', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '807', 
            'currency_code' => 'MKD', 
            'country' => 'マケドニア（旧ユーゴスラビア共和国）', 
            'currency' => 'マケドニア・デナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '818', 
            'currency_code' => 'EGP', 
            'country' => 'エジプト', 
            'currency' => 'エジプトポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '826', 
            'currency_code' => 'GBP', 
            'country' => 'ガーンジー', 
            'currency' => '英ポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '826', 
            'currency_code' => 'GBP', 
            'country' => 'マン島', 
            'currency' => '英ポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '826', 
            'currency_code' => 'GBP', 
            'country' => 'ジャージー', 
            'currency' => '英ポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '826', 
            'currency_code' => 'GBP', 
            'country' => 'イギリスと北アイルランド（THE）のイギリス', 
            'currency' => '英ポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '834', 
            'currency_code' => 'TZS', 
            'country' => 'タンザニア連合共和国', 
            'currency' => 'タンザニアシリング', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'アメリカ領サモア', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'ボネール、セントユースタティアとサバ', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'イギリス領インド洋地域（THE）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'エクアドル', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'エルサルバドル', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'グアム', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'ハイチ', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'マーシャル諸島（THE）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'ミクロネシア（連邦）', 
            'currency' => 'アメリカドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => '北マリアナ諸島（THE）', 
            'currency' => 'アメリカドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'パラオ', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'パナマ', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'プエルトリコ', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => '東ティモール', 
            'currency' => 'アメリカドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'トルコとカイコス諸島（THE）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'アメリカ合衆国マイナーアウト諸島（THE）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'アメリカ合衆国（THE）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'バージン諸島（イギリス）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '840', 
            'currency_code' => 'USD', 
            'country' => 'バージン諸島（アメリカ）', 
            'currency' => '米ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '858', 
            'currency_code' => 'UYU', 
            'country' => 'ウルグアイ', 
            'currency' => 'ペソウルグアイ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '860', 
            'currency_code' => 'UZS', 
            'country' => 'ウズベキスタン', 
            'currency' => 'ウズベキスタンスム', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '882', 
            'currency_code' => 'WST', 
            'country' => 'サモア', 
            'currency' => 'タラ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '886', 
            'currency_code' => 'YER', 
            'country' => 'イエメン', 
            'currency' => 'イエメンリアル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '901', 
            'currency_code' => 'TWD', 
            'country' => '台湾（中国の地域）', 
            'currency' => '新台湾ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '929', 
            'currency_code' => 'MRU', 
            'country' => 'モーリタニア', 
            'currency' => 'ウグイヤ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '930', 
            'currency_code' => 'STN', 
            'country' => 'サントメプリンシペ', 
            'currency' => 'ドブラ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '931', 
            'currency_code' => 'CUC', 
            'country' => 'キューバ', 
            'currency' => 'ペソコンバーチブル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '932', 
            'currency_code' => 'ZWL', 
            'country' => 'ジンバブエ', 
            'currency' => 'ジンバブエドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '934', 
            'currency_code' => 'TMT', 
            'country' => 'トルクメニスタン', 
            'currency' => 'トルクメニスタン新マナット', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '936', 
            'currency_code' => 'GHS', 
            'country' => 'ガーナ', 
            'currency' => 'ガーナセディ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '937', 
            'currency_code' => 'VEF', 
            'country' => 'ベネズエラ（ボリバル共和国）', 
            'currency' => 'ボリバル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '938', 
            'currency_code' => 'SDG', 
            'country' => 'スーダン（THE）', 
            'currency' => 'スーダンポンド', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '940', 
            'currency_code' => 'UYI', 
            'country' => 'ウルグアイ<', 
            'currency' => 'ウルグアイペソアンユニデーズインデックス（URUIURUI）', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '941', 
            'currency_code' => 'RSD', 
            'country' => 'セルビア', 
            'currency' => 'セルビアディナール', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '943', 
            'currency_code' => 'MZN', 
            'country' => 'モザンビーク', 
            'currency' => 'モザンビークメタリック', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '944', 
            'currency_code' => 'AZN', 
            'country' => 'アゼルバイジャン', 
            'currency' => 'アゼルバイジャンマナット', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '946', 
            'currency_code' => 'RON', 
            'country' => 'ルーマニア', 
            'currency' => 'ルーマニアレイ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '947', 
            'currency_code' => 'CHE', 
            'country' => 'スイス', 
            'currency' => 'WIRユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '948', 
            'currency_code' => 'CHW', 
            'country' => 'スイス', 
            'currency' => 'WIRフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '949', 
            'currency_code' => 'TRY', 
            'country' => 'トルコ', 
            'currency' => 'トルコリラ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => 'カメルーン', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => '中央アフリカ共和国（THE）', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => 'チャド', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => 'コンゴ（THE）', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => '赤道ギニア', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '950', 
            'currency_code' => 'XAF', 
            'country' => 'GABON', 
            'currency' => 'CFAフランBEAC', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'アンギラ', 
            'currency' => '東カリブ・ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'アンチグアバーブーダ', 
            'currency' => '東カリブ・ドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'ドミニカ', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'グレナダ', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'モントセラト', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'セントキットとネビス', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'セントルシア', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '951', 
            'currency_code' => 'XCD', 
            'country' => 'セントビンセント・グレナディーン諸島', 
            'currency' => '東カリブドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'ベニン', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'ブルキナファソ', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'クック諸島', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'ギニアビサウ', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'マリ', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'ナイガー（THE）', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'セネガル', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '952', 
            'currency_code' => 'XOF', 
            'country' => 'トーゴ', 
            'currency' => 'CFAフランBCEAO', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '953', 
            'currency_code' => 'XPF', 
            'country' => 'フランス領ポリネシア', 
            'currency' => 'CFPフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '953', 
            'currency_code' => 'XPF', 
            'country' => 'ニューカレドニア', 
            'currency' => 'CFPフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '953', 
            'currency_code' => 'XPF', 
            'country' => 'ウォリス・フツナ', 
            'currency' => 'CFPフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '960', 
            'currency_code' => 'XDR', 
            'country' => '国際通貨基金（IMF）', 
            'currency' => 'SDR（特別引出権）', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '965', 
            'currency_code' => 'XUA', 
            'country' => 'アフリカの開発銀行グループのメンバー国', 
            'currency' => 'ADBの会計単位', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '967', 
            'currency_code' => 'ZMW', 
            'country' => 'ザンビア', 
            'currency' => 'ザンビアクワチャ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '968', 
            'currency_code' => 'SRD', 
            'country' => 'スリナム', 
            'currency' => 'スリナムドル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '969', 
            'currency_code' => 'MGA', 
            'country' => 'マダガスカル', 
            'currency' => 'マダガスカルのアリアリー', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '970', 
            'currency_code' => 'COU', 
            'country' => 'コロンビア', 
            'currency' => 'Unidad de Valor Real', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '971', 
            'currency_code' => 'AFN', 
            'country' => 'アフガニスタン', 
            'currency' => 'アフガニ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '972', 
            'currency_code' => 'TJS', 
            'country' => 'タジキスタン', 
            'currency' => 'ソモニ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '973', 
            'currency_code' => 'AOA', 
            'country' => 'アンゴラ', 
            'currency' => 'クワンザ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '974', 
            'currency_code' => 'BYR', 
            'country' => 'ベラルーシ', 
            'currency' => 'ベラルーシルーブル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '975', 
            'currency_code' => 'BGN', 
            'country' => 'ブルガリア', 
            'currency' => 'ブルガリアレフ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '976', 
            'currency_code' => 'CDF', 
            'country' => 'コンゴ（その民主共和国）', 
            'currency' => 'コンゴフラン', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '977', 
            'currency_code' => 'BAM', 
            'country' => 'ボスニア・ヘルツェゴビナ', 
            'currency' => 'コンバーチブルマーク', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'オーランド諸島', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'アンドラ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'オーストリア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ベルギー', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'キプロス', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'エストニア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => '欧州連合', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'フィンランド', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'フランス', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'フランスのGUIANA', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'フランス南部領土（THE）', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ドイツ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ギリシャ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'グアドループ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ホーリー・シー（THE）', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'アイルランド', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'イタリア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ラトビア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'リトアニア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ルクセンブルク', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'マルタ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'マルティニーク', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'マイヨット', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'モナコ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'モンテネグロ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'オランダ（THE）', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'ポルトガル', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'レユニオン', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'サン・バルテルミー島', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'セント・マーチン島（フランス領）', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'サンピエールとミケロン', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'サンマリノ', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'スロバキア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'スロベニア', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '978', 
            'currency_code' => 'EUR', 
            'country' => 'スペイン', 
            'currency' => 'ユーロ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '979', 
            'currency_code' => 'MXV', 
            'country' => 'メキシコ', 
            'currency' => 'メキシコのUnidad de Inversion（UDI）', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '980', 
            'currency_code' => 'UAH', 
            'country' => 'ウクライナ', 
            'currency' => 'フリヴニャ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '981', 
            'currency_code' => 'GEL', 
            'country' => 'ジョージア', 
            'currency' => 'ラリ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '984', 
            'currency_code' => 'BOV', 
            'country' => 'ボリビア（多国籍）', 
            'currency' => 'ムボル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '985', 
            'currency_code' => 'PLN', 
            'country' => 'ポーランド', 
            'currency' => 'ズロチ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '986', 
            'currency_code' => 'BRL', 
            'country' => 'ブラジル', 
            'currency' => 'ブラジルレアル', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '990', 
            'currency_code' => 'CLF', 
            'country' => 'チリ', 
            'currency' => 'チリ ウニダ・デ・フォメント', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '994', 
            'currency_code' => 'XSU', 
            'country' => 'サン・バルテルミー島', 
            'currency' => 'スクレ', 
        ]); 
        
        $currency = Currency::create([
            'currency_no' => '997', 
            'currency_code' => 'USN', 
            'country' => 'アメリカ合衆国（THE）', 
            'currency' => '米ドル（翌日）', 
        ]); 
        
    }
}
