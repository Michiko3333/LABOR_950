<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\EgovAPI\Egov;

class HomeController extends Controller
{
    public function index()
    {
        if (session('selection') === true) {
            return redirect()->route('home.select');
        }

        $small = false;

        $prevurl = url()->previous();

        if ($prevurl === route('home.select'))
            $small = true;

        $body = [
            'mode' => $small ? 'small' : ''
        ];

        return view('home', compact('body'));
    }

    public function select()
    {
        return view('select');
    }

    public function select_post(Request $request)
    {
        session()->put('selection', false);
        return redirect()->route('home.index');
    }
}
