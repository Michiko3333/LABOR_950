<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class CalendarController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany()) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(11)) {
            return redirect()->route('home.index');
        }
        return view('calendar.index');
    }
}
