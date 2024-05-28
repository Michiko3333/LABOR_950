<?php

namespace App\Livewire;

use App\Models\Calendar_event;
use App\Models\CurrentUser;
use App\Models\Values_calendar_event_category_type;
use App\Permission;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On;

class Calendar extends Component
{
    public $current_company;
    private $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $start_day = 0;

    public $date = null;
    public $today = null;
    public $active_year, $active_month;
    public $days_ja = [
        'Sun' => '日',
        'Mon' => '月',
        'Tue' => '火',
        'Wed' => '水',
        'Thu' => '木',
        'Fri' => '金',
        'Sat' => '土'
    ];
    public $num_days = '';
    public $num_days_last_month = '';
    public $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $first_day_of_week = 0;
    public $events = [];

    public $years = [];
    public $months = array(
        1 => '01',
        2 => '02',
        3 => '03',
        4 => '04',
        5 => '05',
        6 => '06',
        7 => '07',
        8 => '08',
        9 => '09',
        10 => '10',
        11 => '11',
        12 => '12'
    );

    public $category_types = [];

    public $select_year, $select_month;
    public $current_edit_id = 0;

    public $inputs_edit_id = 0;
    public $inputs_name = '';
    public $inputs_category = '';
    public $inputs_contents = '';
    public $inputs_error = false;

    public $isOpen = false;

    public function mount()
    {
        $this->today = date('Y-m-d');
        $current_date = date('Y', strtotime($this->today));
        $one_year_ago = date('Y', strtotime('-1 year', strtotime($current_date)));
        $one_year_later = date('Y', strtotime('+1 year', strtotime($current_date)));
        $this->years = array(
            'one_year_ago' => $one_year_ago,
            'current_date' => $current_date,
            'one_year_later' => $one_year_later
        );

        $this->select_year = $current_date;
        $this->select_month = date('m', strtotime($this->today));

        $this->current_company = CurrentUser::currentCompany();

        $this->category_types = Values_calendar_event_category_type::pluck('name', 'id');

        $branch = CurrentUser::branch()->first();
        if (!empty($branch)) {
            if (!empty($branch->start_days_of_week)) {
                $this->start_day = $branch->start_days_of_week - 1;
            }
        }

        $this->calcDate();
    }

    public function render()
    {
        $permission = new Permission();
        $this->calcDate();

        if ($this->start_day < 0 || $this->start_day > 6) $this->start_day = 0;
        $before_start_day = array_slice($this->day_base, 0, $this->start_day);
        $after_start_day = array_slice($this->day_base, $this->start_day);
        $this->days = array_merge($after_start_day, $before_start_day);

        $base_date = new Carbon($this->active_year . '-' . $this->active_month . '-01 00:00:00');

        $current_user = CurrentUser::info();
        $current_company = CurrentUser::currentCompany();
        $events_list = [];

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
            ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
            ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
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
                ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
                ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
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
                ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
                ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
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
                ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
                ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
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
                ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
                ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
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
                ->whereDate('t_calendar_event.from', '>=', $base_date->copy()->subMonth())
                ->whereDate('t_calendar_event.from', '<=', $base_date->copy()->addMonth())
                ->where('t_calendar_event.delete_flg', 0)
                ->get()->toArray();
            $events_list = array_merge($events_list, $own_event);
        }

        $this->events = [];
        foreach ($events_list as $ev) {
            $days = 1;
            $type = '';
            if (!empty($ev['to'])) {
                $timestamp1 = strtotime($ev['from']);
                $timestamp2 = strtotime($ev['to']);

                $date1 = date('Y-m-d 00:00', $timestamp1);
                $date2 = date('Y-m-d 00:00', $timestamp2);

                $diff = strtotime($date2) - strtotime($date1);
                $diffDays = floor($diff / (60 * 60 * 24)) + 1;
                $days = $diffDays;
            }

            if (!empty($ev['role_id'])) {
                if ($ev['role_id'] == 999) $type = 'admin';
                else if ($ev['role_id'] == 500) $type = 'labor';
                else if ($ev['employee_id'] != $current_user->id) $type = 'normal';
            }

            $this->add_event($ev['id'], $ev['name'], $ev['from'], $days, $type);
        }

