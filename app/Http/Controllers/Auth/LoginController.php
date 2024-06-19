<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\CurrentUser;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('home.index');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:20|regex:/^[!-~]+$/',
        ]);

        \Log::info("ログイン試行：" . $request->input('email'));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            \Log::info("ログイン成功：" . $request->input('email'));
            return redirect()->route('home.index');
        }

        \Log::error("ログイン失敗：" . $request->input('email'));

        return back()->withErrors([
            'email' => 'ユーザーが見つかりません',
        ])->onlyInput('email');
    }
}
