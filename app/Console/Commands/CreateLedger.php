<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateLedger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-ledger {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '帳票に必要なファイルを作成する';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        if (!$this->isPascalCase($name)) {
            $this->info('パスカルケースで入力してください');
            return 0;
        }
        $name_snake = $this->toSnakeCase($name);
        $dir_controller = app_path() . '/Http/Controllers/Ledger';

        $sample_controller = file_get_contents($dir_controller . '/SampleController.php');
        $sample_controller = $this->replace('SampleController', $name . 'Controller', $sample_controller);
        $sample_controller = $this->replace('ledger.sample', 'ledger.' . $name_snake, $sample_controller);

        $dir_view = base_path() . '/resources/views/Ledger';
        $sample_view = file_get_contents($dir_view . '/sample.blade.php');
        $sample_view = $this->replace('帳票：雇用保険適用事業所設置届', '帳票：帳票名', $sample_view);
        $sample_view = $this->replace('x-form.sample', 'x-form.' . $name_snake, $sample_view);
        $sample_view = $this->replace('x-form.sample', 'x-form.' . $name_snake, $sample_view);

        $dir_comp = base_path() . '/resources/views/components/form';
        $sample_comp = file_get_contents($dir_comp . '/sample.blade.php');

        $path_controller = $dir_controller . '/' . $name . 'Controller.php';
        $result_controller = file_put_contents($path_controller, $sample_controller);
        if (!$result_controller) {
            $this->info('コントローラー作成エラー:' . $path_controller);
            return 0;
        }

        $path_view = $dir_view . '/' . $name_snake . '.blade.php';
        $result_view = file_put_contents($path_view, $sample_view);
        if (!$result_view) {
            $this->info('コントローラー作成エラー:' . $path_view);
            return 0;
        }

        $path_comp = $dir_comp . '/' . $name_snake . '.blade.php';
        $result_comp = file_put_contents($path_comp, $sample_comp);
        if (!$result_comp) {
            $this->info('コントローラー作成エラー:' . $path_comp);
            return 0;
        }

        $this->info("下記テンプレートファイルを作成しました。\n\n" . 'コントローラー：' . $path_controller . "\n" . 'ビュー：' . $path_view . "\n" . '帳票要素：' . $path_comp . "\n" . 'web.phpでコントローラーへパスを通してください');
    }

    private function toSnakeCase($input)
    {
        // 文字列を大文字で区切って配列に変換
        $words = preg_split('/(?=[A-Z])/', $input, -1, PREG_SPLIT_NO_EMPTY);

        // 配列をスネークケースの文字列に結合
        $snake_case = strtolower(implode('_', $words));

        return $snake_case;
    }

    private function isPascalCase($str)
    {
        // 文字列が空の場合はパスカルケースではないとみなす
        if (empty($str)) {
            return false;
        }

        // 大文字が含まれるかチェック
        if (preg_match('/[A-Z]/', $str) === 0) {
            return false;
        }

        // すべての条件に合致した場合はパスカルケースと判断
        return true;
    }


    private function replace($search, $replace, $subject)
    {
        $pos = strpos($subject, $search);
        if ($pos !== false) {
            $newString = substr_replace($subject, $replace, $pos, strlen($search));
            return $newString;
        }
        return $subject;
    }
}
