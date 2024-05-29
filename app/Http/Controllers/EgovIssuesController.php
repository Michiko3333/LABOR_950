<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Permission;
use App\Models\CurrentUser;
use App\Models\Certificate;
use App\Models\Egov_account;
use App\EgovAPI\Egov;
use Carbon\Carbon;

class EgovIssuesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if ($userPermission->denyProcedure() || !$userPermission->isBasicDepartment() || !$userPermission->isReadableFor(9)) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $egovAcount = $this->egovAcount();

        return view('ledger.issues', compact('egovAcount'));
    }

    public function detail(Request $request, $id)
    {
        $currentCompany = CurrentUser::currentCompany();
        $account = Egov_account::where('company_id', $currentCompany->id)->where('delete_flg', 0)->first();
        $detail = new \stdClass();
        $detail->status = "";
        $detail->arrive_id = "";
        $detail->arrive_date = "";
        $detail->corporation_name = "";
        $detail->applicant_name = "";
        $detail->proc_name = "";
        $detail->submission_destination = "";
        $detail->withdraw_flag = false;
        $detail->pay_status = "-";
        $detail->notice_count = 0;
        $detail->doc_count = 0;
        $detail->apply_pay_count = 0;

        $official_list = [];

        try {
            $api = Egov::accessToken($account->access_token);
            $r = $this->call($api, $id);
            if ($r->status() == 401) {
                \Log::info('トークン再取得：開始');
                $refreshed = Egov::refreshToken($account->refresh_token)->getToken();
                if ($refreshed && $refreshed->status() == 200) {
                    \Log::info('トークン再取得：成功');
                    $access_token = $refreshed['access_token'];
                    $refresh_token = $refreshed['refresh_token'];
                    $account->access_token = $access_token;
                    $account->refresh_token = $refresh_token;
                    $account->delete_flg = 0;
                    $account->save();
                    $api = Egov::accessToken($access_token);
                    $r = $this->call($api, $id);
                }
            }

            if ($r->status() == 200) {
                $response = $r->json();
                $results = $response['results'];
                $arrive_date = new Carbon($results['arrive_date']) ?? '';
                $detail->status = $results['status'];
                $detail->arrive_id = $results['arrive_id'];
                $detail->arrive_date = $arrive_date->format('Y年m月d日 H時i分');
                $detail->corporation_name = $results['corporation_name'];
                $detail->applicant_name = $results['applicant_name'];
                $detail->proc_name = $results['proc_name'];
                $detail->submission_destination = $results['submission_destination'];
                $detail->withdraw_flag = $results['withdraw_flag'];
                $detail->pay_status = $results['pay_status'];
                $detail->notice_count = $results['notice_count'];
                $detail->doc_count = $results['doc_count'];
                $detail->apply_pay_count = $results['apply_pay_count'];
                $detail->official_list = $results['official_list'];

                foreach ($detail->official_list as $official) {
                    $d = new \stdClass();
                    $allowed_date = new Carbon($official['allowed_date']);
                    $doc_download_expired_date = new Carbon($official['doc_download_expired_date']);
                    $doc_download_date = new Carbon($official['doc_download_date']);

                    $d->notice_sub_id = $official['notice_sub_id'];
                    $d->doc_title = $official['doc_title'];
                    $d->allowed_date = $official['allowed_date'] ? $allowed_date->format('Y年m月d日 H時i分') : '';
                    $d->doc_download_expired_date = $official['doc_download_expired_date'] ? $doc_download_expired_date->format('Y年m月d日') : '';
                    $d->doc_download_date = $official['doc_download_date'] ? $doc_download_date->format('Y年m月d日 H時i分') : '';
                    $official_list[] = $d;
                }
            }
        } catch (\Exception $err) {
            \Log::error($err);
        }
        return view('ledger.detail', ['detail' => $detail, 'official_list' => $official_list]);
    }

    public function getOfficial(Request $request, $id)
    {
        $req = $request->validate([
            'notice_sub_id' => 'required',
        ]);

        $arrive_id = $id;
        $notice_sub_id = $req['notice_sub_id'];

        $currentCompany = CurrentUser::currentCompany();
        $account = Egov_account::where('company_id', $currentCompany->id)->where('delete_flg', 0)->first();

        try {
            throw new \Exception('ゼロによる除算。');
            $api = Egov::accessToken($account->access_token);
            $r = $this->call_official($api, $arrive_id, $notice_sub_id);
            if ($r->status() == 401) {
                \Log::info('トークン再取得：開始');
                $refreshed = Egov::refreshToken($account->refresh_token)->getToken();
                if ($refreshed && $refreshed->status() == 200) {
                    \Log::info('トークン再取得：成功');
                    $access_token = $refreshed['access_token'];
                    $refresh_token = $refreshed['refresh_token'];
                    $account->access_token = $access_token;
                    $account->refresh_token = $refresh_token;
                    $account->delete_flg = 0;
                    $account->save();
                    $api = Egov::accessToken($access_token);
                    $r = $this->call_official($api, $arrive_id, $notice_sub_id);
                }
            }

            if ($r->status() == 200) {
                $response = $r->json();
                $results = $response['results'];
                $file_data = $results['file_data'];
                $binary_data = base64_decode($file_data);
                $file_name = $arrive_id . '_' . $notice_sub_id . ".zip";

                return Response::stream(function () use ($binary_data) {
                    echo $binary_data;
                }, 200, [
                    'Content-Type' => 'application/zip',
                    'Content-Disposition' => 'attachment; filename="' . $file_name . '"',
                ]);
            }
        } catch (\Exception $err) {
            \Log::error($err);
        }
        session()->flash('error', '公文書のダウンロードに失敗しました');
        return redirect()->back();
    }

    private function call($api, $arrive_id)
    {
        return $api->getMatterFiling($arrive_id);
    }

    private function call_official($api, $arrive_id, $notice_sub_id)
    {
        return $api->getOfficialDocument($arrive_id, $notice_sub_id);
    }
}