        $this->num_days = date('t', strtotime('01-' . $this->active_month . '-' . $this->active_year));
        $this->num_days_last_month = date('j', strtotime('last day of previous month', strtotime('01-' . $this->active_month . '-' . $this->active_year)));
        $this->first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $this->days);

        return view('livewire.calendar');
    }

    public function calcDate()
    {
        $this->date = date('y-m-d', strtotime($this->select_year . '-' . $this->select_month . '-01'));
        $this->active_year = $this->date != null ? date('Y', strtotime($this->date)) : date('Y');
        $this->active_month = $this->date != null ? date('m', strtotime($this->date)) : date('m');
    }

    public function add_event($id, $txt, $date, $days = 1, $color = '')
    {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$id, $txt, $date, $days, $color];
    }

    public function checkdate($event, $i, $d)
    {
        return date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[2]));
    }

    public function page($move)
    {
        $min = strtotime($this->years['one_year_ago'] . '-01-01 00:00');
        $max = strtotime($this->years['one_year_later'] . '-12-31 23:59');
        if ($move == 'next') {
            $m = strtotime('+1 month', strtotime($this->date));
            if ($max > $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));
            }
        } else {
            $m = strtotime('-1 month', strtotime($this->date));
            if ($min <= $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));
            }
        }
    }

    public function isToday($i)
    {
        return $i == date('d', strtotime($this->today)) && $this->active_month == date('m', strtotime($this->today)) && $this->active_year == date('Y', strtotime($this->today));
    }

    public function setToday()
    {
        $this->select_year = date('Y', strtotime($this->today));
        $this->select_month = date('m', strtotime($this->today));
    }

    public function resetForm()
    {
        $this->inputs_edit_id = 0;
        $this->inputs_name = '';
        $this->inputs_category = '';
        $this->inputs_contents = '';
        $this->inputs_error = false;
    }

    public function detail($id = 0)
    {
        if ($this->isOpen) return;
        $this->isOpen = true;

        if (!empty($id)) {
            $current_user = CurrentUser::info();
            $current_company = CurrentUser::currentCompany();
            $d = Calendar_event::where('t_calendar_event.id', $id)->where('t_calendar_event.delete_flg', 0)->whereIn('company_id', [0, $current_company->id])->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')->first();
            if (!empty($d)) {
                $edit_id = $id;
                $name = $d->name;
                $from = empty($d->from) ? '' : strtotime($d->from);
                $to = empty($d->to) ? '' : strtotime($d->to);
                $category = $d->category_type;
                $contents = $d->contents;
                $own = $d->employee_id == $current_user->id;

                $this->dispatch('modal-onDetailModal', info: [
                    'role_id' => $d->role_id,
                    'author' => $d->last_name . ' ' . $d->first_name,
                    'own' => $own,
                    'edit_id' => $edit_id,
                    'name' => $name,
                    'from' => $from,
                    'to' => $to,
                    'category' => $this->category_types[$category] ?? '',
                    'contents' => $contents
                ]);
            } else {
                \Log::error('no content');
            }
        }
    }
    #[On('onStartEditCalendar')]
    public function new($id = 0)
    {
        $this->resetForm();

        if (!empty($id)) {
            $d = Calendar_event::where('id', $id)->where('delete_flg', 0)->first();
            if (!empty($d)) {

                $this->inputs_edit_id = $id;
                $this->inputs_name = $d->name;

                $form = empty($d->from) ? '' : strtotime($d->from);
                $to = empty($d->to) ? '' : strtotime($d->to);

                $this->inputs_category = $d->category_type;
                $this->inputs_contents = $d->contents;

                $this->dispatch('modal-onEditModal', date: [$form, $to]);
            } else {
                \Log::error('no content');
            }
        } else {
            $this->dispatch('modal-onEditModal', date: ['', '']);
        }
    }

    #[On('onCancelCalendar')]
    public function cancel()
    {
        $this->resetForm();
    }

    #[On('onCloseCalendar')]
    public function close()
    {
        $this->isOpen = false;
    }

    #[On('onSubmitCalendar')]
    public function submit($from = '', $to = '')
    {
        // validation
        $this->inputs_error = !$this->valid($from, $to);
        if ($this->inputs_error) {
            $this->dispatch('modal-onSubmitError');
            return false;
        }

        // convert date
        $from_date = empty($from) ? null : Carbon::createFromTimestamp($from)->toDateTimeString();
        $to_date = empty($to) ? null : Carbon::createFromTimestamp($to)->toDateTimeString();

        $current_user = CurrentUser::info();
        $current_company = CurrentUser::currentCompany();

        if (empty($this->inputs_edit_id)) {
            Calendar_event::insert([
                'employee_id' => $current_user->id,
                'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                'name' => $this->inputs_name,
                'category_type' => $this->inputs_category,
                'from' => $from_date,
                'to' => $to_date,
                'contents' => $this->inputs_contents,
            ]);
        } else {
            $res = Calendar_event::where('id', $this->inputs_edit_id)->update([
                'name' => $this->inputs_name,
                'category_type' => $this->inputs_category,
                'from' => $from_date,
                'to' => $to_date,
                'contents' => $this->inputs_contents,
            ]);
        }
        $this->resetForm();
        $this->dispatch('modal-closeCalendarModal');
        return true;
    }

    public function valid($from, $to)
    {
        if (!empty($to)) {
            if ($from > $to) return false;
        }
        return !empty($this->inputs_name) && !empty($from)  && !empty($this->inputs_category);
    }

    public function translateDate($d)
    {
        $d = str_replace('日', '', $d);  // "日"を空文字に置換する
        $d = str_replace('年', '-', $d); // "年"を"-"に置換する
        $d = str_replace('月', '-', $d);
        return $d;
    }
}
