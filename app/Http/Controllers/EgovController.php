<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EgovAPI\Egov;
use App\EgovAPI\EgovTestLog;
use App\Models\CurrentUser;
use App\Models\Egov_account;
use Carbon\Carbon;
use App\Permission;

class EgovController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if ($userPermission->denyProcedure() || !$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(10) || !$userPermission->isWritableFor(10)) {
            return redirect()->route('home.index');
        }

        $company = CurrentUser::currentCompany();
        $isConnected = Egov_account::where('company_id', $company->id)->where('delete_flg', 0)->exists();
        return view('ledger.egov', compact('isConnected'));
    }

    public function auth()
    {
        $company = CurrentUser::currentCompany();
        $company_id = $company->id;

        $auth = Egov::getAuth([
            'state' => $company_id
        ]);
        return response()->json([
            'url' => $auth
        ]);
    }
    public function getAuthCode(Request $request)
    {
        $company = CurrentUser::currentCompany();

        $code = $request->input('code');
        $state = $request->input('state');

        $closeScript = '<script>setTimeout(function () {window.open("about:blank", "_self").close();}, 2000);</script>';
        $errorHTML = '<html><body><h1>エラーが発生しました</h1>' . $closeScript . '</body></html>';

        if ($company->id != $state) {
            \Log::error("stateとcomapny_idが不一致です");
            return $errorHTML;
        }

        $response = Egov::getToken($code);
        if (isset($_SERVER['EGOV_TEST']) && $_SERVER['EGOV_TEST'] == 'true') {
            EgovTestLog::info(print_r('アクセストークン取得：' . $response, true));
        }
        if ($response->successful()) {
            $access_token = $response['access_token'];
            $refresh_token = $response['refresh_token'];
            $expires_in = $response['expires_in'];
            $refresh_expires_in = $response['refresh_expires_in'];
            $not_before_policy = $response['not-before-policy'];

            $q = Egov_account::where('company_id', $company->id);

            if ($q->exists()) {
                $q->update([
                    'access_token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'expires_in' => $expires_in,
                    'refresh_expires_in' => $refresh_expires_in,
                    'not_before_policy' => date('Y-m-d H:i:s', $not_before_policy),
                    'delete_flg' => 0
                ]);
            } else {
                Egov_account::insert([
                    'company_id' => $company->id,
                    'access_token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'expires_in' => $expires_in,
                    'refresh_expires_in' => $refresh_expires_in,
                    'not_before_policy' => date('Y-m-d H:i:s', $not_before_policy),
                    'delete_flg' => 0
                ]);
            }
        } else {
            \Log::error("アクセストークンが取得できませんでした");
            return $errorHTML;
        }
        return '<html><body><h1>連携が完了しました。</h1>' . $closeScript . '</body></html>';
    }

    public function getEgovAccount(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $isConnected = Egov_account::where('company_id', $company->id)->where('delete_flg', 0)->exists();

        return response()->json(['isConnected' => $isConnected]);
    }

    public function disconnect(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $account = Egov_account::select('refresh_token')->where('company_id', $company->id)->first();
        try {
            Egov::refreshToken($account->refresh_token)->logout();
        } catch (\Exception $err) {
            \Log::error($err);
        }

        Egov_account::where('company_id', $company->id)->update([
            'delete_flg' => 1
        ]);

        return true;
    }

    public function codeCheck(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $company_id = $company->id;

        $now = Carbon::now()->toDateTimeString();
        $account = Egov_account::where('company_id', $company_id)->where('delete_flg', 0)->first();
        // dd($now, $account->updated_at->format('Y-m-d H:i:s'));
        $now = Carbon::parse($now);
        $updated = Carbon::parse($account->updated_at->format('Y-m-d H:i:s'));
        $diffInMinutes = $now->diffInMinutes($updated);
        if ($diffInMinutes <= 5) {
            \Log::info(print_r('コード・アクセストークン・リフレッシュトークンの取得に成功しました', true));
        } else {
            \Log::error("アクセストークン・リフレッシュトークンの取得に失敗しました");
        }
    }
}
