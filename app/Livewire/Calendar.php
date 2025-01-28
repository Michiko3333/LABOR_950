<?php

namespace App\Livewire;

use App\Models\Calendar_event;
use App\Models\CurrentUser;
use App\Models\Values_calendar_event_category_type;
use App\Models\Pickup_setting;
use App\Models\Pickup;
use App\Models\Pickup_message;
use App\Permission;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

class Calendar extends Component
{
    public $current_company;
    private $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $start_day = 0;

    public $date = null;
    public $today = null;
    public $todayFirstOfMonth = null;
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
    public $last_event_id = 0;

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
    public $company_events = 1;
    public $personnel_affairs = 1;
    public $general_affairs = 1;
    public $administrative_procedures = 1;
    public $taxation_services = 1;
    public $others = 1;
    public $grants_and_subsidies = 1;

    public $repetition_types = ['繰り返さない', '毎週', '毎月（曜日）', '毎月（日付）', '毎年'];

    public $select_year, $select_month;
    public $current_edit_id = 0;

    public $inputs_edit_id = 0;
    public $inputs_name = '';
    public $inputs_subsidies_name = '';
    public $inputs_category = '';
    public $inputs_contents = '';
    public $inputs_repetition = '';
    public $inputs_error = false;

    public $isOpen = false;

    public $todayNextYear, $todayAfterNextYear;
    public $todayNextMonth, $todayAfterNextMonth;

    public $editPermission = false;
    public $userPermission = false;

    public $nextMonthEvent = [];
    public $afterNextMonthEvent = [];

    public $clickable = true;

