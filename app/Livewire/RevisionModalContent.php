<?php

namespace App\Livewire;

use App\Models\Salary_revision;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\MonthStandardSalary;
use App\Models\Salary_revision_history;
use Livewire\Component;


class RevisionModalContent extends Component
{
    public $company_id = 0;
    public $modal_era;
    public $modal_year = '';
    public $modal_month = '';
    public $monthly_standard_salary = '';
    public $health_insurance = '';
    public $welfare_annuity_insurance = '';
    public $id;
    public $employee;
    public $fixed_flg;
    public $revisionModalDate;
    public $isMounted = '';

    public $eras = [];
    public $years = [];
    public $months = [];
    public $eraStartYears = [];
    public $employees = [];
    public $eraOptions = [];
    public $validDates = [];
    public $wageLevels = [];

    protected $listeners = ['revisionModalOpened', 'submitRevision', 'updateRevision'];

    public function revisionModalOpened($fixed_flg, $id)
    {
        $this->resetErrorBag();
        $this->id = '';
        $this->isMounted = '';
        $this->fixed_flg = $fixed_flg;
        if ($id) {
            $this->id = $id;
            $employee_id = Salary_revision::where('id', $this->id)->pluck('employee_id')->first();
            $this->revisionModalDate = Salary_revision::where('id', $this->id)->pluck('revision_date')->first();
            $convertDate = Controller::convertWesternCalendarToJapaneseCalendar(Carbon::parse($this->revisionModalDate));
            $this->modal_era = $convertDate['japanese_calendar_era_num'];
            $this->modal_year = intval(Carbon::parse($convertDate['japanese_calendar_result'])->format('Y'));
            $this->updatedModalYear($this->modal_year);
            $this->modal_month = intval(Carbon::parse($convertDate['japanese_calendar_result'])->format('n'));
            $this->monthly_standard_salary = Salary_revision::where('id', $this->id)->pluck('monthly_standard_salary')->first();
            $this->health_insurance = Salary_revision::where('id', $this->id)->pluck('health_insurance')->first();
            $this->health_insurance = number_format($this->health_insurance);
            $this->welfare_annuity_insurance = Salary_revision::where('id', $this->id)->pluck('welfare_annuity_insurance')->first();
            $this->welfare_annuity_insurance = number_format($this->welfare_annuity_insurance);
            $this->employee = Employee::where('id', $employee_id)->first();

            $excludedDates = DB::table('m_salary_revision')
                ->where('employee_id', $employee_id)
                ->pluck('revision_date')
                ->toArray();
            $currentDate = Carbon::now();
            $currentYear = $currentDate->year;
            $currentMonth = $currentDate->month;

            $allMonths = [];
            for ($year = 1989; $year <= $currentYear; $year++) {
                $startMonth = ($year == 1989) ? 1 : 1;
                $endMonth = ($year == $currentYear) ? $currentMonth : 12;

                for ($month = $startMonth; $month <= $endMonth; $month++) {
                    $allMonths[] = Carbon::create($year, $month, 1)->format('Y-m-01');
                }
            }
            $availableDates = array_diff($allMonths, $excludedDates);
            $this->validDates = [];
            $this->validDates[] = $this->revisionModalDate;
            if ($this->fixed_flg == 1) {
                foreach ($availableDates as $date) {
                    $year = Carbon::parse($date)->year;
                    $month = Carbon::parse($date)->month;

                    $beforeMonths = [
                        Carbon::create($year, $month)->subMonths(1)->format('Y-m-01'),
                        Carbon::create($year, $month)->subMonths(2)->format('Y-m-01'),
                        Carbon::create($year, $month)->subMonths(3)->format('Y-m-01'),
                        Carbon::create($year, $month)->subMonths(4)->format('Y-m-01'),
                    ];

                    $wages = DB::table('t_wage')
                        ->where('employee_id', $employee_id)
                        ->whereIn('month', $beforeMonths)
                        ->pluck('total_amount', 'month')
                        ->toArray();

                    $averageAmount = (array_sum(array_intersect_key($wages, array_flip([$beforeMonths[1], $beforeMonths[2], $beforeMonths[0]]))) / 3);

                    $changeMonthAmount = $wages[$beforeMonths[3]] ?? 0;

                    $averageLevel = $this->getWageLevel($averageAmount, $this->wageLevels);
                    $changeMonthLevel = $this->getWageLevel($changeMonthAmount, $this->wageLevels);

                    if (abs($averageLevel - $changeMonthLevel) >= 2) {
                        $this->validDates[] = $date;
                    }
                }
            } else {
                foreach ($availableDates as $date) {
                    $year = Carbon::parse($date)->year;
                    $month = Carbon::parse($date)->month;

                    if ($month >= 7) {
                        $salary_months = [
                            Carbon::create($year)->format('Y-04-01'),
                            Carbon::create($year)->format('Y-05-01'),
                            Carbon::create($year)->format('Y-06-01'),
                        ];
                    } else {
                        $salary_months = [
                            Carbon::create($year)->subYears(1)->format('Y-04-01'),
                            Carbon::create($year)->subYears(1)->format('Y-05-01'),
                            Carbon::create($year)->subYears(1)->format('Y-06-01'),
                        ];
                    }

                    $wages = DB::table('t_wage')
                        ->where('employee_id', $employee_id)
                        ->whereIn('month', $salary_months)
                        ->pluck('total_amount', 'month')
                        ->toArray();

                    if (count($wages) > 0 && count(array_filter($wages, fn($amount) => !empty($amount))) === count($wages)) {
                        $this->validDates[] = $date;
                    }
                }
            }
            $this->eraOptions = [];
            foreach ($this->validDates as $date) {
                [$year, $month] = explode('-', $date);

                $era = 4;
                $eraYear = $year - 2018;
                $this->eraOptions[$era][$eraYear][] = (int)$month;
            }
            $prevModalYear = $this->modal_year;
            $this->years = [];
            foreach (array_keys($this->eraOptions[$this->modal_era]) as $key) {
                $this->years[$key] = "{$key}年";
            }
            ksort($this->years);
            $this->modal_year = $prevModalYear;
            $prevModalMonth = $this->modal_month;
            $this->months = [];
            foreach ($this->eraOptions[$this->modal_era][$this->modal_year] as $value) {
                $this->months[$value] = "{$value}月";
            }
            ksort($this->months);
            $this->modal_month = $prevModalMonth;
            $this->isMounted = '1';
        } else {
            $this->years = [];
            [$startYear, $endYear] = [2019, Carbon::now()->year];

            for ($y = $startYear; $y <= $endYear; $y++) {
                $eraYear = $y - $startYear + 1;
                $this->years[$eraYear] = "{$eraYear}年";
            }
            $this->months = [];
        }
    }

