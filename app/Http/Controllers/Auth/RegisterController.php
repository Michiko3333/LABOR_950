<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }
    public function index()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        Log::info(print_r($data, true));
        $user = User::create($data);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function registerAccount(Request $request)
    {
        $output = new \StdClass();
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user = User::create($data);
            $output->success = true;
            $output->message = '';
            $output->user = $user;
        } catch (\Exception $err) {
            $output->success = false;
            $output->message = $err->getMessage();
            $output->user = null;
        }
        return $output;
    }
}
