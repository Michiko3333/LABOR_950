<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class EgovTestController extends Controller
{

    public function __construct(Request $request)
    {
        // Admin権限以外のコントローラー使用を拒否する
        $this->middleware(function ($request, $next) {
            $role_id = CurrentUser::info()->role_id;
            if ($role_id !== 999)
                return redirect()->route('auth.logout');
            return $next($request);
        });

        if (config('egov.test') !== true) return redirect()->route('auth.logout');
    }

    public function index(Request $request)
    {
        $directories = Storage::directories('egov-test-log');
        $dics = [];
        foreach ($directories as $directory) {
            $cleanedDirectory = basename($directory);
            $lastModified = Storage::lastModified($directory);

            $exists_header = Storage::exists($directory . '/header.txt');
            $exists_body = Storage::exists($directory . '/body.txt');
            $exists_response = Storage::exists($directory . '/response.json');

            $dics[] = [
                'no' => $cleanedDirectory,
                'modified_date' => date('Y-m-d H:i:s', $lastModified),
                'modified_date_raw' => $lastModified,
                'exists_header' => $exists_header,
                'exists_body' => $exists_body,
                'exists_response' => $exists_response,
            ];
        }

        return view('egovtest.index', ['directories' => $dics]);
    }

    public function download(Request $request)
    {

        $folderPath = 'egov-test-log/' . $request->input('target_no', '0');

        $zipFileName = $request->input('target_no', '0') . '-' . date('YmdHis', $request->input('target_date', '0')) . '.zip';
        $zipFilePath = sys_get_temp_dir() . '/' . $zipFileName;

        // ZipArchiveインスタンスを作成
        $zip = new ZipArchive();

        // ZIPファイルを作成
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // フォルダ内のファイルを再帰的に圧縮
            $files = Storage::allFiles($folderPath);
            foreach ($files as $file) {
                $filePath = Storage::path($file);
                $relativePath = substr($file, strlen($folderPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
            $zip->close();
        } else {
            // エラーメッセージを出力
            return "Failed to create zip file.";
        }

        // ダウンロード用のResponseを作成
        return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    }
}
