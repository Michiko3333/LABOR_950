<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\CurrentUser;

use App\EgovAPI\Egov;
use Exception;

use function PHPUnit\Framework\throwException;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $user = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();

        $branch = $user->branch()->first();

        $small = false;
        $prevurl = url()->previous();
        if ($prevurl === route('home.select') || $prevurl === route('auth.login'))
            $small = true;

        $body = [
            'mode' => $small ? 'small' : '',
        ];
        return view('home', compact('body', 'user', 'branch', 'currentCompany'));
    }

    public function select(Request $request)
    {

        $user = CurrentUser::info();

        $request->session()->forget('labor-alert');
        $request->session()->forget('company_id');
        $request->session()->forget('company_name');

        $companies = [];

        switch ($user->role_id) {
            case 999:
                $companies = Company::select('id', 'name')->where('company_division', 2)->where('delete_flg', 0)->get()->toArray();
                break;

            case 500:
                $clients = CurrentUser::clients()->with('company')->get();
                foreach ($clients as $client) {
                    array_push($companies, ['id' => $client->company->id, 'name' => $client->company->name]);
                }
                break;

            default:
                # none
                break;
        }

        return view('select', compact('companies', 'user'));
    }

    public function select_post(Request $request)
    {
        $req = $request->validate([
            'company_select' => 'required',
        ]);

        try {
            $company_id = $req['company_select'];
            $user = CurrentUser::info();
            if ($user->role_id === 500) {
                if (!CurrentUser::clients()->where('client_company_id', $company_id)->exists()) {
                    throw new \Exception('担当外');
                }
            }
            $company = Company::find($company_id);
            $request->session()->put('labor-alert', true);
            $request->session()->put('company_id', $company->id);
            $request->session()->put('company_name', $company->name);
            return redirect()->route('home.index');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'company_select' => '不正な値です。',
            ])->onlyInput('company_select');
        }
    }
}
