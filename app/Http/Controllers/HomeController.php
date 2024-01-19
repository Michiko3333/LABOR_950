<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\EgovAPI\Egov;

class HomeController extends Controller
{
    public function index()
    {
        $egov_config = array(
            'dev' => config('egov.dev'),
            'client_id' => config('egov.software_id'),
            'api_key' => config('egov.api_key'),
            'redirect_uri' => config('egov.redirect_uri')
        );

        $url = Egov::getAuth();
        Log::info(print_r($url, true));
        return view('home', compact('url'));
    }
}