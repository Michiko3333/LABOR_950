<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Permission;
use App\Models\CurrentUser;
use App\Models\Pickup;

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

        $editPermission = ($userPermission->isGeneralAffair() && !$userPermission->isAdmin() && $userPermission->isReadableFor(15));

        $current_company = CurrentUser::currentCompany();
        $current_company_id = 0;
        if(!empty($current_company)) {
            $current_company_id = $current_company->id;
        }

        $today = Carbon::today();

        $all_pickups = Pickup::where('company_id', $current_company_id)
            ->where('pickup_type_id', '!=', 9) // 役員の誕生日以外
            ->where('delete_flg', 0)
            ->get();

        $pickups = Pickup::select('id', 'pickup_type_id', 'due_date', 'business_name', 'created_at')
            ->where('company_id', $current_company_id)
            ->whereDate('due_date', '>=', $today)
            ->where('pickup_situation_id', '<', 3) // 未対応・対応中のみ
            ->where('anonymous_flg', 0)
            ->where('delete_flg', 0)
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();

        if(!empty($pickups)) {
            $pickups = $pickups->map(function ($pickup) use ($today) {
                $days_difference = Carbon::parse($pickup->created_at)->startOfDay()->diffInDays($today);
                if($days_difference > 90) {
                    $pickup->days_difference = '3ヶ月以上前';
                } elseif($days_difference > 60) {
                    $pickup->days_difference = '2ヶ月前';
                } elseif($days_difference > 30) {
                    $pickup->days_difference = '1ヶ月前';
                } elseif($days_difference === 0) {
                    $pickup->days_difference = '今日';
                } else {
                    $pickup->days_difference = $days_difference . '日前';
                }
                return $pickup;
            });

            foreach($pickups as $pickup) {
                $pickup_index = $all_pickups->pluck('id')->search($pickup->id);
                $pickup_index += 1;

                if($pickup->pickup_type_id === 9) {
                    $pickup->id = 0;
                }

                $pickup->pickup_page = ceil($pickup_index / 10);
            }
        } else {
            $pickups = null;
        }

        return view('calendar.index', ['pickups' => $pickups ?? null, 'editPermission' => $editPermission]);
    }
}
