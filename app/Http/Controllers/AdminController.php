<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentUser;

class AdminController extends Controller
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
    }
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function company_list(Request $request)
    {
        return view('admin.companies');
    }
}
