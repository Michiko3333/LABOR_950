<?php

namespace App\EgovAPI;

use Illuminate\Support\Facades\Storage;
use ZipArchive;

class Signer
{
    private $id = 0;

    public function __construct()
    {
        $this->id = $this->generateUniqueNumber();
    }

    public function generateUniqueNumber()
    {
        // 現在の日付を取得
        $date = now()->format('YmdHi');

        do {
            $randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $uniqueNumber = $date . $randomNumber;
            $folderExists = Storage::exists('ledger/' . $uniqueNumber);
        } while ($folderExists);
        return $uniqueNumber;
    }

    public function makeDir()
    {
        Storage::makeDirectory('ledger/' . $this->id);
        Storage::makeDirectory('ledger/' . $this->id . '/zip');
    }

    public function removeDir()
    {
        $files = Storage::files('ledger/' . $this->id);
        foreach ($files as $file) {
            Storage::delete($file);
        }
        Storage::deleteDirectory('ledger/' . $this->id);
    }

    public function getPath()
    {
        return Storage::path('ledger/' . $this->id);
    }

    public function run($workingDirectry, $pfx, $pass, $basename=null, $outputname=null)
    {
        $envEgov = $_SERVER['EGOV_SIGNER_APP'];
        if ($basename!==null) {
            if ($outputname!==null) {
                $cmd = 'dotnet ' . $envEgov . ' ' . $workingDirectry . ' -i ' . $pfx . ' -p ' . $pass . ' -r ' . $basename . ' -w ' . $outputname;
            } else {
                $cmd = 'dotnet ' . $envEgov . ' ' . $workingDirectry . ' -i ' . $pfx . ' -p ' . $pass . ' -r ' . $basename;
            }
        } else {
            $cmd = 'dotnet ' . $envEgov . ' ' . $workingDirectry . ' -i ' . $pfx . ' -p ' . $pass;
        }
        exec($cmd, $output, $code);
        if ($code != 2000 && $code != 208) {
            return false;
        }
        return true;
    }

    public function getZippedBase64()
    {
        $zip = new ZipArchive();

        $folderPath = Storage::path('ledger/' . $this->id);
        $tmpFilePath = storage_path('app/tmp/tmp_zip_' . $this->id . '.zip');

        if ($zip->open($tmpFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $files = glob($folderPath . '/*');

            foreach ($files as $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if ($extension !== 'pfx') {
                    $filePath = $file;
                    $fileName = basename($file);
                    $zip->addFile($filePath, $fileName);
                }
            }
            $zip->close();
            $base64EncodedData = base64_encode(file_get_contents($tmpFilePath));

            unlink($tmpFilePath);
            return $base64EncodedData;
        } else {
            return null;
        }
    }
}
