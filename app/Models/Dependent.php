<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $table = 'm_dependent';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'last_name',
        'last_name_kana',
        'first_name',
        'first_name_kana',
        'sex',
        'relationship_spouse',
        'relationship_dependent',
        'spouse_flag',
        'birthday',
        'age',
        'contact',
        'occupation',
        'annual_income',
        'date_of_authorisation',
        'date_of_expiry',
        'mynumber_card_no',
        'pension_no',
        'dependent_type',
        'history_flg',
        'delete_flg',
        'insurer_no',
        'remarks',
        'living_type',
        'post_code',
        'address_prefecture',
        'address_city',
        'address_ward',
        'address_apartment',
        'insurance_office_no',
    ];

    protected $casts = [
        'mynumber_card_no' => 'encrypted',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function values_dependent_relationship()
    {
        return $this->belongsTo(Values_dependent_relationship::class,'relationship','id');
    }

    public function values_dependent_relationship_sex()
    {
        return $this->belongsTo(Values_dependent_relationship_sex::class,'relationship_sex','id');
    }

    public function values_dependent_cared_family_member_relationship()
    {
        return $this->belongsTo(Values_dependent_cared_family_member_relationship::class,'cared_family_member_relationship','id');
    }

    public function values_dependent_living_type()
    {
        return $this->belongsTo(Values_dependent_living_type::class,'living_type','id');
    }

    public function values_dependent_tel_type()
    {
        return $this->belongsTo(Values_dependent_tel_type::class,'tel_type','id');
    }

    public function values_dependent_dependent_reason_type()
    {
        return $this->belongsTo(Values_dependent_dependent_reason_type::class,'dependent_reason_type','id');
    }

    public function values_dependent_dependent_remove_reason_type()
    {
        return $this->belongsTo(Values_dependent_dependent_remove_reason_type::class,'dependent_remove_reason_type','id');
    }

    public function values_dependent_category3_insured_occupation_type()
    {
        return $this->belongsTo(Values_dependent_category3_insured_occupation_type::class,'category3_insured_occupation_type','id');
    }

    public function values_dependent_dependent_occupation_type()
    {
        return $this->belongsTo(Values_dependent_dependent_occupation_type::class,'dependent_occupation_type','id');
    }

    public function values_dependent_applicable_reason_type()
    {
        return $this->belongsTo(Values_dependent_applicable_reason_type::class,'special_requirements_applicable_reason_type','id');
    }

    public function values_dependent_non_applicable_reason_type()
    {
        return $this->belongsTo(Values_dependent_non_applicable_reason_type::class,'special_requirements_non_applicable_reason_type','id');
    }

    public function values_sex()
    {
        return $this->belongsTo(Values_sex::class,'sex','id');
    }

    public function pickup()
    {
        return $this->hasMany(Pickup::class);
    }
}
