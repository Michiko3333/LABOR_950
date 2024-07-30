<?php

namespace App\Livewire;

use App\Models\Industry_type;
use App\Models\Company_industry_type;
use Livewire\Component;
use Livewire\Attributes\On;

class SearchIndustryTypeList extends BaseTable
{
    public $industry_types = [];

    public $big_categories = [];
    public $medium_categories = [];
    public $small_categories = [];

    public $big_category_code = '';
    public $medium_category_code = '';
    public $small_category_code = '';

    public $disablePrev = false;
    public $disableNext = false;

    public function mount($companyId = false)
    {
        if($companyId) {
            $this->industry_types = Company_industry_type::where('company_id', $companyId)->where('delete_flg', 0)->pluck('industry_type_id')->toArray();
        }
        $this->big_categories = Industry_type::where('delete_flg', 0)
            ->distinct()
            ->pluck('big_category_name', 'big_category_code')
            ->toArray();

        $this->medium_categories = Industry_type::where('delete_flg', 0)
            ->distinct()
            ->pluck('medium_category_name', 'medium_category_code')
            ->toArray();

        $this->small_categories = Industry_type::where('delete_flg', 0)
            ->distinct()
            ->pluck('small_category_name', 'small_category_code')
            ->toArray();
    }

    public function updatedBigCategoryCode($value)
    {
        $this->medium_category_code = null;
        $this->small_category_code = null;

        $this->medium_categories = Industry_type::where('delete_flg', 0)
            ->when(!empty($value), function ($query) use ($value) {
                return $query->where('big_category_code', $value);
            })
            ->distinct()
            ->pluck('medium_category_name', 'medium_category_code')
            ->toArray();

        $this->small_categories = Industry_type::where('delete_flg', 0)
            ->when(!empty($value), function ($query) use ($value) {
                return $query->where('big_category_code', $value);
            })
            ->distinct()
            ->pluck('small_category_name', 'small_category_code')
            ->toArray();
    }

    public function updatedMediumCategoryCode($value)
    {
        $this->small_category_code = null;

        $big_category_code = $this->big_category_code;

        $this->small_categories = Industry_type::where('delete_flg', 0)
            ->when(!empty($big_category_code), function ($query) use ($big_category_code) {
                return $query->where('big_category_code', $big_category_code);
            })
            ->when(!empty($value), function ($query) use ($value) {
                return $query->where('medium_category_code', $value);
            })
            ->distinct()
            ->pluck('small_category_name', 'small_category_code')
            ->toArray();
    }

    public function render()
    {
        $big_category_code = $this->big_category_code;
        $medium_category_code = $this->medium_category_code;
        $small_category_code = $this->small_category_code;

        $condition = Industry_type::where('delete_flg', 0)
            ->when(!empty($big_category_code), function ($query) use ($big_category_code) {
                return $query->where('big_category_code', $big_category_code);
            })
            ->when(!empty($medium_category_code), function ($query) use ($medium_category_code) {
                return $query->where('medium_category_code', $medium_category_code);
            })
            ->when(!empty($small_category_code), function ($query) use ($small_category_code) {
                return $query->where('small_category_code', $small_category_code);
            });
    
        $d = $this->getData($condition);
    
        $items = collect();
        foreach ($d['items'] as $key => $item) {
            $obj = new \stdClass();
            $obj->id = $item->id;
            $obj->industry_type_code = $item->industry_type_code;
            $obj->big_category_code = $item->big_category_code;
            $obj->big_category_name = $item->big_category_name;
            $obj->medium_category_code = $item->medium_category_code;
            $obj->medium_category_name = $item->medium_category_name;
            $obj->small_category_code = $item->small_category_code;
            $obj->small_category_name = $item->small_category_name;
            $obj->tiny_category_code = $item->tiny_category_code;
            $obj->tiny_category_name = $item->tiny_category_name;
            $items->push($obj);
        }
    
        $d['items'] = $items;
        $this->data = $d;
        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.search-industry-type-list', [
            'big_categories' => $this->big_categories,
            'medium_categories' => $this->medium_categories,
            'small_categories' => $this->small_categories
        ]);
    }

    public function addIndustryType($id)
    {
        array_push($this->industry_types,(string)$id);
        $industryType = Industry_type::find($id);

        if ($industryType) {
            $industry_type_code = $industryType->industry_type_code;
            $this->dispatch('addIndustryType', ['industry_type_code' => $industry_type_code]);
        }
    }

    #[On('checkIndustryType')]
    public function checkIndustryType($values = [])
    {
        if (!is_array($values)) {
            $values = [$values];
        }

        $currentIndustryTypes = $this->industry_types;
            foreach ($values as $value) {
            if (!in_array($value, $currentIndustryTypes)) {
                $currentIndustryTypes[] = $value;
            }
        }
        $currentIndustryTypes = array_filter($currentIndustryTypes, function($value) use ($values) {
            return in_array($value, $values);
        });
    
        $this->industry_types = array_values($currentIndustryTypes);

        if(!empty($values)) {
            $this->dispatch('checkedIndustryType', $this->industry_types);
        } else {
            $this->dispatch('clearIndustryType');
        }
    }
}
