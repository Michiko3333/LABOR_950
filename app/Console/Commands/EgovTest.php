<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\EgovAPI\Cert;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // strage/appフォルダ内指定
        $pfx = 'e-GovEE01_sha2.pfx';
        $pfxPath = Storage::path($pfx);
        $pfxPassword = 'gpkitest';
        $input_xml = Storage::get('kousei.xml');

        $cert = new Cert($input_xml);
        $cert->loadPfx($pfxPath, $pfxPassword);
        // strage/appフォルダ内指定
        $cert->addReference('495013520714030511_01.xml', Storage::get('495013520714030511_01.xml'));
        $result = $cert->sign();
        $this->info(print_r($result, true));
        $this->info("署名完了");

    }
}
