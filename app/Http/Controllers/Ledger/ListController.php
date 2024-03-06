<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Exception;

use function PHPUnit\Framework\throwException;

class ListController extends Controller
{
    public function index(Request $request)
    {
        return view('ledger/ledger');
    }
}
