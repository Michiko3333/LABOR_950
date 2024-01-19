<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EgovController extends Controller
{
    public function getAuthCode(Request $request)
    {
        return $request->collect();
    }
}
