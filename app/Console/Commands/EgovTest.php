<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\EgovAPI\Signer;

class EgovTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:egov-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sample code: egov sign';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // strage/appフォルダ内指定
        $pfx = 'e-GovEE01_sha2.pfx';
        $pfxPath = Storage::path($pfx);
        $pfxPassword = 'gpkitest';

        // 署名インスタンス作成
        $signer = new Signer();
        $signer->makeDir();
        $path = $signer->getPath();

        // ここで申請ファイル一式を$pathへ移動or保存

        // 署名
        if ($signer->run($pfxPath, $pfxPassword)) {

            // zip化しBASE64エンコードしたデータを取得
            $result = $signer->getZippedBase64();

            // ここで$resultを使って申請処理

        }

        // tempフォルダ削除
        $signer->removeDir();

        $this->info("署名完了");
    }
}