    public function mount($company_id, $modal_era = '4')
    {
        $this->eras = ['4' => '令和'];
        $this->company_id = $company_id;
        $this->modal_era = $modal_era;
        $this->years = [];
        [$startYear, $endYear] = [2019, Carbon::now()->year];

        for ($y = $startYear; $y <= $endYear; $y++) {
            $eraYear = $y - $startYear + 1;
            $this->years[$eraYear] = "{$eraYear}年";
        }

        $this->wageLevels = MonthStandardSalary::all();
    }

    public function render()
    {
        $this->dispatch('revision-modal-render');
        return view('livewire.revision-modal-content');
    }


    public function updatedModalYear($value)
    {
        $this->modal_month = '';
        $this->months = [];
        if ($this->isMounted) {
            $prevModalMonth = $this->modal_month;
            $this->months = [];
            if (isset($this->eraOptions[$this->modal_era][$this->modal_year]) && is_array($this->eraOptions[$this->modal_era][$this->modal_year])) {
                foreach ($this->eraOptions[$this->modal_era][$this->modal_year] as $value) {
                    $this->months[$value] = "{$value}月";
                }
                ksort($this->months);
                $this->modal_month = $prevModalMonth;
            }
        } else {
            $this->employee = [];

            $currentMonth = Carbon::now()->month;

            $selectedEra = $this->modal_era;
            $maxMonth = 12;
            $minMonth = 1;

            if ($selectedEra === '3' && $value == 31) {
                $maxMonth = 4;
            } elseif ($selectedEra === '4' && $value == 1) {
                $minMonth = 4;
            } else {
                if ($value == array_key_last($this->years)) {
                    $maxMonth = $currentMonth;
                }
                $minMonth = 1;
            }

            for ($m = $minMonth; $m <= $maxMonth; $m++) {
                $this->months[$m] = "{$m}月";
            }
        }
    }


