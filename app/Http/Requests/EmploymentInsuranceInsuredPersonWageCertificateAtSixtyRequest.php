<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuranceInsuredPersonWageCertificateAtSixtyRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            "employmentInsuredNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuredNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuredNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "employmentInsuranceOfficeNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuranceOfficeNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuranceOfficeNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "employeeFullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "employeeFullnameKana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "branchName" =>  ['nullable', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
            "branchAddress" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "branchTelAreaCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "branchTelCityCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "branchTelSubscriberCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "postCodeFormer" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "postCodeLatter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "address" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "telAreaCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "telCityCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "telSubscriberCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "dateOfAttainmentage60JapanEra" => 'nullable|string|max:2',
            "dateOfAttainmentage60JapanEraYear" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:dateOfAttainmentage60Month,dateOfAttainmentage60Day',
            "dateOfAttainmentage60Month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:dateOfAttainmentage60JapanEraYear,dateOfAttainmentage60Day',
            "dateOfAttainmentage60Day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:dateOfAttainmentage60Month,dateOfAttainmentage60JapanEraYear',
            "birthdayEra" => 'nullable',
            "birthdayYear" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:birthdayMonth,birthdayDay',
            "birthdayMonth" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:birthdayYear,birthdayDay',
            "birthdayDay" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:birthdayYear,birthdayMonth',
            "headquartersAddress" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "company_managerial_employer_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "dayAfter60Month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:dayAfter60Day',
            "dayAfter60Day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:dayAfter60Month',
            "applicablePeriodStartMonth1_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_1',
            "applicablePeriodStartMonth1_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_2',
            "applicablePeriodStartMonth1_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_3',
            "applicablePeriodStartMonth1_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_4',
            "applicablePeriodStartMonth1_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_5',
            "applicablePeriodStartMonth1_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_6',
            "applicablePeriodStartMonth1_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_7',
            "applicablePeriodStartMonth1_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_8',
            "applicablePeriodStartMonth1_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_9',
            "applicablePeriodStartMonth1_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_10',
            "applicablePeriodStartMonth1_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_11',
            "applicablePeriodStartMonth1_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_12',
            "applicablePeriodStartMonth1_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay1_13',
            "applicablePeriodStartDay1_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_1',
            "applicablePeriodStartDay1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_2',
            "applicablePeriodStartDay1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_3',
            "applicablePeriodStartDay1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_4',
            "applicablePeriodStartDay1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_5',
            "applicablePeriodStartDay1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_6',
            "applicablePeriodStartDay1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_7',
            "applicablePeriodStartDay1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_8',
            "applicablePeriodStartDay1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_9',
            "applicablePeriodStartDay1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_10',
            "applicablePeriodStartDay1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_11',
            "applicablePeriodStartDay1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_12',
            "applicablePeriodStartDay1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth1_13',
            "applicablePeriodEndMonth1_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_2',
            "applicablePeriodEndMonth1_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_3',
            "applicablePeriodEndMonth1_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_4',
            "applicablePeriodEndMonth1_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_5',
            "applicablePeriodEndMonth1_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_6',
            "applicablePeriodEndMonth1_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_7',
            "applicablePeriodEndMonth1_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_8',
            "applicablePeriodEndMonth1_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_9',
            "applicablePeriodEndMonth1_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_10',
            "applicablePeriodEndMonth1_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_11',
            "applicablePeriodEndMonth1_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_12',
            "applicablePeriodEndMonth1_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay1_13',
            "applicablePeriodEndDay1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_2',
            "applicablePeriodEndDay1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_3',
            "applicablePeriodEndDay1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_4',
            "applicablePeriodEndDay1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_5',
            "applicablePeriodEndDay1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_6',
            "applicablePeriodEndDay1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_7',
            "applicablePeriodEndDay1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_8',
            "applicablePeriodEndDay1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_9',
            "applicablePeriodEndDay1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_10',
            "applicablePeriodEndDay1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_11',
            "applicablePeriodEndDay1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_12',
            "applicablePeriodEndDay1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth1_13',
            "basicDays1_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodStartMonth1_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_1',
            "paymentPeriodStartMonth1_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_2',
            "paymentPeriodStartMonth1_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_3',
            "paymentPeriodStartMonth1_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_4',
            "paymentPeriodStartMonth1_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_5',
            "paymentPeriodStartMonth1_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_6',
            "paymentPeriodStartMonth1_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_7',
            "paymentPeriodStartMonth1_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_8',
            "paymentPeriodStartMonth1_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_9',
            "paymentPeriodStartMonth1_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_10',
            "paymentPeriodStartMonth1_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_11',
            "paymentPeriodStartMonth1_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_12',
            "paymentPeriodStartMonth1_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay1_13',
            "paymentPeriodStartDay1_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_1',
            "paymentPeriodStartDay1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_2',
            "paymentPeriodStartDay1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_3',
            "paymentPeriodStartDay1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_4',
            "paymentPeriodStartDay1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_5',
            "paymentPeriodStartDay1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_6',
            "paymentPeriodStartDay1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_7',
            "paymentPeriodStartDay1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_8',
            "paymentPeriodStartDay1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_9',
            "paymentPeriodStartDay1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_10',
            "paymentPeriodStartDay1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_11',
            "paymentPeriodStartDay1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_12',
            "paymentPeriodStartDay1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth1_13',
            "paymentPeriodEndMonth1_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_2',
            "paymentPeriodEndMonth1_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_3',
            "paymentPeriodEndMonth1_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_4',
            "paymentPeriodEndMonth1_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_5',
            "paymentPeriodEndMonth1_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_6',
            "paymentPeriodEndMonth1_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_7',
            "paymentPeriodEndMonth1_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_8',
            "paymentPeriodEndMonth1_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_9',
            "paymentPeriodEndMonth1_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_10',
            "paymentPeriodEndMonth1_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_11',
            "paymentPeriodEndMonth1_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_12',
            "paymentPeriodEndMonth1_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay1_13',
            "paymentPeriodEndDay1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_2',
            "paymentPeriodEndDay1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_3',
            "paymentPeriodEndDay1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_4',
            "paymentPeriodEndDay1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_5',
            "paymentPeriodEndDay1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_6',
            "paymentPeriodEndDay1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_7',
            "paymentPeriodEndDay1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_8',
            "paymentPeriodEndDay1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_9',
            "paymentPeriodEndDay1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_10',
            "paymentPeriodEndDay1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_11',
            "paymentPeriodEndDay1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_12',
            "paymentPeriodEndDay1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth1_13',
            "basicDays1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays1_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "wageAmountA1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_1" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_2" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_3" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_4" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_5" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_6" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_7" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_8" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_9" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_10" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_11" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA1_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB1_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages1_12" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "WageNote1_1" => 'nullable|string|max:255',
            "WageNote1_2" => 'nullable|string|max:255',
            "WageNote1_3" => 'nullable|string|max:255',
            "WageNote1_4" => 'nullable|string|max:255',
            "WageNote1_5" => 'nullable|string|max:255',
            "WageNote1_6" => 'nullable|string|max:255',
            "WageNote1_7" => 'nullable|string|max:255',
            "WageNote1_8" => 'nullable|string|max:255',
            "WageNote1_9" => 'nullable|string|max:255',
            "WageNote1_10" => 'nullable|string|max:255',
            "WageNote1_11" => 'nullable|string|max:255',
            "WageNote1_12" => 'nullable|string|max:255',
            "WageNote1_13" => 'nullable|string|max:255',
            "specialNoteOnWages1_1" => 'nullable|string|max:255',
            "laborConsultantJapanEra" => 'nullable|string|max:2',
            "laborConsultantJapanEraYear" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "laborConsultantMonth" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "laborConsultantDay" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "laborConsultantActingAsAgent" => 'nullable|string|max:255',
            "laborConsultantName" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "laborConsultantTelAreaCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelSubscriberCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelCityCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "OtherNotes" => 'nullable|string|max:255',
            "applicablePeriodStartMonth2_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_2',
            "applicablePeriodStartMonth2_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_3',
            "applicablePeriodStartMonth2_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_4',
            "applicablePeriodStartMonth2_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_5',
            "applicablePeriodStartMonth2_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_6',
            "applicablePeriodStartMonth2_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_7',
            "applicablePeriodStartMonth2_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_8',
            "applicablePeriodStartMonth2_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_9',
            "applicablePeriodStartMonth2_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_10',
            "applicablePeriodStartMonth2_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_11',
            "applicablePeriodStartMonth2_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_12',
            "applicablePeriodStartMonth2_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartDay2_13',
            "applicablePeriodStartDay2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_2',
            "applicablePeriodStartDay2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_3',
            "applicablePeriodStartDay2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_4',
            "applicablePeriodStartDay2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_5',
            "applicablePeriodStartDay2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_6',
            "applicablePeriodStartDay2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_7',
            "applicablePeriodStartDay2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_8',
            "applicablePeriodStartDay2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_9',
            "applicablePeriodStartDay2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_10',
            "applicablePeriodStartDay2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_11',
            "applicablePeriodStartDay2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_12',
            "applicablePeriodStartDay2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodStartMonth2_13',
            "applicablePeriodEndMonth2_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_2',
            "applicablePeriodEndMonth2_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_3',
            "applicablePeriodEndMonth2_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_4',
            "applicablePeriodEndMonth2_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_5',
            "applicablePeriodEndMonth2_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_6',
            "applicablePeriodEndMonth2_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_7',
            "applicablePeriodEndMonth2_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_8',
            "applicablePeriodEndMonth2_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_9',
            "applicablePeriodEndMonth2_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_10',
            "applicablePeriodEndMonth2_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_11',
            "applicablePeriodEndMonth2_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_12',
            "applicablePeriodEndMonth2_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndDay2_13',
            "applicablePeriodEndDay2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_2',
            "applicablePeriodEndDay2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_3',
            "applicablePeriodEndDay2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_4',
            "applicablePeriodEndDay2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_5',
            "applicablePeriodEndDay2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_6',
            "applicablePeriodEndDay2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_7',
            "applicablePeriodEndDay2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_8',
            "applicablePeriodEndDay2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_9',
            "applicablePeriodEndDay2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_10',
            "applicablePeriodEndDay2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_11',
            "applicablePeriodEndDay2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_12',
            "applicablePeriodEndDay2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicablePeriodEndMonth2_13',
            "basicDays2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "basicDays2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodStartMonth2_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_2',
            "paymentPeriodStartMonth2_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_3',
            "paymentPeriodStartMonth2_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_4',
            "paymentPeriodStartMonth2_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_5',
            "paymentPeriodStartMonth2_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_6',
            "paymentPeriodStartMonth2_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_7',
            "paymentPeriodStartMonth2_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_8',
            "paymentPeriodStartMonth2_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_9',
            "paymentPeriodStartMonth2_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_10',
            "paymentPeriodStartMonth2_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_11',
            "paymentPeriodStartMonth2_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_12',
            "paymentPeriodStartMonth2_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartDay2_13',
            "paymentPeriodStartDay2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_2',
            "paymentPeriodStartDay2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_3',
            "paymentPeriodStartDay2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_4',
            "paymentPeriodStartDay2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_5',
            "paymentPeriodStartDay2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_6',
            "paymentPeriodStartDay2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_7',
            "paymentPeriodStartDay2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_8',
            "paymentPeriodStartDay2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_9',
            "paymentPeriodStartDay2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_10',
            "paymentPeriodStartDay2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_11',
            "paymentPeriodStartDay2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_12',
            "paymentPeriodStartDay2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodStartMonth2_13',
            "paymentPeriodEndMonth2_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_2',
            "paymentPeriodEndMonth2_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_3',
            "paymentPeriodEndMonth2_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_4',
            "paymentPeriodEndMonth2_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_5',
            "paymentPeriodEndMonth2_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_6',
            "paymentPeriodEndMonth2_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_7',
            "paymentPeriodEndMonth2_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_8',
            "paymentPeriodEndMonth2_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_9',
            "paymentPeriodEndMonth2_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_10',
            "paymentPeriodEndMonth2_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_11',
            "paymentPeriodEndMonth2_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_12',
            "paymentPeriodEndMonth2_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndDay2_13',
            "paymentPeriodEndDay2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_2',
            "paymentPeriodEndDay2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_3',
            "paymentPeriodEndDay2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_4',
            "paymentPeriodEndDay2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_5',
            "paymentPeriodEndDay2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_6',
            "paymentPeriodEndDay2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_7',
            "paymentPeriodEndDay2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_8',
            "paymentPeriodEndDay2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_9',
            "paymentPeriodEndDay2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_10',
            "paymentPeriodEndDay2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_11',
            "paymentPeriodEndDay2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_12',
            "paymentPeriodEndDay2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:paymentPeriodEndMonth2_13',
            "paymentPeriodBasicDays2_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "paymentPeriodBasicDays2_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "wageAmountA2_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_1" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_2" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_3" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_4" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_5" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_6" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_7" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_8" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_9" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_10" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_11" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "wageAmountA2_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageAmountB2_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "totalWages2_12" => 'nullable|int|between:1,99999999|regex:/^[0-9]{1,8}$/u',
            "WageNote2_1" => 'nullable|string|max:255',
            "WageNote2_2" => 'nullable|string|max:255',
            "WageNote2_3" => 'nullable|string|max:255',
            "WageNote2_4" => 'nullable|string|max:255',
            "WageNote2_5" => 'nullable|string|max:255',
            "WageNote2_6" => 'nullable|string|max:255',
            "WageNote2_7" => 'nullable|string|max:255',
            "WageNote2_8" => 'nullable|string|max:255',
            "WageNote2_9" => 'nullable|string|max:255',
            "WageNote2_10" => 'nullable|string|max:255',
            "WageNote2_11" => 'nullable|string|max:255',
            "WageNote2_12" => 'nullable|string|max:255',
            "specialNoteOnWages2_1" => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $dateOfAttainmentage60JapanEra = $data['dateOfAttainmentage60JapanEra'] ?? "";
            $dateOfAttainmentage60JapanEraYear = $data['dateOfAttainmentage60JapanEraYear'] ?? "";
            $dateOfAttainmentage60Month = $data['dateOfAttainmentage60Month'] ?? "";
            $dateOfAttainmentage60Day = $data['dateOfAttainmentage60Day'] ?? "";
            $birthdayEra = $data['birthdayEra'] ?? "";
            $birthdayYear = $data['birthdayYear'] ?? "";
            $birthdayMonth = $data['birthdayMonth'] ?? "";
            $birthdayDay = $data['birthdayDay'] ?? "";

            if (!empty($dateOfAttainmentage60Month) && !empty($dateOfAttainmentage60Day)) {
                if (ctype_digit($dateOfAttainmentage60Month)) {
                    if (!checkdate($dateOfAttainmentage60Month, $dateOfAttainmentage60Day, '2000')) {
                        $validator->errors()->add('dateOfAttainmentage60Month', '2枚目_6_60歳に達した日の年の年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($dateOfAttainmentage60JapanEra === '平成') {
                if (
                    ($dateOfAttainmentage60JapanEraYear == 1 && ($dateOfAttainmentage60Month < 1 || ($dateOfAttainmentage60Month == 1 && $dateOfAttainmentage60Day < 8))) ||
                    ($dateOfAttainmentage60JapanEraYear == 31 && ($dateOfAttainmentage60Month > 4 || ($dateOfAttainmentage60Month == 4 && $dateOfAttainmentage60Day > 30))) ||
                    ($dateOfAttainmentage60JapanEraYear > 31)
                ) {
                    $validator->errors()->add('dateOfAttainmentage60Day', '2枚目_6_60歳に達した日の年の年月日は正しい日付を入力してください。');
                }
            } elseif ($dateOfAttainmentage60JapanEra === '令和') {
                if ($dateOfAttainmentage60JapanEraYear == 1 && ($dateOfAttainmentage60Month < 5 || ($dateOfAttainmentage60Month == 5 && $dateOfAttainmentage60Day < 1))) {
                    $validator->errors()->add('dateOfAttainmentage60Day', '2枚目_6_60歳に達した日の年の年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($birthdayMonth) && !empty($birthdayDay)) {
                if (ctype_digit($birthdayMonth)) {
                    if (!checkdate($birthdayMonth, $birthdayDay, '2000')) {
                        $validator->errors()->add('birthdayDay', '2枚目_7_60歳に達した者の生年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($birthdayEra === '昭和') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 12 || ($birthdayMonth == 12 && $birthdayDay < 25))) ||
                    ($birthdayYear == 64 && ($birthdayMonth > 1 || ($birthdayMonth == 1 && $birthdayDay > 7))) ||
                    ($birthdayYear > 64)
                ) {
                    $validator->errors()->add('birthdayDay', '2枚目_7_60歳に達した者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '平成') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 1 || ($birthdayMonth == 1 && $birthdayDay < 8))) ||
                    ($birthdayYear == 31 && ($birthdayMonth > 4 || ($birthdayMonth == 4 && $birthdayDay > 30))) ||
                    ($birthdayYear > 31)
                ) {
                    $validator->errors()->add('birthdayDay', '2枚目_7_60歳に達した者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '令和') {
                if ($birthdayYear == 1 && ($birthdayMonth < 5 || ($birthdayMonth == 5 && $birthdayDay < 1))) {
                    $validator->errors()->add('birthdayDay', '2枚目_7_60歳に達した者の生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($data['dayAfter60Month']) && !empty($data['dayAfter60Day'])) {
                if (ctype_digit($data['dayAfter60Month'])) {
                    if (!checkdate($data['dayAfter60Month'], $data['dayAfter60Day'], '2000')) {
                        $validator->errors()->add('dayAfter60Month', '2枚目_8_60歳に達した日等の翌日は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_1']) && !empty($data['applicablePeriodStartDay1_1'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_1'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_1'], $data['applicablePeriodStartDay1_1'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_1', '2枚目_8_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_2']) && !empty($data['applicablePeriodStartDay1_2'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_2'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_2'], $data['applicablePeriodStartDay1_2'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_2', '2枚目_8_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_3']) && !empty($data['applicablePeriodStartDay1_3'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_3'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_3'], $data['applicablePeriodStartDay1_3'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_3', '2枚目_8_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_4']) && !empty($data['applicablePeriodStartDay1_4'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_4'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_4'], $data['applicablePeriodStartDay1_4'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_4', '2枚目_8_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_5']) && !empty($data['applicablePeriodStartDay1_5'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_5'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_5'], $data['applicablePeriodStartDay1_5'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_5', '2枚目_8_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_6']) && !empty($data['applicablePeriodStartDay1_6'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_6'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_6'], $data['applicablePeriodStartDay1_6'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_6', '2枚目_8_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_7']) && !empty($data['applicablePeriodStartDay1_7'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_7'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_7'], $data['applicablePeriodStartDay1_7'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_7', '2枚目_8_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_8']) && !empty($data['applicablePeriodStartDay1_8'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_8'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_8'], $data['applicablePeriodStartDay1_8'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_8', '2枚目_8_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_9']) && !empty($data['applicablePeriodStartDay1_9'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_9'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_9'], $data['applicablePeriodStartDay1_9'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_9', '2枚目_8_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_10']) && !empty($data['applicablePeriodStartDay1_10'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_10'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_10'], $data['applicablePeriodStartDay1_10'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_10', '2枚目_8_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_11']) && !empty($data['applicablePeriodStartDay1_11'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_11'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_11'], $data['applicablePeriodStartDay1_11'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_11', '2枚目_8_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_12']) && !empty($data['applicablePeriodStartDay1_12'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_12'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_12'], $data['applicablePeriodStartDay1_12'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_12', '2枚目_8_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth1_13']) && !empty($data['applicablePeriodStartDay1_13'])) {
                if (ctype_digit($data['applicablePeriodStartMonth1_13'])) {
                    if (!checkdate($data['applicablePeriodStartMonth1_13'], $data['applicablePeriodStartDay1_13'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay1_13', '2枚目_8_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_2']) && !empty($data['applicablePeriodEndDay1_2'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_2'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_2'], $data['applicablePeriodEndDay1_2'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_2', '2枚目_8_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_3']) && !empty($data['applicablePeriodEndDay1_3'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_3'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_3'], $data['applicablePeriodEndDay1_3'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_3', '2枚目_8_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_4']) && !empty($data['applicablePeriodEndDay1_4'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_4'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_4'], $data['applicablePeriodEndDay1_4'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_4', '2枚目_8_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_5']) && !empty($data['applicablePeriodEndDay1_5'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_5'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_5'], $data['applicablePeriodEndDay1_5'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_5', '2枚目_8_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_6']) && !empty($data['applicablePeriodEndDay1_6'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_6'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_6'], $data['applicablePeriodEndDay1_6'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_6', '2枚目_8_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_7']) && !empty($data['applicablePeriodEndDay1_7'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_7'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_7'], $data['applicablePeriodEndDay1_7'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_7', '2枚目_8_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_8']) && !empty($data['applicablePeriodEndDay1_8'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_8'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_8'], $data['applicablePeriodEndDay1_8'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_8', '2枚目_8_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_9']) && !empty($data['applicablePeriodEndDay1_9'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_9'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_9'], $data['applicablePeriodEndDay1_9'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_9', '2枚目_8_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_10']) && !empty($data['applicablePeriodEndDay1_10'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_10'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_10'], $data['applicablePeriodEndDay1_10'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_10', '2枚目_8_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_11']) && !empty($data['applicablePeriodEndDay1_11'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_11'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_11'], $data['applicablePeriodEndDay1_11'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_11', '2枚目_8_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_12']) && !empty($data['applicablePeriodEndDay1_12'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_12'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_12'], $data['applicablePeriodEndDay1_12'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_12', '2枚目_8_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth1_13']) && !empty($data['applicablePeriodEndDay1_13'])) {
                if (ctype_digit($data['applicablePeriodEndMonth1_13'])) {
                    if (!checkdate($data['applicablePeriodEndMonth1_13'], $data['applicablePeriodEndDay1_13'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay1_13', '2枚目_8_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_1']) && !empty($data['paymentPeriodStartDay1_1'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_1'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_1'], $data['paymentPeriodStartDay1_1'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_1', '2枚目_10_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_2']) && !empty($data['paymentPeriodStartDay1_2'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_2'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_2'], $data['paymentPeriodStartDay1_2'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_2', '2枚目_10_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_3']) && !empty($data['paymentPeriodStartDay1_3'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_3'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_3'], $data['paymentPeriodStartDay1_3'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_3', '2枚目_10_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_4']) && !empty($data['paymentPeriodStartDay1_4'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_4'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_4'], $data['paymentPeriodStartDay1_4'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_4', '2枚目_10_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_5']) && !empty($data['paymentPeriodStartDay1_5'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_5'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_5'], $data['paymentPeriodStartDay1_5'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_5', '2枚目_10_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_6']) && !empty($data['paymentPeriodStartDay1_6'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_6'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_6'], $data['paymentPeriodStartDay1_6'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_6', '2枚目_10_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_7']) && !empty($data['paymentPeriodStartDay1_7'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_7'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_7'], $data['paymentPeriodStartDay1_7'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_7', '2枚目_10_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_8']) && !empty($data['paymentPeriodStartDay1_8'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_8'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_8'], $data['paymentPeriodStartDay1_8'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_8', '2枚目_10_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_9']) && !empty($data['paymentPeriodStartDay1_9'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_9'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_9'], $data['paymentPeriodStartDay1_9'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_9', '2枚目_10_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_10']) && !empty($data['paymentPeriodStartDay1_10'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_10'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_10'], $data['paymentPeriodStartDay1_10'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_10', '2枚目_10_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_11']) && !empty($data['paymentPeriodStartDay1_11'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_11'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_11'], $data['paymentPeriodStartDay1_11'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_11', '2枚目_10_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_12']) && !empty($data['paymentPeriodStartDay1_12'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_12'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_12'], $data['paymentPeriodStartDay1_12'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_12', '2枚目_10_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth1_13']) && !empty($data['paymentPeriodStartDay1_13'])) {
                if (ctype_digit($data['paymentPeriodStartMonth1_13'])) {
                    if (!checkdate($data['paymentPeriodStartMonth1_13'], $data['paymentPeriodStartDay1_13'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay1_13', '2枚目_10_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_2']) && !empty($data['paymentPeriodEndDay1_2'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_2'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_2'], $data['paymentPeriodEndDay1_2'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_2', '2枚目_10_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_3']) && !empty($data['paymentPeriodEndDay1_3'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_3'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_3'], $data['paymentPeriodEndDay1_3'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_3', '2枚目_10_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_4']) && !empty($data['paymentPeriodEndDay1_4'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_4'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_4'], $data['paymentPeriodEndDay1_4'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_4', '2枚目_10_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_5']) && !empty($data['paymentPeriodEndDay1_5'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_5'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_5'], $data['paymentPeriodEndDay1_5'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_5', '2枚目_10_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_6']) && !empty($data['paymentPeriodEndDay1_6'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_6'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_6'], $data['paymentPeriodEndDay1_6'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_6', '2枚目_10_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_7']) && !empty($data['paymentPeriodEndDay1_7'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_7'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_7'], $data['paymentPeriodEndDay1_7'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_7', '2枚目_10_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_8']) && !empty($data['paymentPeriodEndDay1_8'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_8'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_8'], $data['paymentPeriodEndDay1_8'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_8', '2枚目_10_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_9']) && !empty($data['paymentPeriodEndDay1_9'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_9'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_9'], $data['paymentPeriodEndDay1_9'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_9', '2枚目_10_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_10']) && !empty($data['paymentPeriodEndDay1_10'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_10'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_10'], $data['paymentPeriodEndDay1_10'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_10', '2枚目_10_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_11']) && !empty($data['paymentPeriodEndDay1_11'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_11'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_11'], $data['paymentPeriodEndDay1_11'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_11', '2枚目_10_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_12']) && !empty($data['paymentPeriodEndDay1_12'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_12'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_12'], $data['paymentPeriodEndDay1_12'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_12', '2枚目_10_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth1_13']) && !empty($data['paymentPeriodEndDay1_13'])) {
                if (ctype_digit($data['paymentPeriodEndMonth1_13'])) {
                    if (!checkdate($data['paymentPeriodEndMonth1_13'], $data['paymentPeriodEndDay1_13'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay1_13', '2枚目_10_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_2']) && !empty($data['applicablePeriodStartDay2_2'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_2'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_2'], $data['applicablePeriodStartDay2_2'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_2', '2枚目_続紙_8_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_3']) && !empty($data['applicablePeriodStartDay2_3'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_3'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_3'], $data['applicablePeriodStartDay2_3'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_3', '2枚目_続紙_8_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_4']) && !empty($data['applicablePeriodStartDay2_4'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_4'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_4'], $data['applicablePeriodStartDay2_4'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_4', '2枚目_続紙_8_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_5']) && !empty($data['applicablePeriodStartDay2_5'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_5'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_5'], $data['applicablePeriodStartDay2_5'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_5', '2枚目_続紙_8_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_6']) && !empty($data['applicablePeriodStartDay2_6'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_6'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_6'], $data['applicablePeriodStartDay2_6'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_6', '2枚目_続紙_8_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_7']) && !empty($data['applicablePeriodStartDay2_7'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_7'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_7'], $data['applicablePeriodStartDay2_7'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_7', '2枚目_続紙_8_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_8']) && !empty($data['applicablePeriodStartDay2_8'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_8'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_8'], $data['applicablePeriodStartDay2_8'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_8', '2枚目_続紙_8_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_9']) && !empty($data['applicablePeriodStartDay2_9'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_9'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_9'], $data['applicablePeriodStartDay2_9'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_9', '2枚目_続紙_8_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_10']) && !empty($data['applicablePeriodStartDay2_10'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_10'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_10'], $data['applicablePeriodStartDay2_10'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_10', '2枚目_続紙_8_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_11']) && !empty($data['applicablePeriodStartDay2_11'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_11'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_11'], $data['applicablePeriodStartDay2_11'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_11', '2枚目_続紙_8_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_12']) && !empty($data['applicablePeriodStartDay2_12'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_12'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_12'], $data['applicablePeriodStartDay2_12'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_12', '2枚目_続紙_8_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodStartMonth2_13']) && !empty($data['applicablePeriodStartDay2_13'])) {
                if (ctype_digit($data['applicablePeriodStartMonth2_13'])) {
                    if (!checkdate($data['applicablePeriodStartMonth2_13'], $data['applicablePeriodStartDay2_13'], '2000')) {
                        $validator->errors()->add('applicablePeriodStartDay2_13', '2枚目_続紙_8_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_2']) && !empty($data['applicablePeriodEndDay2_2'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_2'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_2'], $data['applicablePeriodEndDay2_2'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_2', '2枚目_続紙_8_算定対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_3']) && !empty($data['applicablePeriodEndDay2_3'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_3'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_3'], $data['applicablePeriodEndDay2_3'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_3', '2枚目_続紙_8_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_4']) && !empty($data['applicablePeriodEndDay2_4'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_4'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_4'], $data['applicablePeriodEndDay2_4'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_4', '2枚目_続紙_8_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_5']) && !empty($data['applicablePeriodEndDay2_5'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_5'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_5'], $data['applicablePeriodEndDay2_5'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_5', '2枚目_続紙_8_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_6']) && !empty($data['applicablePeriodEndDay2_6'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_6'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_6'], $data['applicablePeriodEndDay2_6'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_6', '2枚目_続紙_8_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_7']) && !empty($data['applicablePeriodEndDay2_7'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_7'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_7'], $data['applicablePeriodEndDay2_7'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_7', '2枚目_続紙_8_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_8']) && !empty($data['applicablePeriodEndDay2_8'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_8'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_8'], $data['applicablePeriodEndDay2_8'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_8', '2枚目_続紙_8_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_9']) && !empty($data['applicablePeriodEndDay2_9'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_9'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_9'], $data['applicablePeriodEndDay2_9'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_9', '2枚目_続紙_8_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_10']) && !empty($data['applicablePeriodEndDay2_10'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_10'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_10'], $data['applicablePeriodEndDay2_10'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_10', '2枚目_続紙_8_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_11']) && !empty($data['applicablePeriodEndDay2_11'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_11'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_11'], $data['applicablePeriodEndDay2_11'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_11', '2枚目_続紙_8_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_12']) && !empty($data['applicablePeriodEndDay2_12'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_12'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_12'], $data['applicablePeriodEndDay2_12'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_12', '2枚目_続紙_8_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['applicablePeriodEndMonth2_13']) && !empty($data['applicablePeriodEndDay2_13'])) {
                if (ctype_digit($data['applicablePeriodEndMonth2_13'])) {
                    if (!checkdate($data['applicablePeriodEndMonth2_13'], $data['applicablePeriodEndDay2_13'], '2000')) {
                        $validator->errors()->add('applicablePeriodEndDay2_13', '2枚目_続紙_8_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_2']) && !empty($data['paymentPeriodStartDay2_2'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_2'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_2'], $data['paymentPeriodStartDay2_2'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_2', '2枚目_続紙_10_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_3']) && !empty($data['paymentPeriodStartDay2_3'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_3'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_3'], $data['paymentPeriodStartDay2_3'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_3', '2枚目_続紙_10_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_4']) && !empty($data['paymentPeriodStartDay2_4'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_4'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_4'], $data['paymentPeriodStartDay2_4'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_4', '2枚目_続紙_10_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_5']) && !empty($data['paymentPeriodStartDay2_5'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_5'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_5'], $data['paymentPeriodStartDay2_5'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_5', '2枚目_続紙_10_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_6']) && !empty($data['paymentPeriodStartDay2_6'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_6'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_6'], $data['paymentPeriodStartDay2_6'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_6', '2枚目_続紙_10_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_7']) && !empty($data['paymentPeriodStartDay2_7'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_7'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_7'], $data['paymentPeriodStartDay2_7'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_7', '2枚目_続紙_10_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_8']) && !empty($data['paymentPeriodStartDay2_8'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_8'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_8'], $data['paymentPeriodStartDay2_8'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_8', '2枚目_続紙_10_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_9']) && !empty($data['paymentPeriodStartDay2_9'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_9'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_9'], $data['paymentPeriodStartDay2_9'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_9', '2枚目_続紙_10_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_10']) && !empty($data['paymentPeriodStartDay2_10'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_10'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_10'], $data['paymentPeriodStartDay2_10'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_10', '2枚目_続紙_10_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_11']) && !empty($data['paymentPeriodStartDay2_11'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_11'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_11'], $data['paymentPeriodStartDay2_11'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_11', '2枚目_続紙_10_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_12']) && !empty($data['paymentPeriodStartMonth2_12'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_12'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_12'], $data['paymentPeriodStartMonth2_12'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_12', '2枚目_続紙_10_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodStartMonth2_13']) && !empty($data['paymentPeriodStartDay2_13'])) {
                if (ctype_digit($data['paymentPeriodStartMonth2_13'])) {
                    if (!checkdate($data['paymentPeriodStartMonth2_13'], $data['paymentPeriodStartDay2_13'], '2000')) {
                        $validator->errors()->add('paymentPeriodStartDay2_13', '2枚目_続紙_10_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_2']) && !empty($data['paymentPeriodEndDay2_2'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_2'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_2'], $data['paymentPeriodEndDay2_2'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_2', '2枚目_続紙_10_賃金支払対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_3']) && !empty($data['paymentPeriodEndDay2_3'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_3'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_3'], $data['paymentPeriodEndDay2_3'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_3', '2枚目_続紙_10_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_4']) && !empty($data['paymentPeriodEndDay2_4'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_4'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_4'], $data['paymentPeriodEndDay2_4'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_4', '2枚目_続紙_10_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_5']) && !empty($data['paymentPeriodEndDay2_5'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_5'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_5'], $data['paymentPeriodEndDay2_5'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_5', '2枚目_続紙_10_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_6']) && !empty($data['paymentPeriodEndDay2_6'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_6'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_6'], $data['paymentPeriodEndDay2_6'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_6', '2枚目_続紙_10_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_7']) && !empty($data['paymentPeriodEndDay2_7'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_7'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_7'], $data['paymentPeriodEndDay2_7'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_7', '2枚目_続紙_10_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_8']) && !empty($data['paymentPeriodEndDay2_8'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_8'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_8'], $data['paymentPeriodEndDay2_8'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_8', '2枚目_続紙_10_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_9']) && !empty($data['paymentPeriodEndDay2_9'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_9'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_9'], $data['paymentPeriodEndDay2_9'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_9', '2枚目_続紙_10_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_10']) && !empty($data['paymentPeriodEndDay2_10'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_10'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_10'], $data['paymentPeriodEndDay2_10'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_10', '2枚目_続紙_10_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_11']) && !empty($data['paymentPeriodEndDay2_11'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_11'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_11'], $data['paymentPeriodEndDay2_11'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_11', '2枚目_続紙_10_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_12']) && !empty($data['paymentPeriodEndMonth2_12'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_12'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_12'], $data['paymentPeriodEndMonth2_12'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_12', '2枚目_続紙_10_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['paymentPeriodEndMonth2_13']) && !empty($data['paymentPeriodEndDay2_13'])) {
                if (ctype_digit($data['paymentPeriodEndMonth2_13'])) {
                    if (!checkdate($data['paymentPeriodEndMonth2_13'], $data['paymentPeriodEndDay2_13'], '2000')) {
                        $validator->errors()->add('paymentPeriodEndDay2_13', '2枚目_続紙_10_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        });
    }

    public function messages()
    {
        return [
            'dateOfAttainmentage60JapanEraYear.required_with' => '2枚目_6_60歳に達した日の年の年月日_年を入力してください。',
            'dateOfAttainmentage60Month.required_with' => '2枚目_6_60歳に達した日の年の年月日_月を入力してください。',
            'dateOfAttainmentage60Day.required_with' => '2枚目_6_60歳に達した日の年の年月日_日を入力してください。',
            'birthdayYear.required_with' => '2枚目_7_60歳に達した者の生年月日_年を入力してください。',
            'birthdayMonth.required_with' => '2枚目_7_60歳に達した者の生年月日_月を入力してください。',
            'birthdayDay.required_with' => '2枚目_7_60歳に達した者の生年月日_日を入力してください。',
            'dayAfter60Month.required_with' => '2枚目_8_60歳に達した日等の翌日_月を入力してください。',
            'dayAfter60Day.required_with' => '2枚目_8_60歳に達した日等の翌日_日を入力してください。',
            'applicablePeriodStartMonth1_1.required_with' => '2枚目_8_算定対象期間_開始月_1行目を入力してください。',
            'applicablePeriodStartMonth1_2.required_with' => '2枚目_8_算定対象期間_開始月_2行目を入力してください。',
            'applicablePeriodStartMonth1_3.required_with' => '2枚目_8_算定対象期間_開始月_3行目を入力してください。',
            'applicablePeriodStartMonth1_4.required_with' => '2枚目_8_算定対象期間_開始月_4行目を入力してください。',
            'applicablePeriodStartMonth1_5.required_with' => '2枚目_8_算定対象期間_開始月_5行目を入力してください。',
            'applicablePeriodStartMonth1_6.required_with' => '2枚目_8_算定対象期間_開始月_6行目を入力してください。',
            'applicablePeriodStartMonth1_7.required_with' => '2枚目_8_算定対象期間_開始月_7行目を入力してください。',
            'applicablePeriodStartMonth1_8.required_with' => '2枚目_8_算定対象期間_開始月_8行目を入力してください。',
            'applicablePeriodStartMonth1_9.required_with' => '2枚目_8_算定対象期間_開始月_9行目を入力してください。',
            'applicablePeriodStartMonth1_10.required_with' => '2枚目_8_算定対象期間_開始月_10行目を入力してください。',
            'applicablePeriodStartMonth1_11.required_with' => '2枚目_8_算定対象期間_開始月_11行目を入力してください。',
            'applicablePeriodStartMonth1_12.required_with' => '2枚目_8_算定対象期間_開始月_12行目を入力してください。',
            'applicablePeriodStartMonth1_13.required_with' => '2枚目_8_算定対象期間_開始月_13行目を入力してください。',
            'applicablePeriodStartDay1_1.required_with' => '2枚目_8_算定対象期間_開始日_1行目を入力してください。',
            'applicablePeriodStartDay1_2.required_with' => '2枚目_8_算定対象期間_開始日_2行目を入力してください。',
            'applicablePeriodStartDay1_3.required_with' => '2枚目_8_算定対象期間_開始日_3行目を入力してください。',
            'applicablePeriodStartDay1_4.required_with' => '2枚目_8_算定対象期間_開始日_4行目を入力してください。',
            'applicablePeriodStartDay1_5.required_with' => '2枚目_8_算定対象期間_開始日_5行目を入力してください。',
            'applicablePeriodStartDay1_6.required_with' => '2枚目_8_算定対象期間_開始日_6行目を入力してください。',
            'applicablePeriodStartDay1_7.required_with' => '2枚目_8_算定対象期間_開始日_7行目を入力してください。',
            'applicablePeriodStartDay1_8.required_with' => '2枚目_8_算定対象期間_開始日_8行目を入力してください。',
            'applicablePeriodStartDay1_9.required_with' => '2枚目_8_算定対象期間_開始日_9行目を入力してください。',
            'applicablePeriodStartDay1_10.required_with' => '2枚目_8_算定対象期間_開始日_10行目を入力してください。',
            'applicablePeriodStartDay1_11.required_with' => '2枚目_8_算定対象期間_開始日_11行目を入力してください。',
            'applicablePeriodStartDay1_12.required_with' => '2枚目_8_算定対象期間_開始日_12行目を入力してください。',
            'applicablePeriodStartDay1_13.required_with' => '2枚目_8_算定対象期間_開始日_13行目を入力してください。',
            'applicablePeriodEndMonth1_2.required_with' => '2枚目_8_算定対象期間_終了月_2行目を入力してください。',
            'applicablePeriodEndMonth1_3.required_with' => '2枚目_8_算定対象期間_終了月_3行目を入力してください。',
            'applicablePeriodEndMonth1_4.required_with' => '2枚目_8_算定対象期間_終了月_4行目を入力してください。',
            'applicablePeriodEndMonth1_5.required_with' => '2枚目_8_算定対象期間_終了月_5行目を入力してください。',
            'applicablePeriodEndMonth1_6.required_with' => '2枚目_8_算定対象期間_終了月_6行目を入力してください。',
            'applicablePeriodEndMonth1_7.required_with' => '2枚目_8_算定対象期間_終了月_7行目を入力してください。',
            'applicablePeriodEndMonth1_8.required_with' => '2枚目_8_算定対象期間_終了月_8行目を入力してください。',
            'applicablePeriodEndMonth1_9.required_with' => '2枚目_8_算定対象期間_終了月_9行目を入力してください。',
            'applicablePeriodEndMonth1_10.required_with' => '2枚目_8_算定対象期間_終了月_10行目を入力してください。',
            'applicablePeriodEndMonth1_11.required_with' => '2枚目_8_算定対象期間_終了月_11行目を入力してください。',
            'applicablePeriodEndMonth1_12.required_with' => '2枚目_8_算定対象期間_終了月_12行目を入力してください。',
            'applicablePeriodEndMonth1_13.required_with' => '2枚目_8_算定対象期間_終了月_13行目を入力してください。',
            'applicablePeriodEndDay1_2.required_with' => '2枚目_8_算定対象期間_終了日_2行目を入力してください。',
            'applicablePeriodEndDay1_3.required_with' => '2枚目_8_算定対象期間_終了日_3行目を入力してください。',
            'applicablePeriodEndDay1_4.required_with' => '2枚目_8_算定対象期間_終了日_4行目を入力してください。',
            'applicablePeriodEndDay1_5.required_with' => '2枚目_8_算定対象期間_終了日_5行目を入力してください。',
            'applicablePeriodEndDay1_6.required_with' => '2枚目_8_算定対象期間_終了日_6行目を入力してください。',
            'applicablePeriodEndDay1_7.required_with' => '2枚目_8_算定対象期間_終了日_7行目を入力してください。',
            'applicablePeriodEndDay1_8.required_with' => '2枚目_8_算定対象期間_終了日_8行目を入力してください。',
            'applicablePeriodEndDay1_9.required_with' => '2枚目_8_算定対象期間_終了日_9行目を入力してください。',
            'applicablePeriodEndDay1_10.required_with' => '2枚目_8_算定対象期間_終了日_10行目を入力してください。',
            'applicablePeriodEndDay1_11.required_with' => '2枚目_8_算定対象期間_終了日_11行目を入力してください。',
            'applicablePeriodEndDay1_12.required_with' => '2枚目_8_算定対象期間_終了日_12行目を入力してください。',
            'applicablePeriodEndDay1_13.required_with' => '2枚目_8_算定対象期間_終了日_13行目を入力してください。',
            'paymentPeriodStartMonth1_1.required_with' => '2枚目_10_賃金支払対象期間_開始月_1行目を入力してください。',
            'paymentPeriodStartMonth1_2.required_with' => '2枚目_10_賃金支払対象期間_開始月_2行目を入力してください。',
            'paymentPeriodStartMonth1_3.required_with' => '2枚目_10_賃金支払対象期間_開始月_3行目を入力してください。',
            'paymentPeriodStartMonth1_4.required_with' => '2枚目_10_賃金支払対象期間_開始月_4行目を入力してください。',
            'paymentPeriodStartMonth1_5.required_with' => '2枚目_10_賃金支払対象期間_開始月_5行目を入力してください。',
            'paymentPeriodStartMonth1_6.required_with' => '2枚目_10_賃金支払対象期間_開始月_6行目を入力してください。',
            'paymentPeriodStartMonth1_7.required_with' => '2枚目_10_賃金支払対象期間_開始月_7行目を入力してください。',
            'paymentPeriodStartMonth1_8.required_with' => '2枚目_10_賃金支払対象期間_開始月_8行目を入力してください。',
            'paymentPeriodStartMonth1_9.required_with' => '2枚目_10_賃金支払対象期間_開始月_9行目を入力してください。',
            'paymentPeriodStartMonth1_10.required_with' => '2枚目_10_賃金支払対象期間_開始月_10行目を入力してください。',
            'paymentPeriodStartMonth1_11.required_with' => '2枚目_10_賃金支払対象期間_開始月_11行目を入力してください。',
            'paymentPeriodStartMonth1_12.required_with' => '2枚目_10_賃金支払対象期間_開始月_12行目を入力してください。',
            'paymentPeriodStartMonth1_13.required_with' => '2枚目_10_賃金支払対象期間_開始月_13行目を入力してください。',
            'paymentPeriodStartDay1_1.required_with' => '2枚目_10_賃金支払対象期間_開始日_1行目を入力してください。',
            'paymentPeriodStartDay1_2.required_with' => '2枚目_10_賃金支払対象期間_開始日_2行目を入力してください。',
            'paymentPeriodStartDay1_3.required_with' => '2枚目_10_賃金支払対象期間_開始日_3行目を入力してください。',
            'paymentPeriodStartDay1_4.required_with' => '2枚目_10_賃金支払対象期間_開始日_4行目を入力してください。',
            'paymentPeriodStartDay1_5.required_with' => '2枚目_10_賃金支払対象期間_開始日_5行目を入力してください。',
            'paymentPeriodStartDay1_6.required_with' => '2枚目_10_賃金支払対象期間_開始日_6行目を入力してください。',
            'paymentPeriodStartDay1_7.required_with' => '2枚目_10_賃金支払対象期間_開始日_7行目を入力してください。',
            'paymentPeriodStartDay1_8.required_with' => '2枚目_10_賃金支払対象期間_開始日_8行目を入力してください。',
            'paymentPeriodStartDay1_9.required_with' => '2枚目_10_賃金支払対象期間_開始日_9行目を入力してください。',
            'paymentPeriodStartDay1_10.required_with' => '2枚目_10_賃金支払対象期間_開始日_10行目を入力してください。',
            'paymentPeriodStartDay1_11.required_with' => '2枚目_10_賃金支払対象期間_開始日_11行目を入力してください。',
            'paymentPeriodStartDay1_12.required_with' => '2枚目_10_賃金支払対象期間_開始日_12行目を入力してください。',
            'paymentPeriodStartDay1_13.required_with' => '2枚目_10_賃金支払対象期間_開始日_13行目を入力してください。',
            'paymentPeriodEndMonth1_2.required_with' => '2枚目_10_賃金支払対象期間_終了月_2行目を入力してください。',
            'paymentPeriodEndMonth1_3.required_with' => '2枚目_10_賃金支払対象期間_終了月_3行目を入力してください。',
            'paymentPeriodEndMonth1_4.required_with' => '2枚目_10_賃金支払対象期間_終了月_4行目を入力してください。',
            'paymentPeriodEndMonth1_5.required_with' => '2枚目_10_賃金支払対象期間_終了月_5行目を入力してください。',
            'paymentPeriodEndMonth1_6.required_with' => '2枚目_10_賃金支払対象期間_終了月_6行目を入力してください。',
            'paymentPeriodEndMonth1_7.required_with' => '2枚目_10_賃金支払対象期間_終了月_7行目を入力してください。',
            'paymentPeriodEndMonth1_8.required_with' => '2枚目_10_賃金支払対象期間_終了月_8行目を入力してください。',
            'paymentPeriodEndMonth1_9.required_with' => '2枚目_10_賃金支払対象期間_終了月_9行目を入力してください。',
            'paymentPeriodEndMonth1_10.required_with' => '2枚目_10_賃金支払対象期間_終了月_10行目を入力してください。',
            'paymentPeriodEndMonth1_11.required_with' => '2枚目_10_賃金支払対象期間_終了月_11行目を入力してください。',
            'paymentPeriodEndMonth1_12.required_with' => '2枚目_10_賃金支払対象期間_終了月_12行目を入力してください。',
            'paymentPeriodEndMonth1_13.required_with' => '2枚目_10_賃金支払対象期間_終了月_13行目を入力してください。',
            'paymentPeriodEndDay1_2.required_with' => '2枚目_10_賃金支払対象期間_終了日_2行目を入力してください。',
            'paymentPeriodEndDay1_3.required_with' => '2枚目_10_賃金支払対象期間_終了日_3行目を入力してください。',
            'paymentPeriodEndDay1_4.required_with' => '2枚目_10_賃金支払対象期間_終了日_4行目を入力してください。',
            'paymentPeriodEndDay1_5.required_with' => '2枚目_10_賃金支払対象期間_終了日_5行目を入力してください。',
            'paymentPeriodEndDay1_6.required_with' => '2枚目_10_賃金支払対象期間_終了日_6行目を入力してください。',
            'paymentPeriodEndDay1_7.required_with' => '2枚目_10_賃金支払対象期間_終了日_7行目を入力してください。',
            'paymentPeriodEndDay1_8.required_with' => '2枚目_10_賃金支払対象期間_終了日_8行目を入力してください。',
            'paymentPeriodEndDay1_9.required_with' => '2枚目_10_賃金支払対象期間_終了日_9行目を入力してください。',
            'paymentPeriodEndDay1_10.required_with' => '2枚目_10_賃金支払対象期間_終了日_10行目を入力してください。',
            'paymentPeriodEndDay1_11.required_with' => '2枚目_10_賃金支払対象期間_終了日_11行目を入力してください。',
            'paymentPeriodEndDay1_12.required_with' => '2枚目_10_賃金支払対象期間_終了日_12行目を入力してください。',
            'paymentPeriodEndDay1_13.required_with' => '2枚目_10_賃金支払対象期間_終了日_13行目を入力してください。',
            'applicablePeriodStartMonth2_2.required_with' => '2枚目_続紙_8_算定対象期間_開始月_1行目を入力してください。',
            'applicablePeriodStartMonth2_3.required_with' => '2枚目_続紙_8_算定対象期間_開始月_2行目を入力してください。',
            'applicablePeriodStartMonth2_4.required_with' => '2枚目_続紙_8_算定対象期間_開始月_3行目を入力してください。',
            'applicablePeriodStartMonth2_5.required_with' => '2枚目_続紙_8_算定対象期間_開始月_4行目を入力してください。',
            'applicablePeriodStartMonth2_6.required_with' => '2枚目_続紙_8_算定対象期間_開始月_5行目を入力してください。',
            'applicablePeriodStartMonth2_7.required_with' => '2枚目_続紙_8_算定対象期間_開始月_6行目を入力してください。',
            'applicablePeriodStartMonth2_8.required_with' => '2枚目_続紙_8_算定対象期間_開始月_7行目を入力してください。',
            'applicablePeriodStartMonth2_9.required_with' => '2枚目_続紙_8_算定対象期間_開始月_8行目を入力してください。',
            'applicablePeriodStartMonth2_10.required_with' => '2枚目_続紙_8_算定対象期間_開始月_9行目を入力してください。',
            'applicablePeriodStartMonth2_11.required_with' => '2枚目_続紙_8_算定対象期間_開始月_10行目を入力してください。',
            'applicablePeriodStartMonth2_12.required_with' => '2枚目_続紙_8_算定対象期間_開始月_11行目を入力してください。',
            'applicablePeriodStartMonth2_13.required_with' => '2枚目_続紙_8_算定対象期間_開始月_12行目を入力してください。',
            'applicablePeriodStartDay2_2.required_with' => '2枚目_続紙_8_算定対象期間_開始日_1行目を入力してください。',
            'applicablePeriodStartDay2_3.required_with' => '2枚目_続紙_8_算定対象期間_開始日_2行目を入力してください。',
            'applicablePeriodStartDay2_4.required_with' => '2枚目_続紙_8_算定対象期間_開始日_3行目を入力してください。',
            'applicablePeriodStartDay2_5.required_with' => '2枚目_続紙_8_算定対象期間_開始日_4行目を入力してください。',
            'applicablePeriodStartDay2_6.required_with' => '2枚目_続紙_8_算定対象期間_開始日_5行目を入力してください。',
            'applicablePeriodStartDay2_7.required_with' => '2枚目_続紙_8_算定対象期間_開始日_6行目を入力してください。',
            'applicablePeriodStartDay2_8.required_with' => '2枚目_続紙_8_算定対象期間_開始日_7行目を入力してください。',
            'applicablePeriodStartDay2_9.required_with' => '2枚目_続紙_8_算定対象期間_開始日_8行目を入力してください。',
            'applicablePeriodStartDay2_10.required_with' => '2枚目_続紙_8_算定対象期間_開始日_9行目を入力してください。',
            'applicablePeriodStartDay2_11.required_with' => '2枚目_続紙_8_算定対象期間_開始日_10行目を入力してください。',
            'applicablePeriodStartDay2_12.required_with' => '2枚目_続紙_8_算定対象期間_開始日_11行目を入力してください。',
            'applicablePeriodStartDay2_13.required_with' => '2枚目_続紙_8_算定対象期間_開始日_12行目を入力してください。',
            'applicablePeriodEndMonth2_2.required_with' => '2枚目_続紙_8_算定対象期間_終了月_1行目を入力してください。',
            'applicablePeriodEndMonth2_3.required_with' => '2枚目_続紙_8_算定対象期間_終了月_2行目を入力してください。',
            'applicablePeriodEndMonth2_4.required_with' => '2枚目_続紙_8_算定対象期間_終了月_3行目を入力してください。',
            'applicablePeriodEndMonth2_5.required_with' => '2枚目_続紙_8_算定対象期間_終了月_4行目を入力してください。',
            'applicablePeriodEndMonth2_6.required_with' => '2枚目_続紙_8_算定対象期間_終了月_5行目を入力してください。',
            'applicablePeriodEndMonth2_7.required_with' => '2枚目_続紙_8_算定対象期間_終了月_6行目を入力してください。',
            'applicablePeriodEndMonth2_8.required_with' => '2枚目_続紙_8_算定対象期間_終了月_7行目を入力してください。',
            'applicablePeriodEndMonth2_9.required_with' => '2枚目_続紙_8_算定対象期間_終了月_8行目を入力してください。',
            'applicablePeriodEndMonth2_10.required_with' => '2枚目_続紙_8_算定対象期間_終了月_9行目を入力してください。',
            'applicablePeriodEndMonth2_11.required_with' => '2枚目_続紙_8_算定対象期間_終了月_10行目を入力してください。',
            'applicablePeriodEndMonth2_12.required_with' => '2枚目_続紙_8_算定対象期間_終了月_11行目を入力してください。',
            'applicablePeriodEndMonth2_13.required_with' => '2枚目_続紙_8_算定対象期間_終了月_12行目を入力してください。',
            'applicablePeriodEndDay2_2.required_with' => '2枚目_続紙_8_算定対象期間_終了日_1行目を入力してください。',
            'applicablePeriodEndDay2_3.required_with' => '2枚目_続紙_8_算定対象期間_終了日_2行目を入力してください。',
            'applicablePeriodEndDay2_4.required_with' => '2枚目_続紙_8_算定対象期間_終了日_3行目を入力してください。',
            'applicablePeriodEndDay2_5.required_with' => '2枚目_続紙_8_算定対象期間_終了日_4行目を入力してください。',
            'applicablePeriodEndDay2_6.required_with' => '2枚目_続紙_8_算定対象期間_終了日_5行目を入力してください。',
            'applicablePeriodEndDay2_7.required_with' => '2枚目_続紙_8_算定対象期間_終了日_6行目を入力してください。',
            'applicablePeriodEndDay2_8.required_with' => '2枚目_続紙_8_算定対象期間_終了日_7行目を入力してください。',
            'applicablePeriodEndDay2_9.required_with' => '2枚目_続紙_8_算定対象期間_終了日_8行目を入力してください。',
            'applicablePeriodEndDay2_10.required_with' => '2枚目_続紙_8_算定対象期間_終了日_9行目を入力してください。',
            'applicablePeriodEndDay2_11.required_with' => '2枚目_続紙_8_算定対象期間_終了日_10行目を入力してください。',
            'applicablePeriodEndDay2_12.required_with' => '2枚目_続紙_8_算定対象期間_終了日_11行目を入力してください。',
            'applicablePeriodEndDay2_13.required_with' => '2枚目_続紙_8_算定対象期間_終了日_12行目を入力してください。',
            'paymentPeriodStartMonth2_2.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_1行目を入力してください。',
            'paymentPeriodStartMonth2_3.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_2行目を入力してください。',
            'paymentPeriodStartMonth2_4.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_3行目を入力してください。',
            'paymentPeriodStartMonth2_5.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_4行目を入力してください。',
            'paymentPeriodStartMonth2_6.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_5行目を入力してください。',
            'paymentPeriodStartMonth2_7.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_6行目を入力してください。',
            'paymentPeriodStartMonth2_8.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_7行目を入力してください。',
            'paymentPeriodStartMonth2_9.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_8行目を入力してください。',
            'paymentPeriodStartMonth2_10.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_9行目を入力してください。',
            'paymentPeriodStartMonth2_11.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_10行目を入力してください。',
            'paymentPeriodStartMonth2_12.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_11行目を入力してください。',
            'paymentPeriodStartMonth2_13.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始月_12行目を入力してください。',
            'paymentPeriodStartDay2_2.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_1行目を入力してください。',
            'paymentPeriodStartDay2_3.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_2行目を入力してください。',
            'paymentPeriodStartDay2_4.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_3行目を入力してください。',
            'paymentPeriodStartDay2_5.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_4行目を入力してください。',
            'paymentPeriodStartDay2_6.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_5行目を入力してください。',
            'paymentPeriodStartDay2_7.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_6行目を入力してください。',
            'paymentPeriodStartDay2_8.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_7行目を入力してください。',
            'paymentPeriodStartDay2_9.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_8行目を入力してください。',
            'paymentPeriodStartDay2_10.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_9行目を入力してください。',
            'paymentPeriodStartDay2_11.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_10行目を入力してください。',
            'paymentPeriodStartDay2_12.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_11行目を入力してください。',
            'paymentPeriodStartDay2_13.required_with' => '2枚目_続紙_10_賃金支払対象期間_開始日_12行目を入力してください。',
            'paymentPeriodEndMonth2_2.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_1行目を入力してください。',
            'paymentPeriodEndMonth2_3.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_2行目を入力してください。',
            'paymentPeriodEndMonth2_4.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_3行目を入力してください。',
            'paymentPeriodEndMonth2_5.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_4行目を入力してください。',
            'paymentPeriodEndMonth2_6.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_5行目を入力してください。',
            'paymentPeriodEndMonth2_7.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_6行目を入力してください。',
            'paymentPeriodEndMonth2_8.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_7行目を入力してください。',
            'paymentPeriodEndMonth2_9.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_8行目を入力してください。',
            'paymentPeriodEndMonth2_10.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_9行目を入力してください。',
            'paymentPeriodEndMonth2_11.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_10行目を入力してください。',
            'paymentPeriodEndMonth2_12.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_11行目を入力してください。',
            'paymentPeriodEndMonth2_13.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了月_12行目を入力してください。',
            'paymentPeriodEndDay2_2.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_1行目を入力してください。',
            'paymentPeriodEndDay2_3.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_2行目を入力してください。',
            'paymentPeriodEndDay2_4.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_3行目を入力してください。',
            'paymentPeriodEndDay2_5.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_4行目を入力してください。',
            'paymentPeriodEndDay2_6.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_5行目を入力してください。',
            'paymentPeriodEndDay2_7.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_6行目を入力してください。',
            'paymentPeriodEndDay2_8.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_7行目を入力してください。',
            'paymentPeriodEndDay2_9.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_8行目を入力してください。',
            'paymentPeriodEndDay2_10.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_9行目を入力してください。',
            'paymentPeriodEndDay2_11.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_10行目を入力してください。',
            'paymentPeriodEndDay2_12.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_11行目を入力してください。',
            'paymentPeriodEndDay2_13.required_with' => '2枚目_続紙_10_賃金支払対象期間_終了日_12行目を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'branchName' => '2枚目_4_事業所名称',
            'branchAddress' => '2枚目_4_事業所所在地',
            'branchTelAreaCode' => '2枚目_4_事業所電話番号_市外局番',
            'branchTelCityCode' => '2枚目_4_事業所電話番号_市内局番',
            'branchTelSubscriberCode' => '2枚目_4_事業所電話番号_加入者番号',
            'postCodeFormer' => '2枚目_5_60歳に達した者の住所又は居所_郵便番号3桁',
            'postCodeLatter' => '2枚目_5_60歳に達した者の住所又は居所_郵便番号4桁',
            'telAreaCode' => '2枚目_5_60歳に達した者の住所又は居所_電話番号_市外局番',
            'telCityCode' => '2枚目_5_60歳に達した者の住所又は居所_所在地_市内局番',
            'telSubscriberCode' => '2枚目_5_60歳に達した者の住所又は居所_所在地_加入者番号',
            'dateOfAttainmentage60JapanEra' => '2枚目_6_60歳に達した日の年の年月日_年号',
            'dateOfAttainmentage60JapanEraYear' => '2枚目_6_60歳に達した日の年の年月日_年',
            'dateOfAttainmentage60Month' => '2枚目_6_60歳に達した日の年の年月日_月',
            'dateOfAttainmentage60Day' => '2枚目_6_60歳に達した日の年の年月日_日',
            'birthdayEra' => '2枚目_7_60歳に達した者の生年月日_年号',
            'birthdayYear' => '2枚目_7_60歳に達した者の生年月日_年',
            'birthdayMonth' => '2枚目_7_60歳に達した者の生年月日_月',
            'birthdayDay' => '2枚目_7_60歳に達した者の生年月日_日',
            'dayAfter60Month' => '2枚目_8_60歳に達した日等の翌日_月',
            'dayAfter60Day' => '2枚目_8_60歳に達した日等の翌日_日',
            'applicablePeriodStartMonth1_1' => '2枚目_8_算定対象期間_開始月_1行目',
            'applicablePeriodStartMonth1_2' => '2枚目_8_算定対象期間_開始月_2行目',
            'applicablePeriodStartMonth1_3' => '2枚目_8_算定対象期間_開始月_3行目',
            'applicablePeriodStartMonth1_4' => '2枚目_8_算定対象期間_開始月_4行目',
            'applicablePeriodStartMonth1_5' => '2枚目_8_算定対象期間_開始月_5行目',
            'applicablePeriodStartMonth1_6' => '2枚目_8_算定対象期間_開始月_6行目',
            'applicablePeriodStartMonth1_7' => '2枚目_8_算定対象期間_開始月_7行目',
            'applicablePeriodStartMonth1_8' => '2枚目_8_算定対象期間_開始月_8行目',
            'applicablePeriodStartMonth1_9' => '2枚目_8_算定対象期間_開始月_9行目',
            'applicablePeriodStartMonth1_10' => '2枚目_8_算定対象期間_開始月_10行目',
            'applicablePeriodStartMonth1_11' => '2枚目_8_算定対象期間_開始月_11行目',
            'applicablePeriodStartMonth1_12' => '2枚目_8_算定対象期間_開始月_12行目',
            'applicablePeriodStartMonth1_13' => '2枚目_8_算定対象期間_開始月_13行目',
            'applicablePeriodStartDay1_1' => '2枚目_8_算定対象期間_開始日_1行目',
            'applicablePeriodStartDay1_2' => '2枚目_8_算定対象期間_開始日_2行目',
            'applicablePeriodStartDay1_3' => '2枚目_8_算定対象期間_開始日_3行目',
            'applicablePeriodStartDay1_4' => '2枚目_8_算定対象期間_開始日_4行目',
            'applicablePeriodStartDay1_5' => '2枚目_8_算定対象期間_開始日_5行目',
            'applicablePeriodStartDay1_6' => '2枚目_8_算定対象期間_開始日_6行目',
            'applicablePeriodStartDay1_7' => '2枚目_8_算定対象期間_開始日_7行目',
            'applicablePeriodStartDay1_8' => '2枚目_8_算定対象期間_開始日_8行目',
            'applicablePeriodStartDay1_9' => '2枚目_8_算定対象期間_開始日_9行目',
            'applicablePeriodStartDay1_10' => '2枚目_8_算定対象期間_開始日_10行目',
            'applicablePeriodStartDay1_11' => '2枚目_8_算定対象期間_開始日_11行目',
            'applicablePeriodStartDay1_12' => '2枚目_8_算定対象期間_開始日_12行目',
            'applicablePeriodStartDay1_13' => '2枚目_8_算定対象期間_開始日_13行目',
            'applicablePeriodEndMonth1_2' => '2枚目_8_算定対象期間_終了月_2行目',
            'applicablePeriodEndMonth1_3' => '2枚目_8_算定対象期間_終了月_3行目',
            'applicablePeriodEndMonth1_4' => '2枚目_8_算定対象期間_終了月_4行目',
            'applicablePeriodEndMonth1_5' => '2枚目_8_算定対象期間_終了月_5行目',
            'applicablePeriodEndMonth1_6' => '2枚目_8_算定対象期間_終了月_6行目',
            'applicablePeriodEndMonth1_7' => '2枚目_8_算定対象期間_終了月_7行目',
            'applicablePeriodEndMonth1_8' => '2枚目_8_算定対象期間_終了月_8行目',
            'applicablePeriodEndMonth1_9' => '2枚目_8_算定対象期間_終了月_9行目',
            'applicablePeriodEndMonth1_10' => '2枚目_8_算定対象期間_終了月_10行目',
            'applicablePeriodEndMonth1_11' => '2枚目_8_算定対象期間_終了月_11行目',
            'applicablePeriodEndMonth1_12' => '2枚目_8_算定対象期間_終了月_12行目',
            'applicablePeriodEndMonth1_13' => '2枚目_8_算定対象期間_終了月_13行目',
            'applicablePeriodEndDay1_2' => '2枚目_8_算定対象期間_終了日_2行目',
            'applicablePeriodEndDay1_3' => '2枚目_8_算定対象期間_終了日_3行目',
            'applicablePeriodEndDay1_4' => '2枚目_8_算定対象期間_終了日_4行目',
            'applicablePeriodEndDay1_5' => '2枚目_8_算定対象期間_終了日_5行目',
            'applicablePeriodEndDay1_6' => '2枚目_8_算定対象期間_終了日_6行目',
            'applicablePeriodEndDay1_7' => '2枚目_8_算定対象期間_終了日_7行目',
            'applicablePeriodEndDay1_8' => '2枚目_8_算定対象期間_終了日_8行目',
            'applicablePeriodEndDay1_9' => '2枚目_8_算定対象期間_終了日_9行目',
            'applicablePeriodEndDay1_10' => '2枚目_8_算定対象期間_終了日_10行目',
            'applicablePeriodEndDay1_11' => '2枚目_8_算定対象期間_終了日_11行目',
            'applicablePeriodEndDay1_12' => '2枚目_8_算定対象期間_終了日_12行目',
            'applicablePeriodEndDay1_13' => '2枚目_8_算定対象期間_終了日_13行目',
            'basicDays1_1' => '2枚目_9_賃金支払基礎日数_1行目',
            'basicDays1_2' => '2枚目_9_賃金支払基礎日数_2行目',
            'basicDays1_3' => '2枚目_9_賃金支払基礎日数_3行目',
            'basicDays1_4' => '2枚目_9_賃金支払基礎日数_4行目',
            'basicDays1_5' => '2枚目_9_賃金支払基礎日数_5行目',
            'basicDays1_6' => '2枚目_9_賃金支払基礎日数_6行目',
            'basicDays1_7' => '2枚目_9_賃金支払基礎日数_7行目',
            'basicDays1_8' => '2枚目_9_賃金支払基礎日数_8行目',
            'basicDays1_9' => '2枚目_9_賃金支払基礎日数_9行目',
            'basicDays1_10' => '2枚目_9_賃金支払基礎日数_10行目',
            'basicDays1_11' => '2枚目_9_賃金支払基礎日数_11行目',
            'basicDays1_12' => '2枚目_9_賃金支払基礎日数_12行目',
            'basicDays1_13' => '2枚目_9_賃金支払基礎日数_13行目',
            'paymentPeriodStartMonth1_1' => '2枚目_10_賃金支払対象期間_開始月_1行目',
            'paymentPeriodStartMonth1_2' => '2枚目_10_賃金支払対象期間_開始月_2行目',
            'paymentPeriodStartMonth1_3' => '2枚目_10_賃金支払対象期間_開始月_3行目',
            'paymentPeriodStartMonth1_4' => '2枚目_10_賃金支払対象期間_開始月_4行目',
            'paymentPeriodStartMonth1_5' => '2枚目_10_賃金支払対象期間_開始月_5行目',
            'paymentPeriodStartMonth1_6' => '2枚目_10_賃金支払対象期間_開始月_6行目',
            'paymentPeriodStartMonth1_7' => '2枚目_10_賃金支払対象期間_開始月_7行目',
            'paymentPeriodStartMonth1_8' => '2枚目_10_賃金支払対象期間_開始月_8行目',
            'paymentPeriodStartMonth1_9' => '2枚目_10_賃金支払対象期間_開始月_9行目',
            'paymentPeriodStartMonth1_10' => '2枚目_10_賃金支払対象期間_開始月_10行目',
            'paymentPeriodStartMonth1_11' => '2枚目_10_賃金支払対象期間_開始月_11行目',
            'paymentPeriodStartMonth1_12' => '2枚目_10_賃金支払対象期間_開始月_12行目',
            'paymentPeriodStartMonth1_13' => '2枚目_10_賃金支払対象期間_開始月_13行目',
            'paymentPeriodStartDay1_1' => '2枚目_10_賃金支払対象期間_開始日_1行目',
            'paymentPeriodStartDay1_2' => '2枚目_10_賃金支払対象期間_開始日_2行目',
            'paymentPeriodStartDay1_3' => '2枚目_10_賃金支払対象期間_開始日_3行目',
            'paymentPeriodStartDay1_4' => '2枚目_10_賃金支払対象期間_開始日_4行目',
            'paymentPeriodStartDay1_5' => '2枚目_10_賃金支払対象期間_開始日_5行目',
            'paymentPeriodStartDay1_6' => '2枚目_10_賃金支払対象期間_開始日_6行目',
            'paymentPeriodStartDay1_7' => '2枚目_10_賃金支払対象期間_開始日_7行目',
            'paymentPeriodStartDay1_8' => '2枚目_10_賃金支払対象期間_開始日_8行目',
            'paymentPeriodStartDay1_9' => '2枚目_10_賃金支払対象期間_開始日_9行目',
            'paymentPeriodStartDay1_10' => '2枚目_10_賃金支払対象期間_開始日_10行目',
            'paymentPeriodStartDay1_11' => '2枚目_10_賃金支払対象期間_開始日_11行目',
            'paymentPeriodStartDay1_12' => '2枚目_10_賃金支払対象期間_開始日_12行目',
            'paymentPeriodStartDay1_13' => '2枚目_10_賃金支払対象期間_開始日_13行目',
            'paymentPeriodEndMonth1_2' => '2枚目_10_賃金支払対象期間_終了月_2行目',
            'paymentPeriodEndMonth1_3' => '2枚目_10_賃金支払対象期間_終了月_3行目',
            'paymentPeriodEndMonth1_4' => '2枚目_10_賃金支払対象期間_終了月_4行目',
            'paymentPeriodEndMonth1_5' => '2枚目_10_賃金支払対象期間_終了月_5行目',
            'paymentPeriodEndMonth1_6' => '2枚目_10_賃金支払対象期間_終了月_6行目',
            'paymentPeriodEndMonth1_7' => '2枚目_10_賃金支払対象期間_終了月_7行目',
            'paymentPeriodEndMonth1_8' => '2枚目_10_賃金支払対象期間_終了月_8行目',
            'paymentPeriodEndMonth1_9' => '2枚目_10_賃金支払対象期間_終了月_9行目',
            'paymentPeriodEndMonth1_10' => '2枚目_10_賃金支払対象期間_終了月_10行目',
            'paymentPeriodEndMonth1_11' => '2枚目_10_賃金支払対象期間_終了月_11行目',
            'paymentPeriodEndMonth1_12' => '2枚目_10_賃金支払対象期間_終了月_12行目',
            'paymentPeriodEndMonth1_13' => '2枚目_10_賃金支払対象期間_終了月_13行目',
            'paymentPeriodEndDay1_2' => '2枚目_10_賃金支払対象期間_終了日_2行目',
            'paymentPeriodEndDay1_3' => '2枚目_10_賃金支払対象期間_終了日_3行目',
            'paymentPeriodEndDay1_4' => '2枚目_10_賃金支払対象期間_終了日_4行目',
            'paymentPeriodEndDay1_5' => '2枚目_10_賃金支払対象期間_終了日_5行目',
            'paymentPeriodEndDay1_6' => '2枚目_10_賃金支払対象期間_終了日_6行目',
            'paymentPeriodEndDay1_7' => '2枚目_10_賃金支払対象期間_終了日_7行目',
            'paymentPeriodEndDay1_8' => '2枚目_10_賃金支払対象期間_終了日_8行目',
            'paymentPeriodEndDay1_9' => '2枚目_10_賃金支払対象期間_終了日_9行目',
            'paymentPeriodEndDay1_10' => '2枚目_10_賃金支払対象期間_終了日_10行目',
            'paymentPeriodEndDay1_11' => '2枚目_10_賃金支払対象期間_終了日_11行目',
            'paymentPeriodEndDay1_12' => '2枚目_10_賃金支払対象期間_終了日_12行目',
            'paymentPeriodEndDay1_13' => '2枚目_10_賃金支払対象期間_終了日_13行目',
            'basicDays1' => '2枚目_11_基礎日数_1行目',
            'paymentPeriodBasicDays1_2' => '2枚目_11_基礎日数_2行目',
            'paymentPeriodBasicDays1_3' => '2枚目_11_基礎日数_3行目',
            'paymentPeriodBasicDays1_4' => '2枚目_11_基礎日数_4行目',
            'paymentPeriodBasicDays1_5' => '2枚目_11_基礎日数_5行目',
            'paymentPeriodBasicDays1_6' => '2枚目_11_基礎日数_6行目',
            'paymentPeriodBasicDays1_7' => '2枚目_11_基礎日数_7行目',
            'paymentPeriodBasicDays1_8' => '2枚目_11_基礎日数_8行目',
            'paymentPeriodBasicDays1_9' => '2枚目_11_基礎日数_9行目',
            'paymentPeriodBasicDays1_10' => '2枚目_11_基礎日数_10行目',
            'paymentPeriodBasicDays1_11' => '2枚目_11_基礎日数_11行目',
            'paymentPeriodBasicDays1_12' => '2枚目_11_基礎日数_12行目',
            'paymentPeriodBasicDays1_13' => '2枚目_11_基礎日数_13行目',
            'wageAmountA1' => '2枚目_12_賃金額_A_1行目',
            'wageAmountB1' => '2枚目_12_賃金額_B_1行目',
            'totalWages1' => '2枚目_12_賃金額_計_1行目',
            'wageAmountA1_1' => '2枚目_12_賃金額_A_2行目',
            'wageAmountB1_1' => '2枚目_12_賃金額_B_2行目',
            'totalWages1_1' => '2枚目_12_賃金額_計_2行目',
            'wageAmountA1_2' => '2枚目_12_賃金額_A_3行目',
            'wageAmountB1_2' => '2枚目_12_賃金額_B_3行目',
            'totalWages1_2' => '2枚目_12_賃金額_計_3行目',
            'wageAmountA1_3' => '2枚目_12_賃金額_A_4行目',
            'wageAmountB1_3' => '2枚目_12_賃金額_B_4行目',
            'totalWages1_3' => '2枚目_12_賃金額_計_4行目',
            'wageAmountA1_4' => '2枚目_12_賃金額_A_5行目',
            'wageAmountB1_4' => '2枚目_12_賃金額_B_5行目',
            'totalWages1_4' => '2枚目_12_賃金額_計_5行目',
            'wageAmountA1_5' => '2枚目_12_賃金額_A_6行目',
            'wageAmountB1_5' => '2枚目_12_賃金額_B_6行目',
            'totalWages1_5' => '2枚目_12_賃金額_計_6行目',
            'wageAmountA1_6' => '2枚目_12_賃金額_A_7行目',
            'wageAmountB1_6' => '2枚目_12_賃金額_B_7行目',
            'totalWages1_6' => '2枚目_12_賃金額_計_7行目',
            'wageAmountA1_7' => '2枚目_12_賃金額_A_8行目',
            'wageAmountB1_7' => '2枚目_12_賃金額_B_8行目',
            'totalWages1_7' => '2枚目_12_賃金額_計_8行目',
            'wageAmountA1_8' => '2枚目_12_賃金額_A_9行目',
            'wageAmountB1_8' => '2枚目_12_賃金額_B_9行目',
            'totalWages1_8' => '2枚目_12_賃金額_計_9行目',
            'wageAmountA1_9' => '2枚目_12_賃金額_A_10行目',
            'wageAmountB1_9' => '2枚目_12_賃金額_B_10行目',
            'totalWages1_9' => '2枚目_12_賃金額_計_10行目',
            'wageAmountA1_10' => '2枚目_12_賃金額_A_11行目',
            'wageAmountB1_10' => '2枚目_12_賃金額_B_11行目',
            'totalWages1_10' => '2枚目_12_賃金額_計_11行目',
            'wageAmountA1_11' => '2枚目_12_賃金額_A_12行目',
            'wageAmountB1_11' => '2枚目_12_賃金額_B_12行目',
            'totalWages1_11' => '2枚目_12_賃金額_計_12行目',
            'wageAmountA1_12' => '2枚目_12_賃金額_A_13行目',
            'wageAmountB1_12' => '2枚目_12_賃金額_B_13行目',
            'totalWages1_12' => '2枚目_12_賃金額_計_13行目',
            'WageNote1_1' => '2枚目_13_備考_1行目',
            'WageNote1_2' => '2枚目_13_備考_2行目',
            'WageNote1_3' => '2枚目_13_備考_3行目',
            'WageNote1_4' => '2枚目_13_備考_4行目',
            'WageNote1_5' => '2枚目_13_備考_5行目',
            'WageNote1_6' => '2枚目_13_備考_6行目',
            'WageNote1_7' => '2枚目_13_備考_7行目',
            'WageNote1_8' => '2枚目_13_備考_8行目',
            'WageNote1_9' => '2枚目_13_備考_9行目',
            'WageNote1_10' => '2枚目_13_備考_10行目',
            'WageNote1_11' => '2枚目_13_備考_11行目',
            'WageNote1_12' => '2枚目_13_備考_12行目',
            'WageNote1_13' => '2枚目_13_備考_13行目',
            'specialNoteOnWages1_1' => '2枚目_14_賃金に関する特記事項',
            'laborConsultantJapanEra' => '2枚目_社会保険労務士記載欄_年号',
            'laborConsultantJapanEraYear' => '2枚目_社会保険労務士記載欄_年',
            'laborConsultantMonth' => '2枚目_社会保険労務士記載欄_月',
            'laborConsultantDay' => '2枚目_社会保険労務士記載欄_日',
            'laborConsultantActingAsAgent' => '2枚目_社会保険労務士記載欄_提出代行者･事務代理者',
            'laborConsultantName' => '2枚目_社会保険労務士記載欄_氏名',
            'laborConsultantTelAreaCode' => '2枚目_社会保険労務士記載欄_電話番号_市外局番',
            'laborConsultantTelSubscriberCode' => '2枚目_社会保険労務士記載欄_電話番号_市内局番',
            'laborConsultantTelCityCode' => '2枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'OtherNotes' => '2枚目_社会保険労務士記載欄下_付記欄',
            'applicablePeriodStartMonth2_2' => '2枚目_続紙_8_算定対象期間_開始月_1行目',
            'applicablePeriodStartMonth2_3' => '2枚目_続紙_8_算定対象期間_開始月_2行目',
            'applicablePeriodStartMonth2_4' => '2枚目_続紙_8_算定対象期間_開始月_3行目',
            'applicablePeriodStartMonth2_5' => '2枚目_続紙_8_算定対象期間_開始月_4行目',
            'applicablePeriodStartMonth2_6' => '2枚目_続紙_8_算定対象期間_開始月_5行目',
            'applicablePeriodStartMonth2_7' => '2枚目_続紙_8_算定対象期間_開始月_6行目',
            'applicablePeriodStartMonth2_8' => '2枚目_続紙_8_算定対象期間_開始月_7行目',
            'applicablePeriodStartMonth2_9' => '2枚目_続紙_8_算定対象期間_開始月_8行目',
            'applicablePeriodStartMonth2_10' => '2枚目_続紙_8_算定対象期間_開始月_9行目',
            'applicablePeriodStartMonth2_11' => '2枚目_続紙_8_算定対象期間_開始月_10行目',
            'applicablePeriodStartMonth2_12' => '2枚目_続紙_8_算定対象期間_開始月_11行目',
            'applicablePeriodStartMonth2_13' => '2枚目_続紙_8_算定対象期間_開始月_12行目',
            'applicablePeriodStartDay2_2' => '2枚目_続紙_8_算定対象期間_開始日_1行目',
            'applicablePeriodStartDay2_3' => '2枚目_続紙_8_算定対象期間_開始日_2行目',
            'applicablePeriodStartDay2_4' => '2枚目_続紙_8_算定対象期間_開始日_3行目',
            'applicablePeriodStartDay2_5' => '2枚目_続紙_8_算定対象期間_開始日_4行目',
            'applicablePeriodStartDay2_6' => '2枚目_続紙_8_算定対象期間_開始日_5行目',
            'applicablePeriodStartDay2_7' => '2枚目_続紙_8_算定対象期間_開始日_6行目',
            'applicablePeriodStartDay2_8' => '2枚目_続紙_8_算定対象期間_開始日_7行目',
            'applicablePeriodStartDay2_9' => '2枚目_続紙_8_算定対象期間_開始日_8行目',
            'applicablePeriodStartDay2_10' => '2枚目_続紙_8_算定対象期間_開始日_9行目',
            'applicablePeriodStartDay2_11' => '2枚目_続紙_8_算定対象期間_開始日_10行目',
            'applicablePeriodStartDay2_12' => '2枚目_続紙_8_算定対象期間_開始日_11行目',
            'applicablePeriodStartDay2_13' => '2枚目_続紙_8_算定対象期間_開始日_12行目',
            'applicablePeriodEndMonth2_2' => '2枚目_続紙_8_算定対象期間_終了月_1行目',
            'applicablePeriodEndMonth2_3' => '2枚目_続紙_8_算定対象期間_終了月_2行目',
            'applicablePeriodEndMonth2_4' => '2枚目_続紙_8_算定対象期間_終了月_3行目',
            'applicablePeriodEndMonth2_5' => '2枚目_続紙_8_算定対象期間_終了月_4行目',
            'applicablePeriodEndMonth2_6' => '2枚目_続紙_8_算定対象期間_終了月_5行目',
            'applicablePeriodEndMonth2_7' => '2枚目_続紙_8_算定対象期間_終了月_6行目',
            'applicablePeriodEndMonth2_8' => '2枚目_続紙_8_算定対象期間_終了月_7行目',
            'applicablePeriodEndMonth2_9' => '2枚目_続紙_8_算定対象期間_終了月_8行目',
            'applicablePeriodEndMonth2_10' => '2枚目_続紙_8_算定対象期間_終了月_9行目',
            'applicablePeriodEndMonth2_11' => '2枚目_続紙_8_算定対象期間_終了月_10行目',
            'applicablePeriodEndMonth2_12' => '2枚目_続紙_8_算定対象期間_終了月_11行目',
            'applicablePeriodEndMonth2_13' => '2枚目_続紙_8_算定対象期間_終了月_12行目',
            'applicablePeriodEndDay2_2' => '2枚目_続紙_8_算定対象期間_終了日_1行目',
            'applicablePeriodEndDay2_3' => '2枚目_続紙_8_算定対象期間_終了日_2行目',
            'applicablePeriodEndDay2_4' => '2枚目_続紙_8_算定対象期間_終了日_3行目',
            'applicablePeriodEndDay2_5' => '2枚目_続紙_8_算定対象期間_終了日_4行目',
            'applicablePeriodEndDay2_6' => '2枚目_続紙_8_算定対象期間_終了日_5行目',
            'applicablePeriodEndDay2_7' => '2枚目_続紙_8_算定対象期間_終了日_6行目',
            'applicablePeriodEndDay2_8' => '2枚目_続紙_8_算定対象期間_終了日_7行目',
            'applicablePeriodEndDay2_9' => '2枚目_続紙_8_算定対象期間_終了日_8行目',
            'applicablePeriodEndDay2_10' => '2枚目_続紙_8_算定対象期間_終了日_9行目',
            'applicablePeriodEndDay2_11' => '2枚目_続紙_8_算定対象期間_終了日_10行目',
            'applicablePeriodEndDay2_12' => '2枚目_続紙_8_算定対象期間_終了日_11行目',
            'applicablePeriodEndDay2_13' => '2枚目_続紙_8_算定対象期間_終了日_12行目',
            'basicDays2_2' => '2枚目_続紙_9_賃金支払基礎日数_1行目',
            'basicDays2_3' => '2枚目_続紙_9_賃金支払基礎日数_2行目',
            'basicDays2_4' => '2枚目_続紙_9_賃金支払基礎日数_3行目',
            'basicDays2_5' => '2枚目_続紙_9_賃金支払基礎日数_4行目',
            'basicDays2_6' => '2枚目_続紙_9_賃金支払基礎日数_5行目',
            'basicDays2_7' => '2枚目_続紙_9_賃金支払基礎日数_6行目',
            'basicDays2_8' => '2枚目_続紙_9_賃金支払基礎日数_7行目',
            'basicDays2_9' => '2枚目_続紙_9_賃金支払基礎日数_8行目',
            'basicDays2_10' => '2枚目_続紙_9_賃金支払基礎日数_9行目',
            'basicDays2_11' => '2枚目_続紙_9_賃金支払基礎日数_10行目',
            'basicDays2_12' => '2枚目_続紙_9_賃金支払基礎日数_11行目',
            'basicDays2_13' => '2枚目_続紙_9_賃金支払基礎日数_12行目',
            'paymentPeriodStartMonth2_2' => '2枚目_続紙_10_賃金支払対象期間_開始月_1行目',
            'paymentPeriodStartMonth2_3' => '2枚目_続紙_10_賃金支払対象期間_開始月_2行目',
            'paymentPeriodStartMonth2_4' => '2枚目_続紙_10_賃金支払対象期間_開始月_3行目',
            'paymentPeriodStartMonth2_5' => '2枚目_続紙_10_賃金支払対象期間_開始月_4行目',
            'paymentPeriodStartMonth2_6' => '2枚目_続紙_10_賃金支払対象期間_開始月_5行目',
            'paymentPeriodStartMonth2_7' => '2枚目_続紙_10_賃金支払対象期間_開始月_6行目',
            'paymentPeriodStartMonth2_8' => '2枚目_続紙_10_賃金支払対象期間_開始月_7行目',
            'paymentPeriodStartMonth2_9' => '2枚目_続紙_10_賃金支払対象期間_開始月_8行目',
            'paymentPeriodStartMonth2_10' => '2枚目_続紙_10_賃金支払対象期間_開始月_9行目',
            'paymentPeriodStartMonth2_11' => '2枚目_続紙_10_賃金支払対象期間_開始月_10行目',
            'paymentPeriodStartMonth2_12' => '2枚目_続紙_10_賃金支払対象期間_開始月_11行目',
            'paymentPeriodStartMonth2_13' => '2枚目_続紙_10_賃金支払対象期間_開始月_12行目',
            'paymentPeriodStartDay2_2' => '2枚目_続紙_10_賃金支払対象期間_開始日_1行目',
            'paymentPeriodStartDay2_3' => '2枚目_続紙_10_賃金支払対象期間_開始日_2行目',
            'paymentPeriodStartDay2_4' => '2枚目_続紙_10_賃金支払対象期間_開始日_3行目',
            'paymentPeriodStartDay2_5' => '2枚目_続紙_10_賃金支払対象期間_開始日_4行目',
            'paymentPeriodStartDay2_6' => '2枚目_続紙_10_賃金支払対象期間_開始日_5行目',
            'paymentPeriodStartDay2_7' => '2枚目_続紙_10_賃金支払対象期間_開始日_6行目',
            'paymentPeriodStartDay2_8' => '2枚目_続紙_10_賃金支払対象期間_開始日_7行目',
            'paymentPeriodStartDay2_9' => '2枚目_続紙_10_賃金支払対象期間_開始日_8行目',
            'paymentPeriodStartDay2_10' => '2枚目_続紙_10_賃金支払対象期間_開始日_9行目',
            'paymentPeriodStartDay2_11' => '2枚目_続紙_10_賃金支払対象期間_開始日_10行目',
            'paymentPeriodStartDay2_12' => '2枚目_続紙_10_賃金支払対象期間_開始日_11行目',
            'paymentPeriodStartDay2_13' => '2枚目_続紙_10_賃金支払対象期間_開始日_12行目',
            'paymentPeriodEndMonth2_2' => '2枚目_続紙_10_賃金支払対象期間_終了月_1行目',
            'paymentPeriodEndMonth2_3' => '2枚目_続紙_10_賃金支払対象期間_終了月_2行目',
            'paymentPeriodEndMonth2_4' => '2枚目_続紙_10_賃金支払対象期間_終了月_3行目',
            'paymentPeriodEndMonth2_5' => '2枚目_続紙_10_賃金支払対象期間_終了月_4行目',
            'paymentPeriodEndMonth2_6' => '2枚目_続紙_10_賃金支払対象期間_終了月_5行目',
            'paymentPeriodEndMonth2_7' => '2枚目_続紙_10_賃金支払対象期間_終了月_6行目',
            'paymentPeriodEndMonth2_8' => '2枚目_続紙_10_賃金支払対象期間_終了月_7行目',
            'paymentPeriodEndMonth2_9' => '2枚目_続紙_10_賃金支払対象期間_終了月_8行目',
            'paymentPeriodEndMonth2_10' => '2枚目_続紙_10_賃金支払対象期間_終了月_9行目',
            'paymentPeriodEndMonth2_11' => '2枚目_続紙_10_賃金支払対象期間_終了月_10行目',
            'paymentPeriodEndMonth2_12' => '2枚目_続紙_10_賃金支払対象期間_終了月_11行目',
            'paymentPeriodEndMonth2_13' => '2枚目_続紙_10_賃金支払対象期間_終了月_12行目',
            'paymentPeriodEndDay2_2' => '2枚目_続紙_10_賃金支払対象期間_終了日_1行目',
            'paymentPeriodEndDay2_3' => '2枚目_続紙_10_賃金支払対象期間_終了日_2行目',
            'paymentPeriodEndDay2_4' => '2枚目_続紙_10_賃金支払対象期間_終了日_3行目',
            'paymentPeriodEndDay2_5' => '2枚目_続紙_10_賃金支払対象期間_終了日_4行目',
            'paymentPeriodEndDay2_6' => '2枚目_続紙_10_賃金支払対象期間_終了日_5行目',
            'paymentPeriodEndDay2_7' => '2枚目_続紙_10_賃金支払対象期間_終了日_6行目',
            'paymentPeriodEndDay2_8' => '2枚目_続紙_10_賃金支払対象期間_終了日_7行目',
            'paymentPeriodEndDay2_9' => '2枚目_続紙_10_賃金支払対象期間_終了日_8行目',
            'paymentPeriodEndDay2_10' => '2枚目_続紙_10_賃金支払対象期間_終了日_9行目',
            'paymentPeriodEndDay2_11' => '2枚目_続紙_10_賃金支払対象期間_終了日_10行目',
            'paymentPeriodEndDay2_12' => '2枚目_続紙_10_賃金支払対象期間_終了日_11行目',
            'paymentPeriodEndDay2_13' => '2枚目_続紙_10_賃金支払対象期間_終了日_12行目',
            'paymentPeriodBasicDays2_2' => '2枚目_続紙_11_基礎日数_1行目',
            'paymentPeriodBasicDays2_3' => '2枚目_続紙_11_基礎日数_2行目',
            'paymentPeriodBasicDays2_4' => '2枚目_続紙_11_基礎日数_3行目',
            'paymentPeriodBasicDays2_5' => '2枚目_続紙_11_基礎日数_4行目',
            'paymentPeriodBasicDays2_6' => '2枚目_続紙_11_基礎日数_5行目',
            'paymentPeriodBasicDays2_7' => '2枚目_続紙_11_基礎日数_6行目',
            'paymentPeriodBasicDays2_8' => '2枚目_続紙_11_基礎日数_7行目',
            'paymentPeriodBasicDays2_9' => '2枚目_続紙_11_基礎日数_8行目',
            'paymentPeriodBasicDays2_10' => '2枚目_続紙_11_基礎日数_9行目',
            'paymentPeriodBasicDays2_11' => '2枚目_続紙_11_基礎日数_10行目',
            'paymentPeriodBasicDays2_12' => '2枚目_続紙_11_基礎日数_11行目',
            'paymentPeriodBasicDays2_13' => '2枚目_続紙_11_基礎日数_12行目',
            'wageAmountA2_1' => '2枚目_続紙_12_賃金額_A_1行目',
            'wageAmountB2_1' => '2枚目_続紙_12_賃金額_B_1行目',
            'totalWages2_1' => '2枚目_続紙_12_賃金額_計_1行目',
            'wageAmountA2_2' => '2枚目_続紙_12_賃金額_A_2行目',
            'wageAmountB2_2' => '2枚目_続紙_12_賃金額_B_2行目',
            'totalWages2_2' => '2枚目_続紙_12_賃金額_計_2行目',
            'wageAmountA2_3' => '2枚目_続紙_12_賃金額_A_3行目',
            'wageAmountB2_3' => '2枚目_続紙_12_賃金額_B_3行目',
            'totalWages2_3' => '2枚目_続紙_12_賃金額_計_3行目',
            'wageAmountA2_4' => '2枚目_続紙_12_賃金額_A_4行目',
            'wageAmountB2_4' => '2枚目_続紙_12_賃金額_B_4行目',
            'totalWages2_4' => '2枚目_続紙_12_賃金額_計_4行目',
            'wageAmountA2_5' => '2枚目_続紙_12_賃金額_A_5行目',
            'wageAmountB2_5' => '2枚目_続紙_12_賃金額_B_5行目',
            'totalWages2_5' => '2枚目_続紙_12_賃金額_計_5行目',
            'wageAmountA2_6' => '2枚目_続紙_12_賃金額_A_6行目',
            'wageAmountB2_6' => '2枚目_続紙_12_賃金額_B_6行目',
            'totalWages2_6' => '2枚目_続紙_12_賃金額_計_6行目',
            'wageAmountA2_7' => '2枚目_続紙_12_賃金額_A_7行目',
            'wageAmountB2_7' => '2枚目_続紙_12_賃金額_B_7行目',
            'totalWages2_7' => '2枚目_続紙_12_賃金額_計_7行目',
            'wageAmountA2_8' => '2枚目_続紙_12_賃金額_A_8行目',
            'wageAmountB2_8' => '2枚目_続紙_12_賃金額_B_8行目',
            'totalWages2_8' => '2枚目_続紙_12_賃金額_計_8行目',
            'wageAmountA2_9' => '2枚目_続紙_12_賃金額_A_9行目',
            'wageAmountB2_9' => '2枚目_続紙_12_賃金額_B_9行目',
            'totalWages2_9' => '2枚目_続紙_12_賃金額_計_9行目',
            'wageAmountA2_10' => '2枚目_続紙_12_賃金額_A_10行目',
            'wageAmountB2_10' => '2枚目_続紙_12_賃金額_B_10行目',
            'totalWages2_10' => '2枚目_続紙_12_賃金額_計_10行目',
            'wageAmountA2_11' => '2枚目_続紙_12_賃金額_A_11行目',
            'wageAmountB2_11' => '2枚目_続紙_12_賃金額_B_11行目',
            'totalWages2_11' => '2枚目_続紙_12_賃金額_計_11行目',
            'wageAmountA2_12' => '2枚目_続紙_12_賃金額_A_12行目',
            'wageAmountB2_12' => '2枚目_続紙_12_賃金額_B_12行目',
            'totalWages2_12' => '2枚目_続紙_12_賃金額_計_12行目',
            'WageNote2_1' => '2枚目_続紙_13_備考_1行目',
            'WageNote2_2' => '2枚目_続紙_13_備考_2行目',
            'WageNote2_3' => '2枚目_続紙_13_備考_3行目',
            'WageNote2_4' => '2枚目_続紙_13_備考_4行目',
            'WageNote2_5' => '2枚目_続紙_13_備考_5行目',
            'WageNote2_6' => '2枚目_続紙_13_備考_6行目',
            'WageNote2_7' => '2枚目_続紙_13_備考_7行目',
            'WageNote2_8' => '2枚目_続紙_13_備考_8行目',
            'WageNote2_9' => '2枚目_続紙_13_備考_9行目',
            'WageNote2_10' => '2枚目_続紙_13_備考_10行目',
            'WageNote2_11' => '2枚目_続紙_13_備考_11行目',
            'WageNote2_12' => '2枚目_続紙_13_備考_12行目',
            'specialNoteOnWages2_1' => '2枚目_続紙_14_賃金に関する特記事項',
        ];
    }
}
