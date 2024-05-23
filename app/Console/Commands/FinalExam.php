<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FinalExamController;
use App\EgovAPI\MixXmlEgovSigner;
use App\EgovAPI\EgovDebug;


class FinalExam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:final-exam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '最終確認試験の実施';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("\n
                    ==       最終確認試験のテスト一覧       == \n
                        ※アクセストークンを取得済であること \n\n
                        03-1.アクセストークン再取得 \n
                        04-1.アクセストークン検証（アクセストークン） \n
                        04-2.アクセストークン検証（リフレッシュトークン） \n
                        07-1.申請データ送信 ※添付なし \n
                        07-2.申請データ送信 ※添付あり \n
                        09-1.申請データ送信 ※再提出 \n
                        13-2.申請案件一覧取得 \n
                        14-1.申請案件取得 \n
                        18-1.申請案件に関する通知一覧取得 \n
                        18-2.申請案件に関する通知取得 \n
                        19-1.公文書取得 \n
                        20-1.公文書取得完了 \n
                        21-1.公文書署名検証要求 \n
                        25-1.ログアウト \n
                        26-1.ログアウト後のアクセストークン検証（リフレッシュトークン） \n

                        16-1.手続に関するご案内一覧取得（テスト範囲外） \n
                        17-1.手続に関するご案内取得（テスト範囲外） \n
                        05-1.手続選択（テスト範囲外） \n
                        91.base64エンコードされたバイナリデータを保存（テスト範囲外 company_idを1で設定） \n
                        88.【egov-test】指定手続IDを申請データ送信 標準形式の署名なし \n
                        99.【egov-test】指定手続IDを申請データ送信 標準形式の署名 \n
                        888.【egov-test】指定手続IDを申請データ送信 個別ファイル署名形式なし\n
                        999.【egov-test】指定手続IDを申請データ送信 個別ファイル署名形式\n
                        0000. 【最終確認試験用データのALL作成】\n
                        ");
        $examNumber = $this->ask('実施するテスト番号を入力してください');

        if (empty($examNumber)) {
            $this->info('正しい番号を入れてください');
            return;
        }

        try {
            $companyId = $this->asking('company_id');
            // $companyId = 3;
            EgovDebug::$isActive = true;
            if ($examNumber == '03-1') {
                $response = FinalExamController::getReToken_command($companyId, $examNumber);
            } elseif ($examNumber == '04-1') {
                $response = FinalExamController::tokenIntrospect_command($companyId, False, $examNumber);
            } elseif ($examNumber == '04-2') {
                $response = FinalExamController::tokenIntrospect_command($companyId, True, $examNumber);
            } elseif ($examNumber == '07-1') {
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response = $XML->runExam('950A010002012000', 1, $examNumber);
            } elseif ($examNumber == '07-2') {
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response = $XML->runExam('900A010200001000', 1, $examNumber);
            } elseif ($examNumber == '09-1') {
                $proc_id = $this->asking('proc_id');
                $this->info('未完：再提出データを受け取ったら追加');
                return;
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response = $XML->runExam('', 1, $examNumber);
            } elseif ($examNumber == '13-2') {
                $response = FinalExamController::getlist_command($companyId, $examNumber);
            } elseif ($examNumber == '14-1') {
                $arrive_id = $this->asking('arrive_id');
                $response = FinalExamController::get_matter_filing_command($companyId, $arrive_id, $examNumber);
            } elseif ($examNumber == '18-1') {
                $response = FinalExamController::get_notification_list_command($companyId, $examNumber);
            } elseif ($examNumber == '18-2') {
                $arrive_id = $this->asking('arrive_id');
                $response = FinalExamController::getNotificationInformation_command($companyId, $arrive_id, $examNumber);
            } elseif ($examNumber == '19-1') {
                $arrive_id = $this->asking('arrive_id');
                $notice_sub_id = $this->asking('notice_sub_id');
                $response = FinalExamController::get_official_document_commnad($companyId, $arrive_id, $notice_sub_id, $examNumber);
            } elseif ($examNumber == '20-1') {
                $arrive_id = $this->asking('arrive_id');
                $response = FinalExamController::registerDatetimeOfOfficialDocument_command($companyId, $arrive_id, $examNumber);
            } elseif ($examNumber == '21-1') {
                $this->info('未完：19-1が完了後、追加');
                return;
                $response = FinalExamController::signatureVerification_command($companyId, $examNumber);
            } elseif ($examNumber == '25-1') {
                $response = FinalExamController::logout_command($companyId, $examNumber);
            } elseif ($examNumber == '26-1') {
                $response = FinalExamController::logoutRetokenIntrospect($companyId, $examNumber);

                // 以下はテスト範囲外
            } elseif ($examNumber == '16-1') {
                $response = FinalExamController::getGuideList_command($companyId, $examNumber);
            } elseif ($examNumber == '17-1') {
                $information_id = $this->asking('information_id');
                $response = FinalExamController::getInformation_command($companyId, $information_id, $examNumber);
            } elseif ($examNumber == '05-1') {
                $proc_id = $this->asking('proc_id');
                $to_zipYN = $this->asking('to_zip y/n');
                if ($to_zipYN == 'y') {
                    $to_zip = True;
                } else {
                    $to_zip = False;
                }
                $response = FinalExamController::procedureSelection_command($companyId, $proc_id, $to_zip, $examNumber);
            } elseif ($examNumber == 91) {
                $response = FinalExamController::binaryToZip();
            } elseif ($examNumber == 88) {
                $proc_id = $this->asking('proc_id');
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response =$XML->runExam($proc_id, 0, $examNumber);
            } elseif ($examNumber == 99) {
                $proc_id = $this->asking('proc_id');
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response =$XML->runExam($proc_id, 1, $examNumber);
            } elseif ($examNumber == 888) {
                $proc_id = $this->asking('proc_id');
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response =$XML->runExam($proc_id, 0, $examNumber);
            } elseif ($examNumber == 999) {
                $proc_id = $this->asking('proc_id');
                $XML = new MixXmlEgovSigner(null, $companyId);
                $response =$XML->runExam($proc_id, 2, $examNumber);
            } elseif ($examNumber == 0000) {
                $outputData = [];
                // 標準
                $outputData = $this->run0000('900A010200001000', 1, $companyId, $outputData);
                $outputData = $this->run0000('900A010002008000', 1, $companyId, $outputData);
                $outputData = $this->run0000('900A010700003000', 1, $companyId, $outputData);
                $outputData = $this->run0000('900A010002006000', 1, $companyId, $outputData);
                $outputData = $this->run0000('900A000100015000', 0, $companyId, $outputData);
                // 個別
                $outputData = $this->run0000('900A102810039000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102810052000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102810055000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102200047000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102200050000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A101810033000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102210049000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102800053000', 2, $companyId, $outputData);
                $outputData = $this->run0000('900A102810054000', 2, $companyId, $outputData);
                $outputString = json_encode($outputData, JSON_PRETTY_PRINT);
                $this->info($outputString);
                $jsonData = json_encode($outputData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                Storage::put('egov-test-log/arrive_id.json', $jsonData);
                return;
            } else {
                $this->info('存在しないテスト番号です');
                return;
            }

            $this->info($response);
            return;
        } catch (\Exception $e) {
            $this->error($e);
        }
    }

    public function asking($askWord, $default = null)
    {
        $askWords = $askWord . '?';
        $r = $this->ask($askWords);
        if (empty($r)) {
            $this->info("$askWord を入力してください");
            return null;
        } else {
            return $r;
        }
    }

    public function run0000($proc_id, $signerNUM, $companyId, $outputData)
    {
        $XML = new MixXmlEgovSigner(null, $companyId);
        $response =$XML->runExam($proc_id, $signerNUM, $proc_id);
        $data = json_decode($response, true);
        $outputData[] = [
            ["proc_id" => $proc_id],
            ["arrive_id" => $data["results"]["arrive_id"]]
        ];
        $this->info($response);
        return $outputData;
    }
}
