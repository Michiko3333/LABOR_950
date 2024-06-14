<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Calendar_event;
use App\Models\CurrentUser;
use App\Permission;
use Livewire\Component;
use Carbon\Carbon;


class SideSchedule extends Component
{
    public $today = '';
    public $year = '';
    public $month = '';
    public $date = '';
    public $weekday = '';
    public $events = [];
    public $isLogin = false;
    public $isSelected = false;

    public function render()
    {
        $this->today = date('Y-m-d 00:00:00');
        $this->year = date('Y', strtotime($this->today));
        $this->month = date('m', strtotime($this->today));
        $this->date = date('d', strtotime($this->today));

        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $days_ja = [
            'Sun' => '日',
            'Mon' => '月',
            'Tue' => '火',
            'Wed' => '水',
            'Thu' => '木',
            'Fri' => '金',
            'Sat' => '土'
        ];
        $wd = array_search(date('D', strtotime($this->today)), $days);
        $wd_ja = $days[$wd];
        $this->weekday = $days_ja[$wd_ja];

        if (empty(Auth::user())) {
            $this->isLogin = false;
            $this->isSelected = false;
            $this->events = [];
        } else {
            $this->isLogin = true;
            $this->applySchedules();
        }

        return view('livewire.side-schedule');
    }

    public function applySchedules()
    {
        $permission = new Permission();
        $current_company = CurrentUser::currentCompany();
        $current_user = CurrentUser::info();
        $events_list = [];

        if (!empty($current_company)) {

            $base_date = new Carbon($this->year . '-' . $this->month . '-' . $this->date . ' 00:00:00');
            $limit_date = new Carbon($this->year . '-' . $this->month . '-' . $this->date . ' 23:59:59');
            $limit_date = $limit_date->copy()->addMonth();

            $admin_event = Calendar_event::select(
                't_calendar_event.id',
                't_calendar_event.name',
                't_calendar_event.from',
                't_calendar_event.to',
                't_calendar_event.contents',
                't_calendar_event.employee_id',
                'emp.role_id'
            )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                ->where('t_calendar_event.delete_flg', 0)
                ->where('emp.role_id', 999)
                ->where(function ($query) use ($base_date, $limit_date) {
                    $query->where('t_calendar_event.from', '>=', $base_date)
                        ->where('t_calendar_event.from', '<=', $limit_date)
                        ->orWhere(function ($query) use ($base_date, $limit_date) {
                            $query->whereNotNull('t_calendar_event.to')
                                ->where('t_calendar_event.to', '>=', $base_date)
                                ->where('t_calendar_event.to', '<=', $limit_date);
                        });
                })
                ->get()->toArray();
            $events_list = array_merge($events_list, $admin_event);

            if ($permission->isAdmin()) {
                $employee_event = Calendar_event::select(
                    't_calendar_event.id',
                    't_calendar_event.name',
                    't_calendar_event.from',
                    't_calendar_event.to',
                    't_calendar_event.contents',
                    't_calendar_event.employee_id',
                    'emp.role_id'
                )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                    ->where('t_calendar_event.company_id', $current_company->id)
                    ->where('t_calendar_event.delete_flg', 0)
                    ->where(function ($query) use ($base_date, $limit_date) {
                        $query->where('t_calendar_event.from', '>=', $base_date)
                            ->where('t_calendar_event.from', '<=', $limit_date)
                            ->orWhere(function ($query) use ($base_date, $limit_date) {
                                $query->whereNotNull('t_calendar_event.to')
                                    ->where('t_calendar_event.to', '>=', $base_date)
                                    ->where('t_calendar_event.to', '<=', $limit_date);
                            });
                    })
                    ->get()->toArray();
                $events_list = array_merge($events_list, $employee_event);
            } else if ($permission->isLabor()) {
                // 顧客側すべて
                $employee_event = Calendar_event::select(
                    't_calendar_event.id',
                    't_calendar_event.name',
                    't_calendar_event.from',
                    't_calendar_event.to',
                    't_calendar_event.contents',
                    't_calendar_event.employee_id',
                    'emp.role_id'
                )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                    ->where('t_calendar_event.company_id', $current_company->id)
                    ->where(function ($query) use ($base_date, $limit_date) {
                        $query->where('t_calendar_event.from', '>=', $base_date)
                            ->where('t_calendar_event.from', '<=', $limit_date)
                            ->orWhere(function ($query) use ($base_date, $limit_date) {
                                $query->whereNotNull('t_calendar_event.to')
                                    ->where('t_calendar_event.to', '>=', $base_date)
                                    ->where('t_calendar_event.to', '<=', $limit_date);
                            });
                    })
                    ->where('t_calendar_event.delete_flg', 0)
                    ->where('emp.role_id', 100)
                    ->get()->toArray();
                $events_list = array_merge($events_list, $employee_event);

                // 自分かつ顧客宛
                $own_event = Calendar_event::select(
                    't_calendar_event.id',
                    't_calendar_event.name',
                    't_calendar_event.from',
                    't_calendar_event.to',
                    't_calendar_event.contents',
                    't_calendar_event.employee_id',
                    'emp.role_id'
                )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                    ->where('t_calendar_event.employee_id', $current_user->id)
                    ->where('t_calendar_event.company_id', $current_company->id)
                    ->where(function ($query) use ($base_date, $limit_date) {
                        $query->where('t_calendar_event.from', '>=', $base_date)
                            ->where('t_calendar_event.from', '<=', $limit_date)
                            ->orWhere(function ($query) use ($base_date, $limit_date) {
                                $query->whereNotNull('t_calendar_event.to')
                                    ->where('t_calendar_event.to', '>=', $base_date)
                                    ->where('t_calendar_event.to', '<=', $limit_date);
                            });
                    })
                    ->where('t_calendar_event.delete_flg', 0)
                    ->get()->toArray();
                $events_list = array_merge($events_list, $own_event);
            } else {
                $employee_event = Calendar_event::select(
                    't_calendar_event.id',
                    't_calendar_event.name',
                    't_calendar_event.from',
                    't_calendar_event.to',
                    't_calendar_event.contents',
                    't_calendar_event.employee_id',
                    'emp.role_id'
                )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                    ->where('t_calendar_event.employee_id', '!=', $current_user->id)
                    ->where('t_calendar_event.company_id', $current_company->id)
                    ->where(function ($query) use ($base_date, $limit_date) {
                        $query->where('t_calendar_event.from', '>=', $base_date)
                            ->where('t_calendar_event.from', '<=', $limit_date)
                            ->orWhere(function ($query) use ($base_date, $limit_date) {
                                $query->whereNotNull('t_calendar_event.to')
                                    ->where('t_calendar_event.to', '>=', $base_date)
                                    ->where('t_calendar_event.to', '<=', $limit_date);
                            });
                    })
                    ->where('emp.role_id', 100)
                    ->where('t_calendar_event.category_type', 1)
                    ->where('t_calendar_event.delete_flg', 0)
                    ->get()->toArray();
                $events_list = array_merge($events_list, $employee_event);

                $own_event = Calendar_event::select(
                    't_calendar_event.id',
                    't_calendar_event.name',
                    't_calendar_event.from',
                    't_calendar_event.to',
                    't_calendar_event.contents',
                    't_calendar_event.employee_id',
                    'emp.role_id'
                )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                    ->where('t_calendar_event.employee_id', $current_user->id)
                    ->where('t_calendar_event.company_id', $current_company->id)
                    ->where(function ($query) use ($base_date, $limit_date) {
                        $query->where('t_calendar_event.from', '>=', $base_date)
                            ->where('t_calendar_event.from', '<=', $limit_date)
                            ->orWhere(function ($query) use ($base_date, $limit_date) {
                                $query->whereNotNull('t_calendar_event.to')
                                    ->where('t_calendar_event.to', '>=', $base_date)
                                    ->where('t_calendar_event.to', '<=', $limit_date);
                            });
                    })
                    ->where('t_calendar_event.delete_flg', 0)
                    ->get()->toArray();
                $events_list = array_merge($events_list, $own_event);
            }
            $this->isSelected = true;
        } else {
            $this->isSelected = false;
        }

        $i = 0;
        foreach ($events_list as $ev) {
            if ($i > 4) continue;
            $type = '';
            if (!empty($ev['role_id'])) {
                if ($ev['role_id'] == 999) $type = 'admin';
                else if ($ev['role_id'] == 500) $type = 'labor';
                else if ($ev['employee_id'] != $current_user->id) $type = 'normal';
            }

            $this->add_event($ev['id'], $ev['name'], $ev['from'], $ev['to'], $ev['contents'], $type);
            $i++;
        }

        usort($this->events, function ($a, $b) {
            if ($a[2] == $b[2]) {
                return 0;
            }
            return ($a[2] < $b[2]) ? -1 : 1;
        });
    }

    public function add_event($id, $name, $from, $to, $cts, $color = '')
    {
        $this->events[] = [$id, $name, $from, $to, $cts, $color];
    }
}
