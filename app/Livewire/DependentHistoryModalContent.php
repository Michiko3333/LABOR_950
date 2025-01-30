<?php

namespace App\Livewire;

use App\Models\Dependent;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;

class DependentHistoryModalContent extends Component
{
    public $data = [];
    public $prefectures = [];

    public function mount($prefectures = [], $dependent = [])
    {
        $this->prefectures = $prefectures;
        $dependent = collect($dependent);
        $this->data = $dependent->filter(function ($item) {
            return $item['history_flg'] == 1;
        })->map(function ($item) {
            $item['lw-accordion'] = 1;
            $item['age'] = "";
            return $item;
        })->values()->toArray();
        foreach($this->data as &$item){
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $item['birthday'])) {
                list($year, $month, $day) = explode('-', $item['birthday']);
                $birthDate = new \DateTime("$year-$month-$day");
                $today = new \DateTime();
                $age = $today->format('Y') - $birthDate->format('Y');
                $monthDiff = $today->format('m') - $birthDate->format('m');
            
                if ($monthDiff < 0 || ($monthDiff === 0 && $today->format('d') < $birthDate->format('d'))) {
                    $age -= 1;
                    $monthDiff += 12;
                }

                $item['age'] = "{$age}歳{$monthDiff}ヵ月";
                $item['birthday'] = Carbon::createFromFormat('Y-m-d', $item['birthday'])->format('Y年n月j日');
            }
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $item['date_of_authorisation'])) {
                $item['date_of_authorisation'] = Carbon::createFromFormat('Y-m-d', $item['date_of_authorisation'])->format('Y年n月j日');
            }
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $item['date_of_expiry'])) {
                $item['date_of_expiry'] = Carbon::createFromFormat('Y-m-d', $item['date_of_expiry'])->format('Y年n月j日');
            }
        }
        unset($item);
    }
    public function render()
    {
        return view('livewire.dependent-history-modal-content');
    }

    public function switchAccordion($index)
    {
        $this->data[$index]['lw-accordion'] = !$this->data[$index]['lw-accordion'];
    }
}
