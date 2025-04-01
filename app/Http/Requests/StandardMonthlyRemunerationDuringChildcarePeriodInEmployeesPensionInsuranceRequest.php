<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use commonHelpers;

class StandardMonthlyRemunerationDuringChildcarePeriodInEmployeesPensionInsuranceRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['employee_name_kana'])) {
            $data['employee_name_kana'] = mb_convert_kana($data['employee_name_kana'], 'KS');
        }
        if (isset($data['employee_name_kanji'])) {
            $data['employee_name_kanji'] = mb_convert_kana($data['employee_name_kanji'], 'AKS');
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AKS');
            $data['employee_address'] = str_replace(['-', '‐', '―'], '－', $data['employee_address']);
        }
        if (isset($data['str_company_address'])) {
            $data['str_company_address'] = mb_convert_kana($data['str_company_address'], 'AKS');
            $data['str_company_address'] = str_replace(['-', '‐', '―'], '－', $data['str_company_address']);
        }
        if (isset($data['str_representative_name'])) {
            $data['str_representative_name'] = mb_convert_kana($data['str_representative_name'], 'AKS');
        }
        if (isset($data['labor_and_social_security_attorney_name'])) {
            $data['labor_and_social_security_attorney_name'] = mb_convert_kana($data['labor_and_social_security_attorney_name'], 'AKS');
        }
        if (isset($data['child_name_kana'])) {
            $data['child_name_kana'] = mb_convert_kana($data['child_name_kana'], 'KS');
        }
        if (isset($data['child_name_kanji'])) {
            $data['child_name_kanji'] = mb_convert_kana($data['child_name_kanji'], 'AKS');
        }

        $this->merge($data);

        return $data;
    }

    public function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            'file_certificate_of_family_register' => 'required_if:radio_file_certificate_of_family_register,2|file|mimes:jpg,pdf|max:50000',
            'file_certificate_of_residence' => 'required_if:radio_file_certificate_of_residence,2|file|mimes:jpg,pdf|max:50000',
            'file_other' => 'nullable|required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            'input_file_other' => 'nullable|required_if:radio_file_other,2,1|string|max:255',
            'submission_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'submission_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'submission_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'office_reference_code_prefecture' => 'string|regex:/^[0-9]{2}$/u',
            'office_reference_code_city' => 'string|max:4|regex:/^[ぁ-んァ-ンヴー一-龥々Ａ-Ｚａ-ｚ０-９\ー\-－0-9]{1,4}$/u',
            'office_reference_code_office' => 'string|max:4|regex:/^[ァ-ヶｦ-ﾟ]{1,4}$/u',
            'pension_office_number' => 'string|max:5|regex:/^[0-9]{1,5}$/u',
            'postcode_office_parent' => 'string|regex:/^[0-9]{3}$/u',
            'postcode_office_child' => 'string|regex:/^[0-9]{4}$/u',
            'str_company_address' => ['required', 'string', 'max:75', new FullwidthAndMiscellaneousChars(true)],
            'str_company_name' => ['required', 'string', 'max:50', new FullwidthAndMiscellaneousChars(true)],
            'str_representative_name' => ['required', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
            'tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'string|regex:/^[0-9]{1,4}$/u',
            'tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'labor_and_social_security_attorney_name' => ['nullable', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
            'insurer_reference_num' => 'string|max:6|regex:/^[0-9]{1,6}$/u',
            'emp_mynumber_or_pension_num' => 'nullable|string|regex:/^[0-9]{10,12}$/u',
            'employee_name_kana' => ['required', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
            'employee_name_kanji' => ['required', 'string', 'max:12', new FullwidthAndMiscellaneousChars(true)],
            'employee_birth_era' => 'int|in:5,7,9',
            'employee_birth_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'employee_birth_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'employee_birth_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employee_sex' => 'int|in:1,2',
            'child_name_kana' => ['nullable', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
            'child_name_kanji' => ['nullable', 'string', 'max:12', new FullwidthAndMiscellaneousChars(true)],
            'child_birth_era' => 'int|in:7,9',
            'child_birth_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'child_birth_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'child_birth_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'child_mynumber_or_pension_num' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'relationship_comfirm' => 'nullable|string|max:3|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'applied_confirm' => 'nullable|string|in:はい,いいえ',
            'branch_confirm' => 'string|in:有,無',
            'branch_postcode_parent' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'branch_postcode_child' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'branch_address' => ['nullable', 'string', 'max:75', new FullwidthAndMiscellaneousChars(true)],
            'branch_name' => ['nullable', 'string', 'max:50', new FullwidthAndMiscellaneousChars(true)],
            'childcare_start_era' => 'nullable|int|in:7,9',
            'childcare_start_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_era,childcare_start_month,childcare_start_day,aply_childcare_exception_start_era,aply_childcare_exception_start_year,aply_childcare_exception_start_month,aply_childcare_exception_start_day',
            'childcare_start_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_era,childcare_start_year,childcare_start_day,aply_childcare_exception_start_era,aply_childcare_exception_start_year,aply_childcare_exception_start_month,aply_childcare_exception_start_day',
            'childcare_start_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_era,childcare_start_year,childcare_start_month,aply_childcare_exception_start_era,aply_childcare_exception_start_year,aply_childcare_exception_start_month,aply_childcare_exception_start_day',
            'aply_childcare_exception_start_era' => 'nullable|int|in:7,9',
            'aply_childcare_exception_start_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:aply_childcare_exception_start_era,aply_childcare_exception_start_month,aply_childcare_exception_start_day',
            'aply_childcare_exception_start_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:aply_childcare_exception_start_era,aply_childcare_exception_start_year,aply_childcare_exception_start_day',
            'aply_childcare_exception_start_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:aply_childcare_exception_start_era,aply_childcare_exception_start_year,aply_childcare_exception_start_month',
            'apply_note' => ['nullable', 'string', 'max:117', new FullwidthAndMiscellaneousChars(true)],
            'end_childcare_exception_start_era' => 'nullable|int|in:7,9',
            'end_childcare_exception_start_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:end_childcare_exception_start_era,end_childcare_exception_start_month,end_childcare_exception_start_day,childcare_exception_end_era,childcare_exception_end_year,childcare_exception_end_month,childcare_exception_end_day',
            'end_childcare_exception_start_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:end_childcare_exception_start_era,end_childcare_exception_start_year,end_childcare_exception_start_day,childcare_exception_end_era,childcare_exception_end_year,childcare_exception_end_month,childcare_exception_end_day',
            'end_childcare_exception_start_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:end_childcare_exception_start_era,end_childcare_exception_start_year,end_childcare_exception_start_month,childcare_exception_end_era,childcare_exception_end_year,childcare_exception_end_month,childcare_exception_end_day',
            'childcare_exception_end_era' => 'nullable|int|in:7,9',
            'childcare_exception_end_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:childcare_exception_end_era,childcare_exception_end_month,childcare_exception_end_day,end_childcare_exception_start_era,end_childcare_exception_start_year,end_childcare_exception_start_month,end_childcare_exception_start_day',
            'childcare_exception_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:childcare_exception_end_era,childcare_exception_end_year,childcare_exception_end_day,end_childcare_exception_start_era,end_childcare_exception_start_year,end_childcare_exception_start_month,end_childcare_exception_start_day',
            'childcare_exception_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:childcare_exception_end_era,childcare_exception_end_year,childcare_exception_end_month,end_childcare_exception_start_era,end_childcare_exception_start_year,end_childcare_exception_start_month,end_childcare_exception_start_day',
            'end_note' => ['nullable', 'string', 'max:117', new FullwidthAndMiscellaneousChars(true)],
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $empBirthdayEra = $data['employee_birth_era'] ?? "";
            $empBirthdayYear = $data['employee_birth_year'] ?? "";
            $empBirthdayMonth = $data['employee_birth_month'] ?? "";
            $empBirthdayDay = $data['employee_birth_day'] ?? "";
            $cldBirthdayEra = $data['child_birth_era'] ?? "";
            $cldBirthdayYear = $data['child_birth_year'] ?? "";
            $cldBirthdayMonth = $data['child_birth_month'] ?? "";
            $cldBirthdayDay = $data['child_birth_day'] ?? "";
            $childCareStartEra = $data['childcare_start_era'] ?? "";
            $childCareStartYear = $data['childcare_start_year'] ?? "";
            $childCareStartMonth = $data['childcare_start_month'] ?? "";
            $childCareStartDay = $data['childcare_start_day'] ?? "";
            $aplyChildcareExceptionStartEra = $data['aply_childcare_exception_start_era'] ?? "";
            $aplyChildcareExceptionStartYear = $data['aply_childcare_exception_start_year'] ?? "";
            $aplyChildcareExceptionStartMonth = $data['aply_childcare_exception_start_month'] ?? "";
            $aplyChildcareExceptionStartDay = $data['aply_childcare_exception_start_day'] ?? "";
            $endChildcareExceptionStartEra = $data['end_childcare_exception_start_era'] ?? "";
            $endChildcareExceptionStartYear = $data['end_childcare_exception_start_year'] ?? "";
            $endChildcareExceptionStartMonth = $data['end_childcare_exception_start_month'] ?? "";
            $endChildcareExceptionStartDay = $data['end_childcare_exception_start_day'] ?? "";
            $childcareExceptionEndEra = $data['childcare_exception_end_era'] ?? "";
            $childcareExceptionEndYear = $data['childcare_exception_end_year'] ?? "";
            $childcareExceptionEndMonth = $data['childcare_exception_end_month'] ?? "";
            $childcareExceptionEndDay = $data['childcare_exception_end_day'] ?? "";
            $branchConfirm = $data['branch_confirm'] ?? "";
            $targetMonthBranchPostCodeParent = $data['branch_postcode_parent'] ?? "";
            $targetMonthBranchPostCodechild = $data['branch_postcode_child'] ?? "";
            $targetMonthBranchAddress = $data['branch_address'] ?? "";
            $targetMonthBranchName = $data['branch_address'] ?? "";
            $targetMyNum = $data['emp_mynumber_or_pension_num'] ?? "";
            $today = Carbon::today();

            if ($empBirthdayEra === '5') {
                if (
                    ($empBirthdayYear == 1 && ($empBirthdayMonth < 12 || ($empBirthdayMonth == 12 && $empBirthdayDay < 25))) ||
                    ($empBirthdayYear == 64 && ($empBirthdayMonth > 1 || ($empBirthdayMonth == 1 && $empBirthdayDay > 7))) ||
                    ($empBirthdayYear > 64)
                ) {
                    $validator->errors()->add('employee_birth_day', '⑧被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($empBirthdayEra === '7') {
                if (
                    ($empBirthdayYear == 1 && ($empBirthdayMonth < 1 || ($empBirthdayMonth == 1 && $empBirthdayDay < 8))) ||
                    ($empBirthdayYear == 31 && ($empBirthdayMonth > 4 || ($empBirthdayMonth == 4 && $empBirthdayDay > 30))) ||
                    ($empBirthdayYear > 31)
                ) {
                    $validator->errors()->add('employee_birth_day', '⑧被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($empBirthdayEra === '9') {
                if ($empBirthdayYear == 1 && ($empBirthdayMonth < 5 || ($empBirthdayMonth == 5 && $empBirthdayDay < 1))) {
                    $validator->errors()->add('employee_birth_day', '⑧被保険者生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($empBirthdayYear) && !empty($empBirthdayMonth) && !empty($empBirthdayDay)) {
                $targetEra = $empBirthdayEra;
                $targetYear = $empBirthdayYear;
                $targetSeireki = $this->convertToWareki($targetEra, $targetYear);
                $targetDate = Carbon::parse($targetSeireki . "-" . $empBirthdayMonth . "-" . $empBirthdayDay);
                if (ctype_digit($empBirthdayMonth)) {
                    if (!checkdate($empBirthdayMonth, $empBirthdayDay, (int)$targetSeireki)) {
                        $validator->errors()->add('employee_birth_day', '⑧被保険者生年月日は正しい日付を入力してください。');
                    }
                }
                if ($targetDate->gt($today)) {
                    $validator->errors()->add('employee_birth_day', '⑧被保険者生年月日に未来の日付を入力しないでください。');
                }
            }

            if ($cldBirthdayEra === '7') {
                if (
                    ($cldBirthdayYear == 1 && ($cldBirthdayMonth < 1 || ($cldBirthdayMonth == 1 && $cldBirthdayDay < 8))) ||
                    ($cldBirthdayYear == 31 && ($cldBirthdayMonth > 4 || ($cldBirthdayMonth == 4 && $cldBirthdayDay > 30))) ||
                    ($cldBirthdayYear > 31)
                ) {
                    $validator->errors()->add('child_birth_day', '⑪子の生年月日は正しい日付を入力してください。');
                }
            } elseif ($cldBirthdayEra === '9') {
                if ($cldBirthdayYear == 1 && ($cldBirthdayMonth < 5 || ($cldBirthdayMonth == 5 && $cldBirthdayDay < 1))) {
                    $validator->errors()->add('child_birth_day', '⑪子の生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($cldBirthdayYear) && !empty($cldBirthdayMonth) && !empty($cldBirthdayDay)) {
                $targetEra = $cldBirthdayEra;
                $targetYear = $cldBirthdayYear;
                $targetSeireki = $this->convertToWareki($targetEra, $targetYear);
                $targetDate = Carbon::parse($targetSeireki . "-" . $cldBirthdayMonth . "-" . $cldBirthdayDay);
                if (ctype_digit($cldBirthdayMonth)) {
                    if (!checkdate($cldBirthdayMonth, $cldBirthdayDay, (int)$targetSeireki)) {
                        $validator->errors()->add('child_birth_day', '⑪子の生年月日は正しい日付を入力してください。');
                    }
                }
                if ($targetDate->gt($today)) {
                    $validator->errors()->add('child_birth_day', '⑪子の生年月日に未来の日付を入力しないでください。');
                }
            }

            if (empty($childCareStartEra)) {
                if (!empty($childCareStartYear) || !empty($childCareStartMonth) || !empty($childCareStartDay)) {
                    $validator->errors()->add('childcare_start_era', '申出欄 ー ⑰養育開始年月日_元号を選択してください。');
                }
            } else {
                if (
                    ($childCareStartEra === '7' && (
                        ($childCareStartYear == 1 && ($childCareStartMonth < 1 || ($childCareStartMonth == 1 && $childCareStartDay < 8))) ||
                        ($childCareStartYear == 31 && ($childCareStartMonth > 4 || ($childCareStartMonth == 4 && $childCareStartDay > 30))) ||
                        ($childCareStartYear > 31)
                    )) ||
                    ($childCareStartEra === '9' && $childCareStartYear == 1 && ($childCareStartMonth < 5 || ($childCareStartMonth == 5 && $childCareStartDay < 1)))
                ) {
                    $validator->errors()->add('childcare_start_day', '申出欄 ー ⑰養育開始年月日は正しい日付を入力してください。');
                } else if (!empty($childCareStartYear) && !empty($childCareStartMonth) && !empty($childCareStartDay)) {
                    $targetSeireki = $this->convertToWareki($childCareStartEra, $childCareStartYear);
                    $targetDate = Carbon::parse($targetSeireki . "-" . $childCareStartMonth . "-" . $childCareStartDay);
                    if (!checkdate($childCareStartMonth, $childCareStartDay, (int)$targetSeireki)) {
                        $validator->errors()->add('childcare_start_day', '申出欄 ー ⑰養育開始年月日は正しい日付を入力してください。');
                    }
                    if ($targetDate->gt($today)) {
                        $validator->errors()->add('childcare_start_day', '申出欄 ー ⑰養育開始年月日に未来の日付を入力しないでください。');
                    }
                }
            }

            if (empty($aplyChildcareExceptionStartEra)) {
                if (!empty($aplyChildcareExceptionStartYear) || !empty($aplyChildcareExceptionStartMonth) || !empty($aplyChildcareExceptionStartDay)) {
                    $validator->errors()->add('aply_childcare_exception_start_era', '申出欄 ー ⑱養育特例開始年月日_元号を選択してください。');
                }
            } else {
                if (
                    ($aplyChildcareExceptionStartEra === '7' && (
                        ($aplyChildcareExceptionStartYear == 1 && ($aplyChildcareExceptionStartMonth < 1 || ($aplyChildcareExceptionStartMonth == 1 && $aplyChildcareExceptionStartDay < 8))) ||
                        ($aplyChildcareExceptionStartYear == 31 && ($aplyChildcareExceptionStartMonth > 4 || ($aplyChildcareExceptionStartMonth == 4 && $aplyChildcareExceptionStartDay > 30))) ||
                        ($aplyChildcareExceptionStartYear > 31)
                    )) ||
                    ($aplyChildcareExceptionStartEra === '9' && $aplyChildcareExceptionStartYear == 1 && ($aplyChildcareExceptionStartMonth < 5 || ($aplyChildcareExceptionStartMonth == 5 && $aplyChildcareExceptionStartDay < 1)))
                ) {
                    $validator->errors()->add('aply_childcare_exception_start_day', '申出欄 ー ⑱養育特例開始年月日は正しい日付を入力してください。');
                } else if (!empty($aplyChildcareExceptionStartYear) && !empty($aplyChildcareExceptionStartMonth) && !empty($aplyChildcareExceptionStartDay)) {
                    $targetSeireki = $this->convertToWareki($aplyChildcareExceptionStartEra, $aplyChildcareExceptionStartYear);
                    $targetDate = Carbon::parse($targetSeireki . "-" . $aplyChildcareExceptionStartMonth . "-" . $aplyChildcareExceptionStartDay);
                    if (!checkdate($aplyChildcareExceptionStartMonth, $aplyChildcareExceptionStartDay, (int)$targetSeireki)) {
                        $validator->errors()->add('aply_childcare_exception_start_day', '申出欄 ー ⑱養育特例開始年月日は正しい日付を入力してください。');
                    }
                    if ($targetDate->gt($today)) {
                        $validator->errors()->add('aply_childcare_exception_start_day', '申出欄 ー ⑱養育特例開始年月日に未来の日付を入力しないでください。');
                    }
                }
            }

            if (empty($endChildcareExceptionStartEra)) {
                if (!empty($endChildcareExceptionStartYear) || !empty($endChildcareExceptionStartMonth) || !empty($endChildcareExceptionStartDay)) {
                    $validator->errors()->add('end_childcare_exception_start_era', '終了欄 ー ⑳養育特例開始年月日_元号を選択してください。');
                }
            } else {
                if (
                    ($endChildcareExceptionStartEra === '7' && (
                        ($endChildcareExceptionStartYear == 1 && ($endChildcareExceptionStartMonth < 1 || ($endChildcareExceptionStartMonth == 1 && $endChildcareExceptionStartDay < 8))) ||
                        ($endChildcareExceptionStartYear == 31 && ($endChildcareExceptionStartMonth > 4 || ($endChildcareExceptionStartMonth == 4 && $endChildcareExceptionStartDay > 30))) ||
                        ($endChildcareExceptionStartYear > 31)
                    )) ||
                    ($endChildcareExceptionStartEra === '9' && $endChildcareExceptionStartYear == 1 && ($endChildcareExceptionStartMonth < 5 || ($endChildcareExceptionStartMonth == 5 && $endChildcareExceptionStartDay < 1)))
                ) {
                    $validator->errors()->add('end_childcare_exception_start_day', '終了欄 ー ⑳養育特例開始年月日は正しい日付を入力してください。');
                } else if (!empty($endChildcareExceptionStartYear) && !empty($endChildcareExceptionStartMonth) && !empty($endChildcareExceptionStartDay)) {
                    $targetSeireki = $this->convertToWareki($endChildcareExceptionStartEra, $endChildcareExceptionStartYear);
                    $targetDate = Carbon::parse($targetSeireki . "-" . $endChildcareExceptionStartMonth . "-" . $endChildcareExceptionStartDay);
                    if (!checkdate($endChildcareExceptionStartMonth, $endChildcareExceptionStartDay, (int)$targetSeireki)) {
                        $validator->errors()->add('end_childcare_exception_start_day', '終了欄 ー ⑳養育特例開始年月日は正しい日付を入力してください。');
                    }
                    if ($targetDate->gt($today)) {
                        $validator->errors()->add('end_childcare_exception_start_day', '終了欄 ー ⑳養育特例開始年月日に未来の日付を入力しないでください。');
                    }
                }
            }

            if (empty($childcareExceptionEndEra)) {
                if (!empty($childcareExceptionEndYear) || !empty($childcareExceptionEndMonth) || !empty($childcareExceptionEndDay)) {
                    $validator->errors()->add('childcare_exception_end_era', '終了欄 ー ㉑養育特例終了年月日_元号を選択してください。');
                }
            } else {
                if (
                    ($childcareExceptionEndEra === '7' && (
                        ($childcareExceptionEndYear == 1 && ($childcareExceptionEndMonth < 1 || ($childcareExceptionEndMonth == 1 && $childcareExceptionEndDay < 8))) ||
                        ($childcareExceptionEndYear == 31 && ($childcareExceptionEndMonth > 4 || ($childcareExceptionEndMonth == 4 && $childcareExceptionEndDay > 30))) ||
                        ($childcareExceptionEndYear > 31)
                    )) ||
                    ($childcareExceptionEndEra === '9' && $childcareExceptionEndYear == 1 && ($childcareExceptionEndMonth < 5 || ($childcareExceptionEndMonth == 5 && $childcareExceptionEndDay < 1)))
                ) {
                    $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日は正しい日付を入力してください。');
                } else if (!empty($childcareExceptionEndYear) && !empty($childcareExceptionEndMonth) && !empty($childcareExceptionEndDay)) {
                    $targetSeireki = $this->convertToWareki($childcareExceptionEndEra, $childcareExceptionEndYear);
                    $targetDate = Carbon::parse($targetSeireki . "-" . $childcareExceptionEndMonth . "-" . $childcareExceptionEndDay);
                    if (!checkdate($childcareExceptionEndMonth, $childcareExceptionEndDay, (int)$targetSeireki)) {
                        $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日は正しい日付を入力してください。');
                    }
                    if ($targetDate->gt($today)) {
                        $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日に未来の日付を入力しないでください。');
                    }
                }
            }
            
            if (!empty($aplyChildcareExceptionStartEra) && !empty($aplyChildcareExceptionStartYear) && !empty($aplyChildcareExceptionStartMonth) && !empty($aplyChildcareExceptionStartDay)
            && !empty($childcareExceptionEndEra) && !empty($childcareExceptionEndYear) && !empty($childcareExceptionEndMonth) && !empty($childcareExceptionEndDay)) {
                $startYear = commonHelpers::convertJapaneseCalendarToWesternCalendar($aplyChildcareExceptionStartEra, Carbon::create($aplyChildcareExceptionStartYear,$aplyChildcareExceptionStartMonth,$aplyChildcareExceptionStartDay));
                $endYear = commonHelpers::convertJapaneseCalendarToWesternCalendar($childcareExceptionEndEra, Carbon::create($childcareExceptionEndYear,$childcareExceptionEndMonth,$childcareExceptionEndDay));
                if ($endYear < $startYear) {
                    $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日は⑳養育特例開始年月日以降を入力してください。');
                } elseif ($endYear == $startYear) {
                    if ($childcareExceptionEndMonth < $aplyChildcareExceptionStartMonth) {
                        $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日は⑳養育特例開始年月日以降を入力してください。');
                    } elseif ($childcareExceptionEndMonth == $aplyChildcareExceptionStartMonth) {
                        if ($childcareExceptionEndDay < $aplyChildcareExceptionStartDay) {
                            $validator->errors()->add('childcare_exception_end_day', '終了欄 ー ㉑養育特例終了年月日は⑳養育特例開始年月日以降を入力してください。');
                        }
                    }
                }
            }

            if ($branchConfirm === "無") {
                if (empty($targetMonthBranchPostCodeParent)) {
                    $validator->errors()->add('branch_postcode_parent', '⑯該当月事業所郵便番号_親番号を入力してください。');
                }
                if (empty($targetMonthBranchPostCodechild)) {
                    $validator->errors()->add('branch_postcode_child', '⑯該当月事業所郵便番号_子番号を入力してください。');
                }
                if (empty($targetMonthBranchAddress)) {
                    $validator->errors()->add('branch_address', '⑯該当月事業所所在地を入力してください。');
                }
                if (empty($targetMonthBranchName)) {
                    $validator->errors()->add('branch_name', '⑯該当月事業所名称を入力してください。');
                }
            }
            if (strlen($targetMyNum) === 11) {
                $validator->errors()->add('branch_name', '⑥被保険者のマイナンバー(または基礎年金番号)に正しい値を入力してください。');
            }
        });
    }

    public function convertToWareki($targetEra, $targetYear)
    {
        switch ($targetEra) {
            case '5':
                $seireki = 1925 + $targetYear;
                break;
            case '7':
                $seireki = 1988 + $targetYear;
                break;
            case '9':
                $seireki = 2018 + $targetYear;
                break;
        }

        return $seireki;
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'childcare_start_era.required_with' => '申出欄_⑰養育開始年月日_年号を入力してください。',
            'childcare_start_year.required_with' => '申出欄_⑰養育開始年月日_年を入力してください。',
            'childcare_start_month.required_with' => '申出欄_⑰養育開始年月日_月を入力してください。',
            'childcare_start_day.required_with' => '申出欄_⑰養育開始年月日_日を入力してください。',
            'aply_childcare_exception_start_era.required_with' => '申出欄_⑱養育特例開始年月日_年号を入力してください。',
            'aply_childcare_exception_start_year.required_with' => '申出欄_⑱養育特例開始年月日_年を入力してください。',
            'aply_childcare_exception_start_month.required_with' => '申出欄_⑱養育特例開始年月日_月を入力してください。',
            'aply_childcare_exception_start_day.required_with' => '申出欄_⑱養育特例開始年月日_日を入力してください。',
            'end_childcare_exception_start_era.required_with' => '終了欄_⑳養育特例開始年月日_年号を入力してください。',
            'end_childcare_exception_start_year.required_with' => '終了欄_⑳養育特例開始年月日_年を入力してください。',
            'end_childcare_exception_start_month.required_with' => '終了欄_⑳養育特例開始年月日_月を入力してください。',
            'end_childcare_exception_start_day.required_with' => '終了欄_⑳養育特例開始年月日_日を入力してください。',
            'childcare_exception_end_era.required_with' => '終了欄_㉑養育特例終了年月日_年号を入力してください。',
            'childcare_exception_end_year.required_with' => '終了欄_㉑養育特例終了年月日_年を入力してください。',
            'childcare_exception_end_month.required_with' => '終了欄_㉑養育特例終了年月日_月を入力してください。',
            'childcare_exception_end_day.required_with' => '終了欄_㉑養育特例終了年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_certificate_of_family_register' => '戸籍謄(抄)本または戸籍記載事項証明書',
            'file_certificate_of_residence' => '住民票',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'submission_year' => '提出年',
            'submission_month' => '提出月',
            'submission_day' => '提出日',
            'office_reference_code_prefecture' => '①事業所整理記号-都道府県コード',
            'office_reference_code_city' => '①事業所整理記号-郡市区記号',
            'office_reference_code_office' => '①事業所整理記号-事業所記号',
            'pension_office_number' => '②事業所番号',
            'postcode_office_parent' => '③郵便番号_親番号',
            'postcode_office_child' => '③便番号_子番号',
            'str_company_address' => '③事業所所在地',
            'str_company_name' => '③事業所名称',
            'str_representative_name' => '③事業主氏名',
            'tel_area_code' => '③電話番号(市外局番)',
            'tel_city_code' => '③電話番号(市内局番)',
            'tel_subscriber_code' => '③電話番号(加入者番号)',
            'labor_and_social_security_attorney_name' => '④社会保険労務士記載欄',
            'insurer_reference_num' => '⑤保険者整理番号',
            'emp_mynumber_or_pension_num' => '⑥被保険者のマイナンバー(または基礎年金番号)',
            'employee_name_kana' => '⑦被保険者氏名(カナ)',
            'employee_name_kanji' => '⑦被保険者氏名',
            'employee_birth_era' =>  '⑧被保険者生年月日_年号',
            'employee_birth_year' => '⑧被保険者生年月日_年',
            'employee_birth_month' => '⑧被保険者生年月日_月',
            'employee_birth_day' => '⑧被保険者生年月日_日',
            'employee_sex' => '⑨被保険者性別',
            'child_name_kana' => '⑩子氏名(カナ)',
            'child_name_kanji' => '⑩子氏名',
            'child_birth_era' => '⑪子生年月日_年号',
            'child_birth_year' => '⑪子生年月日_年',
            'child_birth_month' => '⑪子生年月日_月',
            'child_birth_day' => '⑪子生年月日_日',
            'child_mynumber_or_pension_num' => '⑫子マイナンバー',
            'relationship_comfirm' => '⑬事業主続柄確認',
            'applied_confirm' => '⑭過去の申出の確認',
            'branch_confirm' => '⑮事業所確認',
            'branch_postcode_parent' => '⑯該当月事業所郵便番号_親番号',
            'branch_postcode_child' => '⑯該当月事業所郵便番号_子番号',
            'branch_address' => '⑯該当月事業所所在地',
            'branch_name' => '⑯該当月事業所名称',
            'childcare_start_era' => '⑰申出欄_養育開始年月日_年号',
            'childcare_start_year' => '⑰申出欄_養育開始年月日_年',
            'childcare_start_month' => '⑰申出欄_養育開始年月日_月',
            'childcare_start_day' => '⑰申出欄_養育開始年月日_日',
            'aply_childcare_exception_start_era' => '⑱申出欄_養育特例開始年月日_年号',
            'aply_childcare_exception_start_year' => '⑱申出欄_養育特例開始年月日_年',
            'aply_childcare_exception_start_month' => '⑱申出欄_養育特例開始年月日_月',
            'aply_childcare_exception_start_day' => '⑱申出欄_養育特例開始年月日_日',
            'apply_note' => '⑲申出欄_備考',
            'end_childcare_exception_start_era' => '⑳終了欄_養育特例開始年月日_年号',
            'end_childcare_exception_start_year' => '⑳終了欄_養育特例開始年月日_年',
            'end_childcare_exception_start_month' => '⑳終了欄_養育特例開始年月日_月',
            'end_childcare_exception_start_day' => '⑳終了欄_養育特例開始年月日_日',
            'childcare_exception_end_era' => '㉑終了欄_養育特例終了年月日_年号',
            'childcare_exception_end_year' => '㉑終了欄_養育特例終了年月日_年',
            'childcare_exception_end_month' => '㉑終了欄_養育特例終了年月日_月',
            'childcare_exception_end_day' => '㉑終了欄_養育特例終了年月日_日',
            'end_note' => '㉒終了欄_備考',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '中分類（年金事務所）'
        ];
    }
}
