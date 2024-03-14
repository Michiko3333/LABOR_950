<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\CurrentUser;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function isSelectedCompany()
    {
        $user = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();

        if ($user->role_id == 999 || $user->role_id == 500) {
            if (empty($currentCompany)) {
                return false;
            }
        }
        return true;
    }

    protected function isSuccess($request)
    {
        $bool = $request->session()->get('post-success', false);
        $request->session()->put('post-success', false);
        return $bool;
    }

    protected function putSuccess($request, $bool = true)
    {
        $request->session()->put('post-success', $bool);
    }

    public function resetToast(Request $request)
    {
        $this->putSuccess($request, false);
        return 0;
    }
}