    public function updatedModalMonth($value)
    {
        if (!$this->id) {
            $this->employee = [];
        }
        if ($value) {
            $this->revisionModalDate = Controller::convertJapaneseCalendarToWesternCalendar($this->modal_era, Carbon::create($this->modal_year, $value, 1));
            $revisiondate_year = $this->revisionModalDate->year;
            $revisiondate_month = $this->revisionModalDate->month;
            $excludedEmployees = DB::table('m_salary_revision')
                ->where('revision_date', $this->revisionModalDate)
                ->pluck('employee_id');
            if ($this->fixed_flg == 1) {
                $before_months = [
                    Carbon::create($revisiondate_year, $revisiondate_month)->subMonths(1)->format('Y-m-01'),
                    Carbon::create($revisiondate_year, $revisiondate_month)->subMonths(2)->format('Y-m-01'),
                    Carbon::create($revisiondate_year, $revisiondate_month)->subMonths(3)->format('Y-m-01'),
                    Carbon::create($revisiondate_year, $revisiondate_month)->subMonths(4)->format('Y-m-01'),
                ];

                $employees = DB::table('t_wage')
                    ->where('company_id', $this->company_id)
                    ->select('employee_id', 'month', 'total_amount')
                    ->whereIn('month', $before_months)
                    ->whereNotIn('employee_id', $excludedEmployees)
                    ->get()
                    ->groupBy('employee_id');

                $eligibleEmployees = [];

                foreach ($employees as $employeeId => $wages) {
                    $totalAmounts = $wages->pluck('total_amount', 'month')->toArray();

                    $averageAmount = array_sum(array_intersect_key($totalAmounts, array_flip([$before_months[1], $before_months[2], $before_months[0]]))) / 3;

                    $changeMonthAmount = $totalAmounts[$before_months[3]] ?? 0;

                    $averageLevel = $this->getWageLevel($averageAmount, $this->wageLevels);
                    $changeMonthLevel = $this->getWageLevel($changeMonthAmount, $this->wageLevels);

                    if (abs($averageLevel - $changeMonthLevel) >= 2) {
                        $eligibleEmployees[] = $employeeId;
                    }
                }

                $this->employees = DB::table('m_employee')
                    ->whereIn('id', $eligibleEmployees)
                    ->select('id', 'first_name', 'last_name')
                    ->get();
            } else {
                if ($value >= 7) {
                    $salary_months = [
                        Carbon::create($revisiondate_year)->format('Y-04-01'),
                        Carbon::create($revisiondate_year)->format('Y-05-01'),
                        Carbon::create($revisiondate_year)->format('Y-06-01'),
                    ];
                    $insured_month = Carbon::create($revisiondate_year)->format('Y-06-01');
                    $retired_month = Carbon::create($revisiondate_year)->format('Y-08-31');
                } else {
                    $salary_months = [
                        Carbon::create($revisiondate_year)->subYears(1)->format('Y-04-01'),
                        Carbon::create($revisiondate_year)->subYears(1)->format('Y-05-01'),
                        Carbon::create($revisiondate_year)->subYears(1)->format('Y-06-01'),
                    ];
                    $insured_month = Carbon::create($revisiondate_year)->subYears(1)->format('Y-06-01');
                    $retired_month = Carbon::create($revisiondate_year)->subYears(1)->format('Y-08-31');
                }

                $salary_employees = DB::table('t_wage')
                    ->where('company_id', $this->company_id)
                    ->whereIn('month', $salary_months)
                    ->whereNotIn('employee_id', $excludedEmployees)
                    ->where('total_amount', '!=', 0)
                    ->whereNotNull('total_amount')
                    ->select('employee_id', DB::raw('COUNT(*) as valid_months'))
                    ->groupBy('employee_id')
                    ->having('valid_months', '=', count($salary_months))
                    ->pluck('employee_id');

                $this->employees = DB::table('m_employee')
                    ->whereIn('id', $salary_employees)
                    ->where(function ($query) use ($insured_month) {
                        $query->where(function ($subQuery) use ($insured_month) {
                            $subQuery->where('health_insurance_acquisition_date', '<=', $insured_month)
                                ->orWhere('employment_insured_date', '<=', $insured_month);
                        })
                            ->where(function ($subQuery) {
                                $subQuery->whereNotNull('health_insurance_acquisition_date')
                                    ->orWhereNotNull('employment_insured_date');
                            });
                    })
                    ->where(function ($query) use ($retired_month) {
                        $query->whereNull('intended_retirement_date')
                            ->orWhere('intended_retirement_date', '>', $retired_month);
                    })
                    ->select('id', 'first_name', 'last_name')
                    ->get();
            }
        }
    }

