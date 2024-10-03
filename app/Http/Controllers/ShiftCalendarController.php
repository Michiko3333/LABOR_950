<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftCalendarController extends Controller
{
    public function index()
    {
        return view('calendar.shift');
    }
}
