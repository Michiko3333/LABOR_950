<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EgovAPI\Egov;
use App\Models\CurrentUser;
use App\Models\Egov_account;

class EgovController extends Controller
{

    public function index(Request $request)
    {
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $isConnected = Egov_account::where('company_id', $company->id)->where('delete_flg', 0)->exists();
        \Log::info(print_r($isConnected, true));
        return view('ledger.egov', compact('isConnected'));
    }

    public function auth(Request $request)
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
        if ($response->successful()) {
            $access_token = $response['access_token'];
            $refresh_token = $response['refresh_token'];

            $q = Egov_account::where('company_id', $company->id);

            if ($q->exists()) {
                $q->update([
                    'access_token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'delete_flg' => 0
                ]);
            } else {
                Egov_account::insert([
                    'company_id' => $company->id,
                    'access_token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'delete_flg' => 0
                ]);
            }
        } else {
            \Log::error("アクセストークンが取得できませんでした");
            return $errorHTML;
        }
        return '<html><body><h1>連携が完了しました。</h1>' . $closeScript . '</body></html>';
    }

    public function disconnect(Request $request)
    {
        $company = CurrentUser::currentCompany();
        Egov_account::where('company_id', $company->id)->update([
            'delete_flg' => 1
        ]);
        return true;
    }
}