    public function getWageLevel($amount, $wageLevels)
    {
        foreach ($wageLevels as $level) {
            if ($amount >= $level['monthly_salary_min'] && $amount < $level['monthly_salary_max']) {
                return $level['standard_salary_level'];
            }
        }
        return 0;
    }

    public function updatedMonthlyStandardSalary($value)
    {
        if ($value) {
            if ($value <= 650000) {
                $this->health_insurance = number_format($value);
                $this->welfare_annuity_insurance = number_format($value);
            } elseif ($value <= 1390000) {
                $this->health_insurance = number_format($value);
                $this->welfare_annuity_insurance = "650,000";
            } else {
                $this->health_insurance = "1,390,000";
                $this->welfare_annuity_insurance = "650,000";
            }
        }
    }

    public function submitRevision()
    {
        $rules = [
            'modal_era' => 'required',
            'modal_year' => 'required',
            'modal_month' => 'required',
            'employee' => 'required',
            'monthly_standard_salary' => 'required|integer|max_digits:9',
        ];
        $this->validate($rules, [
            'modal_era.required' => '改定年月の年号は必須です',
            'modal_year.required' => '改定年月の年は必須です',
            'modal_month.required' => '改定年月の月は必須です',
            'employee.required' => '該当者は必須です',
            'monthly_standard_salary.required' => '標準報酬月額は必須です',
            'monthly_standard_salary.integer' => '標準報酬月額は整数で入力してください',
            'monthly_standard_salary.max_digits' => '標準報酬月額は9桁以下で入力してください',
        ]);

        try {
            Salary_revision::create([
                'employee_id' => $this->employee,
                'monthly_standard_salary' => $this->monthly_standard_salary,
                'health_insurance' => str_replace(',', '', $this->health_insurance),
                'welfare_annuity_insurance' => str_replace(',', '', $this->welfare_annuity_insurance),
                'revision_date' => $this->revisionModalDate->format('Y-m-d'),
                'fixed_flg' => $this->fixed_flg,
            ]);
            Salary_revision_history::create([
                'employee_id' => $this->employee,
                'monthly_standard_salary' => $this->monthly_standard_salary,
                'health_insurance' => str_replace(',', '', $this->health_insurance),
                'welfare_annuity_insurance' => str_replace(',', '', $this->welfare_annuity_insurance),
                'revision_date' => $this->revisionModalDate->format('Y-m-d'),
            ]);
            $this->dispatch('closeRevisionModal');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }

    public function updateRevision()
    {
        $rules = [
            'modal_era' => 'required',
            'modal_year' => 'required',
            'modal_month' => 'required',
            'monthly_standard_salary' => 'required|integer|max_digits:9',
        ];
        $this->validate($rules, [
            'modal_era.required' => '改定年月の年号は必須です',
            'modal_year.required' => '改定年月の年は必須です',
            'modal_month.required' => '改定年月の月は必須です',
            'monthly_standard_salary.required' => '標準報酬月額は必須です',
            'monthly_standard_salary.integer' => '標準報酬月額は整数で入力してください',
            'monthly_standard_salary.max_digits' => '標準報酬月額は9桁以下で入力してください',
        ]);

        if (!Carbon::hasFormat($this->revisionModalDate, 'Y-m-d')) {
            $this->revisionModalDate = $this->revisionModalDate->format('Y-m-d');
        }

        try {
            Salary_revision::where('id', $this->id)->update([
                'monthly_standard_salary' => $this->monthly_standard_salary,
                'health_insurance' => str_replace(',', '', $this->health_insurance),
                'welfare_annuity_insurance' => str_replace(',', '', $this->welfare_annuity_insurance),
                'revision_date' => $this->revisionModalDate,
            ]);
            Salary_revision_history::create([
                'employee_id' => $this->employee['id'],
                'monthly_standard_salary' => $this->monthly_standard_salary,
                'health_insurance' => str_replace(',', '', $this->health_insurance),
                'welfare_annuity_insurance' => str_replace(',', '', $this->welfare_annuity_insurance),
                'revision_date' => $this->revisionModalDate,
            ]);
            $this->dispatch('closeRevisionModal');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withErrors('エラー');
        }
    }
}
