<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KgiController extends Controller
{
    public function index()
    {
        return view('kgi_information.kgi_information');
    }
}