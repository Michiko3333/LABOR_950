<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Employee;
use Carbon\Carbon;

class CurrentUser extends Auth
{
    public static function info()
    {
        $user = Auth::user();
        return Employee::find($user->id);
    }

    public static function branch()
    {
        return self::info()->branch();
    }

    public static function company()
    {
        $q = self::info()->with('branch')->first();
        return Company::find($q->branch->company_id);
    }

    public static function receptionist()
    {
        $q = self::info()->with('branch')->first();
        return Company::find($q->branch->company_id);
    }

    public static function clients()
    {
        return self::info()->receptionist()
            ->where('contract_start_date', '<=', Carbon::today())
            ->where('contract_end_date', '>=', Carbon::today());
    }

    public static function currentCompany()
    {
        $q = self::info()->first();
        $company_id = 0;
        if ($q->role_id === 999 || $q->role_id === 500) {
            $company_id = session()->get('company_id', 0);
        } else {
            $company_id = self::branch()->value('company_id');
        }
        return Company::find($company_id);
    }
}