    public function mount()
    {
        $today = date('Y-m' . '-01');
        $dateTime = new \DateTime($today);
        $dateTime1 = clone $dateTime;

        $dateTime1->modify('+1 month');
        $dateTime2 = clone $dateTime;
        $dateTime2->modify('+2 month');
        $this->todayNextYear = $dateTime1->format('Y');
        $this->todayAfterNextYear = $dateTime2->format('Y');
        $this->todayNextMonth = $dateTime1->format('m');
        $this->todayAfterNextMonth = $dateTime2->format('m');

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

        $this->todayFirstOfMonth = Carbon::today()->firstOfMonth();

        $current_user = CurrentUser::info();

        $this->current_company = CurrentUser::currentCompany();

        $permission = new Permission();
        $this->userPermission = $permission->isWritableFor(11);
        $this->editPermission = $this->userPermission && ($permission->isGeneralAffair() && !$permission->isAdmin()) && $current_user->employee_status !== 1;

        if (!empty($this->current_company->start_day_of_week)) {
            $this->start_day = $this->current_company->start_day_of_week;
        }

        $this->category_types = Values_calendar_event_category_type::pluck('name', 'id');

        $this->calcDate();

        $this->getEvents();

        $this->num_days = date('t', strtotime('01-' . $this->active_month . '-' . $this->active_year));
        $this->num_days_last_month = date('j', strtotime('last day of previous month', strtotime('01-' . $this->active_month . '-' . $this->active_year)));
        $this->first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $this->days);
    }

    public function render()
    {
        $this->calcDate();

        if ($this->start_day < 0 || $this->start_day > 6) $this->start_day = 0;
        $before_start_day = array_slice($this->day_base, 0, $this->start_day);
        $after_start_day = array_slice($this->day_base, $this->start_day);
        $this->days = array_merge($after_start_day, $before_start_day);

        $this->num_days = date('t', strtotime('01-' . $this->active_month . '-' . $this->active_year));
        $this->num_days_last_month = date('j', strtotime('last day of previous month', strtotime('01-' . $this->active_month . '-' . $this->active_year)));
        $this->first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $this->days);

        $this->nextMonthEvent = $this->getCalenderSmallDotValues(1);
        $this->afterNextMonthEvent = $this->getCalenderSmallDotValues(2);

        foreach ($this->events as &$event) {
            if (isset($event[4]) && $event[4] == 'company-events') {
                $event[7] = $this->company_events ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'personnel-affairs') {
                $event[7] = $this->personnel_affairs ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'general-affairs') {
                $event[7] = $this->general_affairs ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'administrative-procedures') {
                $event[7] = $this->administrative_procedures ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'taxation-services') {
                $event[7] = $this->taxation_services ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'others') {
                $event[7] = $this->others ? 'open' : 'hide';
            }
            if (isset($event[4]) && $event[4] == 'grants-and-subsidies') {
                $event[7] = $this->grants_and_subsidies ? 'open' : 'hide';
            }
        }

        return view('livewire.calendar');
    }

    #[On('getEvents')]
    public function getEvents()
    {
        $permission = new Permission();
        $this->calcDate();

        if ($this->start_day < 0 || $this->start_day > 6) $this->start_day = 0;
        $before_start_day = array_slice($this->day_base, 0, $this->start_day);
        $after_start_day = array_slice($this->day_base, $this->start_day);
        $this->days = array_merge($after_start_day, $before_start_day);

        $min = strtotime($this->years['one_year_ago'] . '-01-01 00:00');
        $max = strtotime($this->years['one_year_later'] . '-12-31 23:59');
        $date_start = new Carbon($min);
        $date_to = new Carbon($max);

        $current_company = CurrentUser::currentCompany();
        $events_list = [];

        if ($permission->isAdmin() || $permission->isLabor() || $this->editPermission) {
            $employee_event = Calendar_event::select(
                't_calendar_event.id',
                't_calendar_event.category_type',
                't_calendar_event.name',
                't_calendar_event.from',
                't_calendar_event.to',
                't_calendar_event.contents',
                't_calendar_event.employee_id',
                'emp.role_id'
            )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
                ->where('t_calendar_event.company_id', $current_company->id)
                ->where('t_calendar_event.delete_flg', 0)
                ->whereDate('t_calendar_event.from', '>=', $date_start)
                ->whereDate('t_calendar_event.from', '<=', $date_to)
                ->get()->toArray();
            $events_list = array_merge($events_list, $employee_event);
        } else {
            $employee_event = Calendar_event::select(
                't_calendar_event.id',
                't_calendar_event.category_type',
                't_calendar_event.name',
                't_calendar_event.from',
                't_calendar_event.to',
                't_calendar_event.contents',
                't_calendar_event.employee_id',
                'emp.role_id'
            )->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')
            ->where('t_calendar_event.company_id', $current_company->id)
                ->where('t_calendar_event.delete_flg', 0)
                ->whereDate('t_calendar_event.from', '>=', $date_start)
                ->whereDate('t_calendar_event.from', '<=', $date_to)
                ->where('t_calendar_event.category_type', 1)
                ->get()->toArray();
            $events_list = array_merge($events_list, $employee_event);
        }

        $grouped_events = [];
        $position_map = [];
        $end_day_of_week = ($this->start_day % 7) - 1;

        if(empty($events_list)) {
            $this->events = [];
        }

        foreach ($events_list as $ev) {
            $days = 1;
            $event_id = $ev['id'];
            $type = '';

            $timestamp1 = strtotime($ev['from']);
            $date1 = date('Y-m-d 00:00', $timestamp1);

            if (!empty($ev['to'])) {
                $timestamp2 = strtotime($ev['to']);
                $date2 = date('Y-m-d 00:00', $timestamp2);

                $diff = strtotime($date2) - strtotime($date1);
                $diffDays = floor($diff / (60 * 60 * 24)) + 1;
                $days = $diffDays;
            }

            $category_types = [
                1 => 'company-events',
                2 => 'general-affairs',
                3 => 'taxation-services',
                4 => 'personnel-affairs',
                5 => 'administrative-procedures',
                6 => 'others',
                7 => 'grants-and-subsidies'
            ];

            $ev['days'] = $days;
            $ev['type'] = $category_types[$ev['category_type']] ?? 'company-events';

            $daysRemaining = $ev['days'];

            for ($i = 0; $i < $days; $i++) {
                $eventDay = date('Y-m-d', strtotime("$date1 +$i day"));
                $event_day_of_week = date('w', strtotime($eventDay));
                $day_of_month = date('j', strtotime($eventDay));
                $eventNextDay = date('Y-m-d', strtotime("$eventDay +1 day"));
                $day_of_next_month = date('j', strtotime($eventNextDay));
                $lastDayOfMonth = date('Y-m-t', strtotime($eventDay));
                $day_difference = abs(date('j', strtotime($eventDay)) - date('j', strtotime($lastDayOfMonth)));
                $new_days = 1;

                if (!isset($grouped_events[$eventDay])) {
                    $grouped_events[$eventDay] = [];
                }

                if($i === 0) {
                    if($ev['to']) {
                        if($end_day_of_week === (int)$event_day_of_week || (int)$day_of_next_month === 1) {
                            $new_days = 1;
                        } else {
                            $new_days = abs(($end_day_of_week - $event_day_of_week + 7) % 7) + 1;
                            
                            if($day_difference < $new_days) {
                                $new_days = $day_difference + 1;
                            }
                            if($daysRemaining <= $new_days) {
                                $new_days = $daysRemaining;
                            }
                        }
                        $daysRemaining--;
                        $ev['days'] = $new_days;

                        if((int)$event_day_of_week === $this->start_day) {
                            $ev['start_day'] = true;
                        } else {
                            $ev['start_day'] = false;
                        }
                    }

                    if(!isset($position_map)) {
                        $position_map = [];
                    }

                    $ev['event_start'] = true;
                    $emptyPosition = null;
                    foreach ($grouped_events[$eventDay] as $key => $event) {
                        if (isset($event['id']) && $event['id'] === 0) {
                            $emptyPosition = $key;
                            break;
                        }
                    }

                    if (!empty($emptyPosition)) {
                        $grouped_events[$eventDay][$emptyPosition] = $ev;
                    } else {
                        $grouped_events[$eventDay][] = $ev;
                    }

                    $id_values = array_column($grouped_events[$eventDay], 'id');
                    $position = array_search($event_id, $id_values);
                    $position_map[$event_id] = $position;
                } else {
                    $ev['from'] = $eventDay;

                    $new_days = abs(($end_day_of_week - $event_day_of_week + 7) % 7) + 1;
                    if($end_day_of_week === (int)$event_day_of_week || (int)$day_of_next_month === 1) {
                        $new_days = 1;
                    } else {
                        if($daysRemaining <= $new_days) {
                            $new_days = $daysRemaining;
                        }
                        if($day_difference < $new_days) {
                            $new_days = $day_difference + 1;
                        }
                    }
                    $daysRemaining--;
                    $ev['days'] = $new_days;
                    
                    if((int)$event_day_of_week === $this->start_day) {
                        $ev['start_day'] = true;
                    } else {
                        $ev['start_day'] = false;
                    }
                    
                    if(((int)$event_day_of_week === $end_day_of_week + 1) || (int)$day_of_month === 1) {
                        if(isset($position_map[$event_id])) {
                            $ev['event_start'] = true;
                            $grouped_events[$eventDay][] = $ev;
                            $id_values = array_column($grouped_events[$eventDay], 'id');
                            $position = array_search($event_id, $id_values);
                            $position_map[$event_id] = $position;
                        }
                    } else {
                        if(isset($position_map[$event_id])) {
                            $ev['event_start'] = false;
                            $position = $position_map[$event_id];

                            if (array_key_exists($position, $grouped_events[$eventDay]) && $grouped_events[$eventDay][$position]['id'] === 0) {
                                $grouped_events[$eventDay][$position] = $ev;
                            } else {
                                while (count($grouped_events[$eventDay]) < $position) {
                                    $grouped_events[$eventDay][] = [
                                        'id' => 0,
                                        'name' => 'empty',
                                        'from' => $ev['from'],
                                        'days' => 1,
                                        'type' => $ev['type'],
                                        'event_start' => false,
                                        'filter_event' => false,
                                    ];
                                }
                                array_splice($grouped_events[$eventDay], $position, 0, [$event_id => $ev]);
                            }
                        }
                    }
                }
            }

            $this->events = [];
            $eventsToAdd = [];

            foreach ($grouped_events as $grouped_event) {
                foreach ($grouped_event as $event) {
                    if (isset($event['id'], $event['name'], $event['from'], $event['days'], $event['type'], $event['event_start'])) {
                        $eventsToAdd[] = $event;
                    }
                }
            }
            $this->add_events($eventsToAdd);
        }
    }

    private function getCalenderSmallDotValues(int $nextMonthNum): array
    {
        /***
         * 翌月、翌々月のミニカレンダー情報を取得する
         * int  $nextMonth: 1(翌月) or 2(翌々月)のみ
         */
        if ($nextMonthNum !== 1 && $nextMonthNum !== 2) {
            return [];
        }
        $calenderSmallDotValues = [];
        $events_date = array_column($this->events, 2);
        if (isset($events_date)) {
            $nextMonth = sprintf('%02d', ($this->select_month % 12) + $nextMonthNum);
            if($nextMonth >= '13') {
                $nextMonth = '01';
            }
            $filteredNextMonth  = array_filter($events_date, function($date) use ($nextMonth) {
                $month = explode('-', explode(' ', $date)[0])[1];
                return $month === $nextMonth;
            });
            foreach ($filteredNextMonth as &$event) {
                $calenderSmallDotValues[] = [
                    'full' => $event,
                    'color' => 'var(--color-red)',
                    'year' => date('Y', strtotime($event)),
                    'month' => date('n', strtotime($event)),
                    'date' => date('j', strtotime($event)),
                    'mark' => 'dot'
                ];
            }
            unset($nextMonth,$filteredNextMonth,$event);
        }
        return $calenderSmallDotValues;
    }

    public function calcDate()
    {
        $this->date = date('y-m-d', strtotime($this->select_year . '-' . $this->select_month . '-01'));
        $this->active_year = $this->date != null ? date('Y', strtotime($this->date)) : date('Y');
        $this->active_month = $this->date != null ? date('m', strtotime($this->date)) : date('m');
    }

    public function add_events(array $events)
    {
        foreach ($events as $event) {
            $id = $event['id'];
            $txt = $event['name'];
            $date = $event['from'];
            $days = $event['days'];
            $color = $event['type'] ?? '';
            $event_start = $event['event_start'] ?? false;
            $filter_event = $event['filter_event'] ?? false;

            $width = 100 * $days;

            if(isset($event['start_day']) && $event['start_day'] === true) {
                $add_width = (($days - 1) * 17) + ((1 * $days) - 1) * 1;
            } else {
                $add_width = ($days - 1) * 17;
            }

            $this->events[] = [$id, $txt, $date, $days, $color, $event_start, $width, $filter_event, $add_width];
        }
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
            $next_m = strtotime('+2 month', strtotime($this->date));
            $after_next_m = strtotime('+3 month', strtotime($this->date));
            if ($max > $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));
                
                $next_d = date('Y-m-d', $next_m);
                $this->todayNextYear = date('Y', strtotime($next_d));
                $this->todayNextMonth = date('m', strtotime($next_d));
                
                $next_after_d = date('Y-m-d', $after_next_m);
                $this->todayAfterNextYear = date('Y', strtotime($next_after_d));
                $this->todayAfterNextMonth = date('m', strtotime($next_after_d));
            }
        } else {
            $m = strtotime('-1 month', strtotime($this->date));
            $next_m = strtotime($this->date);
            $after_next_m = strtotime('+1 month', strtotime($this->date));
            if ($min <= $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));

                $next_d = date('Y-m-d', $next_m);
                $this->todayNextYear = date('Y', strtotime($next_d));
                $this->todayNextMonth = date('m', strtotime($next_d));

                $next_after_d = date('Y-m-d', $after_next_m);
                $this->todayAfterNextYear = date('Y', strtotime($next_after_d));
                $this->todayAfterNextMonth = date('m', strtotime($next_after_d));
            }
        }
    }

    public function isToday($i)
    {
        return $i == date('d', strtotime($this->today)) && $this->active_month == date('m', strtotime($this->today)) && $this->active_year == date('Y', strtotime($this->today));
    }

    public function setToday()
    {
        $this->select_year = date('Y', strtotime($this->todayFirstOfMonth));
        $this->select_month = date('m', strtotime($this->todayFirstOfMonth));

        $next_m = strtotime('+1 month', strtotime($this->todayFirstOfMonth));
        $after_next_m = strtotime('+2 month', strtotime($this->todayFirstOfMonth));

        $next_d = date('Y-m-d', $next_m);
        $this->todayNextYear = date('Y', strtotime($next_d));
        $this->todayNextMonth = date('m', strtotime($next_d));

        $next_after_d = date('Y-m-d', $after_next_m);
        $this->todayAfterNextYear = date('Y', strtotime($next_after_d));
        $this->todayAfterNextMonth = date('m', strtotime($next_after_d));
    }

    public function updatedSelectYear($value)
    {
        $selectDate = date('Y-m-d', strtotime($value . '-' . $this->active_month . '-01'));
        $next_m = strtotime('+1 month', strtotime($selectDate));
        $after_next_m = strtotime('+2 month', strtotime($selectDate));

        $next_d = date('Y-m-d', $next_m);
        $after_next_d = date('Y-m-d', $after_next_m);
        $this->todayNextYear = date('Y', strtotime($next_d));
        $this->todayAfterNextYear = date('Y', strtotime($after_next_d));
    }

    public function updatedSelectMonth($value)
    {
        $selectDate = date('Y-m-d', strtotime($this->active_year . '-' . $value . '-01'));
        $next_m = strtotime('+1 month', strtotime($selectDate));
        $after_next_m = strtotime('+2 month', strtotime($selectDate));

        $next_d = date('Y-m-d', $next_m);
        $after_next_d = date('Y-m-d', $after_next_m);
        $this->todayNextYear = date('Y', strtotime($next_d));
        $this->todayAfterNextYear = date('Y', strtotime($after_next_d));
        $this->todayNextMonth = date('m', strtotime($next_d));
        $this->todayAfterNextMonth = date('m', strtotime($after_next_d));
    }

    #[On('calendar-small-clicked')]
    public function CalendarClicked($dateStr)
    {
        $min = strtotime($this->years['one_year_ago'] . '-01-01 00:00');
        $max = strtotime($this->years['one_year_later'] . '-12-31 23:59');
        $date_start = new Carbon($min);
        $date_to = new Carbon($max);
        $dateStr = Carbon::parse($dateStr);

        if ($dateStr->between($date_start, $date_to)) {
            $this->select_year = date('Y', strtotime($dateStr));
            $this->select_month = date('m', strtotime($dateStr));

            $next_m = strtotime('+1 month', strtotime($dateStr));
            $after_next_m = strtotime('+2 month', strtotime($dateStr));

            $next_d = date('Y-m-d', $next_m);
            $after_next_d = date('Y-m-d', $after_next_m);
            $this->todayNextYear = date('Y', strtotime($next_d));
            $this->todayAfterNextYear = date('Y', strtotime($after_next_d));
            $this->todayNextMonth = date('m', strtotime($next_d));
            $this->todayAfterNextMonth = date('m', strtotime($after_next_d));
        }
    }

    public function resetForm()
    {
        $this->inputs_edit_id = 0;
        $this->inputs_name = '';
        $this->inputs_subsidies_name = '';
        $this->inputs_category = '';
        $this->inputs_repetition = null;
        $this->inputs_contents = '';
        $this->inputs_error = false;
    }

    public function setData($from, $to)
    {
        return [
            'inputs_edit_id' => $this->inputs_edit_id,
            'inputs_name' => $this->inputs_name,
            'inputs_subsidies_name' => $this->inputs_subsidies_name,
            'inputs_category' => $this->inputs_category,
            'inputs_repetition' => $this->inputs_repetition ?? 0,
            'inputs_contents' => $this->inputs_contents,
            'from' => $from,
            'to' => $to
        ];
    }

    public function detail($id = 0)
    {
        if ($this->isOpen) return;
        $this->isOpen = true;

        if (!empty($id)) {
            $current_user = CurrentUser::info();
            $role_type = 'employee';
            if($current_user->role_id === 999) {
                $role_type = 'admin';
            } elseif($current_user->role_id === 500) {
                $role_type = 'labor';
            }
            $current_company = CurrentUser::currentCompany();
            $d = Calendar_event::where('t_calendar_event.id', $id)->where('t_calendar_event.delete_flg', 0)->whereIn('company_id', [0, $current_company->id])->leftJoin('m_employee as emp', 't_calendar_event.employee_id', '=', 'emp.id')->first();
            if (!empty($d)) {
                $edit_id = $id;
                $name = $d->name;
                $from = empty($d->from) ? '' : strtotime($d->from);
                $to = empty($d->to) ? '' : strtotime($d->to);
                $category = $d->category_type;
                $contents = $d->contents;
                $repetition_type = $d->repetition_type;

                $this->dispatch('modal-onDetailModal', info: [
                    'role_id' => $d->role_id,
                    'role_type' => $role_type,
                    'author' => $d->last_name . ' ' . $d->first_name,
                    'edit_id' => $edit_id,
                    'name' => $name,
                    'subsidies_name' => $d->subsidies_name,
                    'from' => $from,
                    'to' => $to,
                    'category' => $this->category_types[$category] ?? '',
                    'repetition_type' => $this->repetition_types[$repetition_type] ?? $this->repetition_types[0],
                    'contents' => $contents,
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
                $this->inputs_subsidies_name = $d->subsidies_name;

                $from = empty($d->from) ? '' : strtotime($d->from);
                $to = empty($d->to) ? '' : strtotime($d->to);

                $this->inputs_category = $d->category_type;
                $this->inputs_repetition = $d->repetition_type ?? 0;
                $this->inputs_contents = $d->contents;

                $this->dispatch('modal-onEditModal', $this->setData($from, $to));
            } else {
                \Log::error('no content');
            }
        } else {
            $this->dispatch('modal-onEditModal', $this->setData('', ''));
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
    public function submit($data)
    {
        // validation
        $this->inputs_error = !$this->valid($data);
        if ($this->inputs_error) {
            $this->dispatch('modal-onSubmitError');
            return false;
        }

        // convert date
        $from_date = empty($data['from']) ? null : Carbon::createFromTimestamp($data['from']);
        $to_date = empty($data['to']) ? null : Carbon::createFromTimestamp($data['to']);

        $current_user = CurrentUser::info();
        $current_company = CurrentUser::currentCompany();
        $identifier = (string) Str::uuid();

        $insertData = [];

        if($data['inputs_category'] !== '7') {
            $data['inputs_subsidies_name'] = '';
        } else {
            $data['inputs_repetition'] = 0;
        }
        // 新規登録
        if (empty($this->inputs_edit_id)) {
            switch ($data['inputs_repetition']) {
                case 1: // 毎週
                    $insertData[] = [
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => $data['inputs_repetition'],
                        'identifier' => $identifier,
                    ];

                    for ($i = 0; $i <= 365; $i += 7) {
                        $new_from_date = $from_date->addDays(7);
                        $new_to_date = $to_date ? $to_date->addDays(7) : null;

                        $insertData[] = [
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $new_from_date->toDateTimeString(),
                            'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => $identifier,
                        ];
                    }
                    break;

                case 2: // 毎月（曜日）
                    $insertData[] = [
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => $data['inputs_repetition'],
                        'identifier' => $identifier,
                    ];

                    $startOfMonth = $from_date->copy()->startOfMonth();
                    $weekNumber = (int)round(($from_date->day - $startOfMonth->dayOfWeek - 1) / 7) + 1;
                    $weekDay = strtoupper($from_date->copy()->format('l'));
                    $weekDayNumber = [
                        'SUNDAY' => Carbon::SUNDAY,
                        'MONDAY' => Carbon::MONDAY,
                        'TUESDAY' => Carbon::TUESDAY,
                        'WEDNESDAY' => Carbon::WEDNESDAY,
                        'THURSDAY' => Carbon::THURSDAY,
                        'FRIDAY' => Carbon::FRIDAY,
                        'SATURDAY' => Carbon::SATURDAY,
                    ];
                    $weekDayConstant = $weekDayNumber[$weekDay] ?? null;

                    $fromTime = $from_date->format('H:i:s');
                    $toTime = $to_date ? $to_date->format('H:i:s') : null;

                    for ($i = 0; $i < 12; $i++) {
                        $new_from_date = $from_date->addMonth(1);
                        $new_to_date = $to_date ? $to_date->addMonth(1) : null;

                        $new_from_date = Carbon::createFromDate($new_from_date->year, $new_from_date->month)
                                            ->nthOfMonth($weekNumber, $weekDayConstant);
                        $new_to_date = $new_to_date ? Carbon::createFromDate($new_to_date->year, $new_to_date->month)
                                            ->nthOfMonth($weekNumber, $weekDayConstant) : null;
                        if($new_from_date === false || $new_to_date === false) {
                            continue;
                        }

                        $new_from_date->setTimeFromTimeString($fromTime);
                        $new_to_date ? $new_to_date->setTimeFromTimeString($toTime) : '';

                        $insertData[] = [
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $new_from_date->toDateTimeString(),
                            'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => $identifier,
                        ];
                    }
                    break;

                case 3: // 毎月（日付）
                    $insertData[] = [
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => $data['inputs_repetition'],
                        'identifier' => $identifier,
                    ];

                    $new_from_date = $from_date->copy();
                    $new_to_date = $to_date ? $to_date->copy() : null;
                    $comparison_from_date = $new_from_date->copy()->setDay(1);

                    for ($i = 0; $i < 12; $i++) {
                        $comparison_from_date->addMonth(1);
                        $day = $new_from_date->format('d');
                        if (!checkdate($comparison_from_date->format('m'), $day, $comparison_from_date->format('Y'))) {
                            continue;
                        } else {
                            $new_from_date->addMonth(1);
                            $new_to_date ? $new_to_date->addMonth(1) : null;
                        }

                        $insertData[] = [
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $new_from_date->toDateTimeString(),
                            'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => $identifier,
                        ];
                    }
                    break;

                case 4: // 毎年
                    for ($i = 0; $i <= 1; $i++) {
                        $new_from_date = $from_date->addYears($i);
                        $new_to_date = $to_date ? $to_date->addYears($i) : null;
                        $day = $new_from_date->format('d');
                        if (!checkdate($new_from_date->format('m'), $day, $new_from_date->format('Y'))) {
                            continue;
                        }

                        $insertData[] = [
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $new_from_date->toDateTimeString(),
                            'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => $identifier,
                        ];
                    }
                    break;

                default: // 繰り返しなし
                    if($data['inputs_category'] === '7') {
                        Calendar_event::create([
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $from_date->toDateTimeString(),
                            'to' => $to_date ? $to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => null,
                        ]);
                    } else {
                        $insertData[] = [
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $from_date->toDateTimeString(),
                            'to' => $to_date ? $to_date->toDateTimeString() :null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => null,
                        ];
                    }
                    break;
            }
        // 編集
        } else {
            $select_event_type = $data['inputs_select_events_type'];
            $exitingFirstsEvents = null;
            $existingEvents = [];
            $existingEvent = Calendar_event::where('id', $this->inputs_edit_id)
                ->first();

            if($existingEvent->identifier === null) {
                if($data['inputs_repetition'] === '0') {
                    $identifier = null;
                }

                if($data['inputs_category'] === '7') {
                    Calendar_event::where('id', $this->inputs_edit_id)
                        ->update([
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $from_date->toDateTimeString(),
                            'to' => $to_date ? $to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => null,
                        ]);
                } else {
                    Calendar_event::where('id', $this->inputs_edit_id)
                        ->update([
                            'employee_id' => $current_user->id,
                            'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                            'name' => $data['inputs_name'],
                            'subsidies_name' => $data['inputs_subsidies_name'],
                            'category_type' => $data['inputs_category'],
                            'from' => $from_date->toDateTimeString(),
                            'to' => $to_date ? $to_date->toDateTimeString() : null,
                            'contents' => $data['inputs_contents'],
                            'repetition_type' => $data['inputs_repetition'],
                            'identifier' => $identifier,
                        ]);
                }

                $existingEvent = Calendar_event::where('id', $this->inputs_edit_id)->first();
            }

            $eventIdentifier = $existingEvent->identifier;

            // この予定
            if($select_event_type === '0' && $existingEvent) {
                $data['inputs_repetition'] = 0;

                Calendar_event::where('id', $this->inputs_edit_id)
                    ->update([
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => 0,
                        'identifier' => null,
                    ]);

                $existingEvents = Calendar_event::where('identifier',  $eventIdentifier)
                    ->where('id', $this->inputs_edit_id)
                    ->select('id')
                    ->get()
                    ->toArray();
            // これ以降の予定
            } elseif($select_event_type === '1' && $existingEvent) {
                Calendar_event::where('identifier', $eventIdentifier)
                    ->where('id', '>', $this->inputs_edit_id)
                    ->update([
                        'delete_flg' => 1,
                    ]);

                $existingEvents = Calendar_event::where('identifier',  $eventIdentifier)
                    ->where('id', '>', $this->inputs_edit_id)
                    ->select('id')
                    ->get()
                    ->toArray();

                $eventIdentifier = $identifier;

                Calendar_event::where('id', $this->inputs_edit_id)
                    ->update([
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => $data['inputs_repetition'],
                        'identifier' => $eventIdentifier,
                    ]);
            // 全ての予定
            } elseif($select_event_type === '2' && $existingEvent) {
                $exiting_from_date = Carbon::parse($existingEvent->from);
                $from_time = $from_date->format('H:i:s');
                $to_time = $to_date ? $to_date->format('H:i:s') : null;

                $exitingFirstsEvents = Calendar_event::where('identifier',  $eventIdentifier)
                    ->where('delete_flg', 0)
                    ->first();
                $exiting_first_from_date = $exitingFirstsEvents->from ? Carbon::parse($exitingFirstsEvents->from) : $from_date;

                $from_difference = $exiting_from_date->diffInDays($from_date, false);
                $from_date = $from_difference >= 0
                    ? $exiting_first_from_date->copy()->addDays($from_difference)
                    : $exiting_first_from_date->copy()->subDays(abs($from_difference));
                list($hour, $minute, $second) = explode(':', $from_time);
                $from_date->setTime($hour, $minute, $second);

                if($to_date) {
                    $to_difference = $exiting_from_date->diffInDays($to_date, false);
                    $to_date = $from_difference >= 0
                        ? $exiting_first_from_date->copy()->addDays($to_difference)
                        : $exiting_first_from_date->copy()->subDays(abs($to_difference));
                    list($hour, $minute, $second) = explode(':', $to_time);
                    $to_date->setTime($hour, $minute, $second);
                }

                Calendar_event::where('id', $exitingFirstsEvents->id)
                    ->update([
                        'employee_id' => $current_user->id,
                        'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                        'name' => $data['inputs_name'],
                        'subsidies_name' => $data['inputs_subsidies_name'],
                        'category_type' => $data['inputs_category'],
                        'from' => $from_date->toDateTimeString(),
                        'to' => $to_date ? $to_date->toDateTimeString() : null,
                        'contents' => $data['inputs_contents'],
                        'repetition_type' => $data['inputs_repetition'],
                        'identifier' => $eventIdentifier,
                    ]);
                Calendar_event::where('identifier',  $eventIdentifier)
                    ->where('id', '!=', $exitingFirstsEvents->id)
                    ->update([
                        'delete_flg' => 1,
                    ]);

                $existingEvents = Calendar_event::where('identifier',  $eventIdentifier)
                    ->where('id', '!=', $exitingFirstsEvents->id)
                    ->select('id')
                    ->get()
                    ->toArray();
            }

            $index = 0;
            switch ($data['inputs_repetition']) {
                case 1: // 毎週
                    for ($i = 7; $i <= 365; $i += 7) {
                        $new_from_date = $from_date->copy()->addDays($i);
                        $new_to_date = $to_date ? $to_date->copy()->addDays($i) : null;

                        if (isset($existingEvents[$index])) {
                            Calendar_event::where('id', $existingEvents[$index]['id'])
                                ->update([
                                    'employee_id' => $current_user->id,
                                    'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                    'name' => $data['inputs_name'],
                                    'subsidies_name' => $data['inputs_subsidies_name'],
                                    'category_type' => $data['inputs_category'],
                                    'from' => $new_from_date->toDateTimeString(),
                                    'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                    'contents' => $data['inputs_contents'],
                                    'repetition_type' => $data['inputs_repetition'],
                                    'identifier' => $eventIdentifier,
                                    'delete_flg' => 0,
                                ]);
                            $index++;
                        } else {
                            $insertData[] = [
                                'employee_id' => $current_user->id,
                                'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                'name' => $data['inputs_name'],
                                'subsidies_name' => $data['inputs_subsidies_name'],
                                'category_type' => $data['inputs_category'],
                                'from' => $new_from_date->toDateTimeString(),
                                'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                'contents' => $data['inputs_contents'],
                                'repetition_type' => $data['inputs_repetition'],
                                'identifier' => $eventIdentifier,
                                'delete_flg' => 0,
                            ];
                        }
                    }
                    break;

                case 2: // 毎月（曜日）
                    $startOfMonth = $from_date->copy()->startOfMonth();
                    $weekNumber = (int)round(($from_date->day - $startOfMonth->dayOfWeek - 1) / 7) + 1;
                    $weekDay = strtoupper($from_date->copy()->format('l'));
                    $weekDayNumber = [
                        'SUNDAY' => Carbon::SUNDAY,
                        'MONDAY' => Carbon::MONDAY,
                        'TUESDAY' => Carbon::TUESDAY,
                        'WEDNESDAY' => Carbon::WEDNESDAY,
                        'THURSDAY' => Carbon::THURSDAY,
                        'FRIDAY' => Carbon::FRIDAY,
                        'SATURDAY' => Carbon::SATURDAY,
                    ];
                    $weekDayConstant = $weekDayNumber[$weekDay] ?? null;

                    $fromTime = $from_date->copy()->format('H:i:s');
                    $toTime = $to_date ? $to_date->copy()->format('H:i:s') : null;

                    for ($i = 1; $i <= 12; $i++) {
                        $new_from_date = $from_date->copy()->addMonth($i);
                        $new_to_date = $to_date ? $to_date->copy()->addMonth($i) : null;

                        $new_from_date = Carbon::createFromDate($new_from_date->year, $new_from_date->month)
                                            ->nthOfMonth($weekNumber, $weekDayConstant);
                        $new_to_date = $new_to_date ? Carbon::createFromDate($new_to_date->year, $new_to_date->month)
                                            ->nthOfMonth($weekNumber, $weekDayConstant) : null;
                        if($new_from_date === false || $new_to_date === false) {
                            continue;
                        }

                        $new_from_date->setTimeFromTimeString($fromTime);
                        $new_to_date ? $new_to_date->setTimeFromTimeString($toTime) : null;

                        if (isset($existingEvents[$index])) {
                            Calendar_event::where('id', $existingEvents[$index]['id'])
                                ->update([
                                    'employee_id' => $current_user->id,
                                    'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                    'name' => $data['inputs_name'],
                                    'subsidies_name' => $data['inputs_subsidies_name'],
                                    'category_type' => $data['inputs_category'],
                                    'from' => $new_from_date->toDateTimeString(),
                                    'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                    'contents' => $data['inputs_contents'],
                                    'repetition_type' => $data['inputs_repetition'],
                                    'identifier' => $eventIdentifier,
                                    'delete_flg' => 0,
                                ]);
                            $index++;
                        } else {
                            $insertData[] = [
                                'employee_id' => $current_user->id,
                                'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                'name' => $data['inputs_name'],
                                'subsidies_name' => $data['inputs_subsidies_name'],
                                'category_type' => $data['inputs_category'],
                                'from' => $new_from_date->toDateTimeString(),
                                'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                'contents' => $data['inputs_contents'],
                                'repetition_type' => $data['inputs_repetition'],
                                'identifier' => $eventIdentifier,
                                'delete_flg' => 0,
                            ];
                        }
                    }
                    break;

                case 3: // 毎月（日付）
                    for ($i = 1; $i <= 12; $i++) {
                        $new_from_date = $from_date->copy();
                        $new_to_date = $to_date ? $to_date->copy() : null;

                        $comparison_from_date = $new_from_date->copy()->setDay(1);
                        $comparison_from_date->addMonth($i);

                        $day = $new_from_date->format('d');
                        if (!checkdate($comparison_from_date->format('m'), $day, $comparison_from_date->format('Y'))) {
                            continue;
                        } else {
                            $new_from_date->addMonth($i);
                            $new_to_date ? $new_to_date->addMonth($i) : null;
                        }

                        if (isset($existingEvents[$index])) {
                            Calendar_event::where('id', $existingEvents[$index]['id'])
                                ->update([
                                    'employee_id' => $current_user->id,
                                    'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                    'name' => $data['inputs_name'],
                                    'subsidies_name' => $data['inputs_subsidies_name'],
                                    'category_type' => $data['inputs_category'],
                                    'from' => $new_from_date->toDateTimeString(),
                                    'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                    'contents' => $data['inputs_contents'],
                                    'repetition_type' => $data['inputs_repetition'],
                                    'identifier' => $eventIdentifier,
                                    'delete_flg' => 0,
                                ]);
                            $index++;
                        } else {
                            $insertData[] = [
                                'employee_id' => $current_user->id,
                                'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                'name' => $data['inputs_name'],
                                'subsidies_name' => $data['inputs_subsidies_name'],
                                'category_type' => $data['inputs_category'],
                                'from' => $new_from_date->toDateTimeString(),
                                'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                'contents' => $data['inputs_contents'],
                                'repetition_type' => $data['inputs_repetition'],
                                'identifier' => $eventIdentifier,
                                'delete_flg' => 0,
                            ];
                        }
                    }
                    break;

                case 4: // 毎年
                    for ($i = 1; $i <= 1; $i++) {
                        $new_from_date = $from_date->copy()->addYears($i);
                        $new_to_date = $to_date ? $to_date->copy()->addYears($i) : null;
                        $day = $new_from_date->format('d');
                        if (!checkdate($new_from_date->format('m'), $day, $new_from_date->format('Y'))) {
                            continue;
                        }

                        if (isset($existingEvents[$index])) {
                            Calendar_event::where('id', $existingEvents[$index]['id'])
                                ->update([
                                    'employee_id' => $current_user->id,
                                    'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                    'name' => $data['inputs_name'],
                                    'subsidies_name' => $data['inputs_subsidies_name'],
                                    'category_type' => $data['inputs_category'],
                                    'from' => $new_from_date->toDateTimeString(),
                                    'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                    'contents' => $data['inputs_contents'],
                                    'repetition_type' => $data['inputs_repetition'],
                                    'identifier' => $eventIdentifier,
                                    'delete_flg' => 0,
                                ]);
                            $index++;
                        } else {
                            $insertData[] = [
                                'employee_id' => $current_user->id,
                                'company_id' => $current_user->role_id == 999 ? 0 : $current_company->id,
                                'name' => $data['inputs_name'],
                                'subsidies_name' => $data['inputs_subsidies_name'],
                                'category_type' => $data['inputs_category'],
                                'from' => $new_from_date->toDateTimeString(),
                                'to' => $new_to_date ? $new_to_date->toDateTimeString() : null,
                                'contents' => $data['inputs_contents'],
                                'repetition_type' => $data['inputs_repetition'],
                                'identifier' => $eventIdentifier,
                                'delete_flg' => 0,
                            ];
                        }
                    }
                    break;
            }
        }

        Calendar_event::insert($insertData);

        $this->resetForm();
        $this->dispatch('modal-closeCalendarModal');
        return true;
    }

    #[On('onRemoveCalendar')]
    public function onRemove($value = '0')
    {
        $identifier = Calendar_event::where('id', $this->inputs_edit_id)->value('identifier');

        // この予定
        if($value === '0') {
            Calendar_event::where('id', $this->inputs_edit_id)
                ->update([
                    'delete_flg' => 1
                ]);
        // これ以降の予定
        } elseif($value === '1') {
            Calendar_event::where('identifier', $identifier)
                ->where('id', '>=', $this->inputs_edit_id)
                ->update([
                    'delete_flg' => 1
                ]);
        // 全ての予定
        } elseif($value === '2') {
            Calendar_event::where('identifier', $identifier)
                ->update([
                    'delete_flg' => 1
                ]);
        }

        $this->resetForm();
        $this->dispatch('modal-closeCalendarModal');
    }

    public function valid($data)
    {
        $min = strtotime($this->years['one_year_ago'] . '-01-01 00:00');
        $max = strtotime($this->years['one_year_later'] . '-12-31 23:59');

        if (mb_strlen($data['inputs_name']) > 20) return false;
        if (mb_strlen($data['inputs_subsidies_name']) >= 50) return false;

        if ($data['inputs_category'] < 1 || $data['inputs_category'] > count($this->category_types)) {
            return;
        }
        if ($data['inputs_category'] == 7) {
            if(empty($data['inputs_subsidies_name'])) {
                return;
            }
        }

        if ($min > $data['from'] || $max < $data['from']) return false;

        if (!empty($data['to'])) {
            if ($min > $data['to'] || $max < $data['to']) return false;
            if ($data['from'] > $data['to']) return false;
        }

        return !empty($data['inputs_name']) && !empty($data['from'])  && !empty($data['inputs_category']);
    }

    public function translateDate($d)
    {
        $d = str_replace('日', '', $d);  // "日"を空文字に置換する
        $d = str_replace('年', '-', $d); // "年"を"-"に置換する
        $d = str_replace('月', '-', $d);
        return $d;
    }
}
