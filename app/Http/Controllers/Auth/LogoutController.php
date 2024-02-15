<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\User;

class LogoutController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }
    public function index(Request $request)
    {
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function logout(Request $request)
    {
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
