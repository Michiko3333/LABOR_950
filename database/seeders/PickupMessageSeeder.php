<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickupMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pickup_message')->truncate();
        DB::table('m_pickup_message')->insert([
            [
                'id' => '1',
                'business_name' => '【pickup_type】employeeさんがbirthdayにyearです。',
                'content' =>  <<<EOT
                employeeさんがbirthdayにyearです。
                pickup_typeの手続きを行ってください。
                EOT,
            ],
            [
                'id' => '2',
                'business_name' => '【pickup_type】の提出期日（due_date）が迫りました。',
                'content' => <<<EOT
                pickup_typeの提出期日（due_date）が迫りました。
                pickup_typeの手続きを行ってください。
                EOT,
            ],
            [
                'id' => '3',
                'business_name' => '【年末調整】 来年1月31日が年末調整の提出日です。',
                'content' => <<<EOT
                来年1月31日が年末調整の提出日です。
                年内には従業員に資料を提出して貰いましょう！
                EOT,
            ],
            [
                'id' => '4',
                'business_name' => 'employee様が誕生日date前です。',
                'content' => '',
            ],
            [
                'id' => '5',
                'business_name' => '【決算日】due_dateは決算日です。due_dateよりestablished期に入ります。',
                'content' => <<<EOT
                due_dateは決算日です。
                due_dateよりestablished期に入ります。手続きを行ってください。
                EOT,
            ],
            [
                'id' => '6',
                'business_name' => '【pickup_type】employeeさんがdue_dateにpickup_typeとなります。',
                'content' => <<<EOT
                employeeさんがdue_dateにpickup_typeとなります。
                手続きを行ってください。
                EOT,
            ],
            [
                'id' => '7',
                'business_name' => '【pickup_type】employeeさんが扶養変更となりました',
                'content' => <<<EOT
                employeeさんのrelation（dependentさん）が扶養変更となりました。
                手続きを行ってください。
                EOT,
            ],
            [
                'id' => '8',
                'business_name' => '【pickup_type】subsidies_name申請期日date前です。',
                'content' => <<<EOT
                subsidies_name申請期日date前です。
                EOT,
            ],
            [
                'id' => '9',
                'business_name' => '【pickup_type】60歳到達時給与よりも75%未満になった為「pickup_type」の申請が出来る可能性があります。',
                'content' => <<<EOT
                60歳到達時給与よりも75%未満になった為「pickup_type」の申請が出来る可能性があります。
                EOT,
            ],
            [
                'id' => '10',
                'business_name' => '【pickup_type】monthが賞与支払予定日なので5日以内に「pickup_type」の提出準備をお願い致します。',
                'content' => <<<EOT
                monthが賞与支払予定日なのでdue_dateまでに「pickup_type」の提出準備をお願い致します。
                EOT,
            ],
            [
                'id' => '11',
                'business_name' => '【pickup_type】employeeさんがstarting_dateに入社されましたのでdue_dateまでに「pickup_type」の手続きをお願い致します。',
                'content' => <<<EOT
                employeeさんがstarting_dateに入社されましたのでdue_dateまでに「pickup_type」の手続きをお願い致します。
                EOT,
            ],
            [
                'id' => '12',
                'business_name' => '【pickup_type】2ヵ月連続で「標準報酬月額」が変更になっております。来月変動する場合は「pickup_type」の必要があります。',
                'content' => <<<EOT
                2ヵ月連続で「標準報酬月額」が変更になっております。来月変動する場合は「pickup_type」の必要があります。
                EOT,
            ],
            [
                'id' => '13',
                'business_name' => '【pickup_type】 employeeさんがdue_dateに退社されますので「pickup_type」の手続きをお願い致します。',
                'content' => <<<EOT
                employeeさんがdue_dateに退社されますので「pickup_type」の手続きをお願い致します。
                EOT,
            ],
            [
                'id' => '14',
                'business_name' => '【労働基準監督署】due_date頃までに定期健康診断結果報告書を提出しましょう。',
                'content' => <<<EOT
                due_date頃までに定期健康診断結果報告書を提出しましょう。
                EOT,
            ],
            [
                'id' => '15',
                'business_name' => '【労働基準監督署】ストレスチェックの提出日はdue_dateまでにした方が良いでしょう。',
                'content' => <<<EOT
                ストレスチェックの提出日はdue_dateまでにした方が良いでしょう。
                EOT,
            ],
        ]);
    }
}
