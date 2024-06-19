<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\CurrentUser;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\User;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserModalContent extends Component
{
    public $prefectures;
    public $employee_id = 0;
    public $tab = 0;
    public $profiles = [
        'name' => '',
        'file_path' => '',
        'company_name' => '',
        'branch_name' => '',
        'departments' => [],
        'managerial_position' => ''
    ];
    public $names = [
        'old_last_name' => '',
        'old_first_name' => '',
        'old_last_name_kana' => '',
        'old_first_name_kana' => '',
        'old_last_name_alphabet' => '',
        'old_first_name_alphabet' => '',
        'name_common' => '',
        'name_common_kana' => ''
    ];
    public $names_edit = [
        'old_last_name' => '',
        'old_first_name' => '',
        'old_last_name_kana' => '',
        'old_first_name_kana' => '',
        'old_last_name_alphabet' => '',
        'old_first_name_alphabet' => '',
        'name_common' => '',
        'name_common_kana' => ''
    ];
    public $names_edit_flg = false;

    public $emergency = [
        'emergency_contact1' => '',
        'emergency_relationship1' => '',
        'emergency_tel1' => '',
        'emergency_address_prefecture1' => '',
        'emergency_post_code1' => '',
        'emergency_address_city1' => '',
        'emergency_address_ward1' => '',
        'emergency_address_apartment1' => '',

        'emergency_contact2' => '',
        'emergency_relationship2' => '',
        'emergency_tel2' => '',
        'emergency_address_prefecture2' => '',
        'emergency_post_code2' => '',
        'emergency_address_city2' => '',
        'emergency_address_ward2' => '',
        'emergency_address_apartment2' => '',
    ];
    public $emergency_edit = [
        'emergency_contact1' => '',
        'emergency_relationship1' => '',
        'emergency_tel1' => '',
        'emergency_address_prefecture1' => '',
        'emergency_post_code1' => '',
        'emergency_address_city1' => '',
        'emergency_address_ward1' => '',
        'emergency_address_apartment1' => '',

        'emergency_contact2' => '',
        'emergency_relationship2' => '',
        'emergency_tel2' => '',
        'emergency_address_prefecture2' => '',
        'emergency_post_code2' => '',
        'emergency_address_city2' => '',
        'emergency_address_ward2' => '',
        'emergency_address_apartment2' => '',
    ];
    public $emergency_edit_flg = false;

    public $role_id = '';

    public $login_email = '';
    public $login_email_edit = '';
    public $login_email_edit_flg = false;
    public $login_email_error = false;

    public $login_pass_edit = '';
    public $login_pass_confirm_edit = '';
    public $login_pass_edit_flg = false;
    public $login_pass_valid = ['filled' => true, 'unknown' => true, 'confirm' => true];
    public $login_pass_success = false;
    public function mount()
    {
        $user = Auth::user();
        if (!empty($user)) {
            $employee = CurrentUser::info();
            $this->login_email = $user->email;
            $this->login_email_edit = $this->login_email;
            if (!empty($user) || !empty($employee)) {
                $this->employee_id = $employee->id;
                $this->role_id = $employee->role_id;
                if ($this->role_id !== 999) {
                    $currentCompany = CurrentUser::currentCompany();
                    if (!empty($currentCompany)) $this->profiles['company_name'] = $currentCompany->name;
                    $this->profiles['branch_name'] = $employee->branch->name;
                    $this->profiles['departments'] = Employee_department::select('name')
                        ->where('m_employee_department.delete_flg', 0)
                        ->leftJoin('m_department as d', 'department_id', '=', 'd.id')
                        ->where('employee_id', $employee->id)
                        ->pluck('name')->toArray();
                    $this->profiles['managerial_position'] = $employee->managerial_position()->where('delete_flg', 0)->first();
                } elseif ($this->role_id = 999) {
                    $this->profiles['branch_name'] = "-";
                    $this->profiles['departments'] = ["-"];
                }

                $this->prefectures = Prefecture::all();
                $this->profiles['name'] = $employee->last_name . ' ' . $employee->first_name;
                $this->names = [
                    'old_last_name' => $employee->old_last_name,
                    'old_first_name' => $employee->old_first_name,
                    'old_last_name_kana' => $employee->old_last_name_kana,
                    'old_first_name_kana' => $employee->old_first_name_kana,
                    'old_last_name_alphabet' => $employee->old_last_name_alphabet,
                    'old_first_name_alphabet' => $employee->old_first_name_alphabet,
                    'name_common' => $employee->name_common,
                    'name_common_kana' => $employee->name_common_kana
                ];
                $this->names_edit = $this->names;
                $this->emergency = [
                    'emergency_contact1' => $employee->emergency_contact1,
                    'emergency_relationship1' => $employee->emergency_relationship1,
                    'emergency_tel1' => $employee->emergency_tel1,
                    'emergency_address_prefecture1' => $employee->emergency_address_prefecture1,
                    'emergency_post_code1' => $employee->emergency_post_code1,
                    'emergency_address_city1' => $employee->emergency_address_city1,
                    'emergency_address_ward1' => $employee->emergency_address_ward1,
                    'emergency_address_apartment1' => $employee->emergency_address_apartment1,

                    'emergency_contact2' => $employee->emergency_contact2,
                    'emergency_relationship2' => $employee->emergency_relationship2,
                    'emergency_tel2' => $employee->emergency_tel2,
                    'emergency_address_prefecture2' => $employee->emergency_address_prefecture2,
                    'emergency_post_code2' => $employee->emergency_post_code2,
                    'emergency_address_city2' => $employee->emergency_address_city2,
                    'emergency_address_ward2' => $employee->emergency_address_ward2,
                    'emergency_address_apartment2' => $employee->emergency_address_apartment2,
                ];
                $this->emergency_edit = $this->emergency;
            }
        }
    }
    public function render()
    {
        return view('livewire.user-modal-content');
    }

    public function tabPage($num)
    {
        $this->namesCancel();
        $this->tab = $num;
    }

    public function namesCancel()
    {
        $this->names_edit = $this->names;
        $this->names_edit_flg = false;
        $this->resetErrorBag();
    }

    public function namesEdit()
    {
        $this->names_edit_flg = true;
    }

    public function namesSave()
    {

        $validated = $this->validate([
            'names_edit.old_last_name' => 'nullable|string|max:255',
            'names_edit.old_first_name' => 'nullable|string|max:255',
            'names_edit.old_last_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'names_edit.old_first_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'names_edit.old_last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'names_edit.old_first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'names_edit.name_common' => 'nullable|string|max:255',
            'names_edit.name_common_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
        ]);

        Employee::where('id', $this->employee_id)->update([
            'old_last_name' => $this->names_edit['old_last_name'],
            'old_first_name' => $this->names_edit['old_first_name'],
            'old_last_name_kana' => $this->names_edit['old_last_name_kana'],
            'old_first_name_kana' => $this->names_edit['old_first_name_kana'],
            'old_last_name_alphabet' => $this->names_edit['old_last_name_alphabet'],
            'old_first_name_alphabet' => $this->names_edit['old_first_name_alphabet'],
            'name_common' => $this->names_edit['name_common'],
            'name_common_kana' => $this->names_edit['name_common_kana']
        ]);
        $this->names = $this->names_edit;
        $this->names_edit_flg = false;
    }

    public function emergencyCancel()
    {
        $this->emergency_edit = $this->emergency;
        $this->emergency_edit_flg = false;
        $this->resetErrorBag();
    }

    public function emergencyEdit()
    {
        $this->emergency_edit_flg = true;
    }

    public function emergencySave()
    {

        $validated = $this->validate([
            'emergency_edit.emergency_contact1' => 'nullable|string|max:255',
            'emergency_edit.emergency_relationship1' => 'nullable|string|max:255',
            'emergency_edit.emergency_tel1' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_address_prefecture1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_post_code1' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_address_city1' => 'nullable|string|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_edit.emergency_address_ward1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_edit.emergency_address_apartment1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',

            'emergency_edit.emergency_contact2' => 'nullable|string|max:255',
            'emergency_edit.emergency_relationship2' => 'nullable|string|max:255',
            'emergency_edit.emergency_tel2' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_address_prefecture2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_post_code2' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_edit.emergency_address_city2' => 'nullable|string|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_edit.emergency_address_ward2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_edit.emergency_address_apartment2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
        ]);

        $this->emergency_edit['emergency_contact1'] = mb_convert_kana($this->emergency_edit['emergency_contact1'], 'RANKS');
        $this->emergency_edit['emergency_relationship1'] = mb_convert_kana($this->emergency_edit['emergency_relationship1'], 'RANKS');
        $this->emergency_edit['emergency_address_city1'] = mb_convert_kana($this->emergency_edit['emergency_address_city1'], 'RANKS');
        $this->emergency_edit['emergency_address_ward1'] = mb_convert_kana($this->emergency_edit['emergency_address_ward1'], 'RANKS');
        $this->emergency_edit['emergency_address_apartment1'] = mb_convert_kana($this->emergency_edit['emergency_address_apartment1'], 'RANKS');
        $this->emergency_edit['emergency_contact2'] = mb_convert_kana($this->emergency_edit['emergency_contact2'], 'RANKS');
        $this->emergency_edit['emergency_relationship2'] = mb_convert_kana($this->emergency_edit['emergency_relationship2'], 'RANKS');
        $this->emergency_edit['emergency_address_city2'] = mb_convert_kana($this->emergency_edit['emergency_address_city2'], 'RANKS');
        $this->emergency_edit['emergency_address_ward2'] = mb_convert_kana($this->emergency_edit['emergency_address_ward2'], 'RANKS');
        $this->emergency_edit['emergency_address_apartment2'] = mb_convert_kana($this->emergency_edit['emergency_address_apartment2'], 'RANKS');

        Employee::where('id', $this->employee_id)->update([
            'emergency_contact1' => $this->emergency_edit['emergency_contact1'],
            'emergency_relationship1' => $this->emergency_edit['emergency_relationship1'],
            'emergency_tel1' => $this->emergency_edit['emergency_tel1'],
            'emergency_address_prefecture1' => $this->emergency_edit['emergency_address_prefecture1'],
            'emergency_post_code1' => $this->emergency_edit['emergency_post_code1'],
            'emergency_address_city1' => $this->emergency_edit['emergency_address_city1'],
            'emergency_address_ward1' => $this->emergency_edit['emergency_address_ward1'],
            'emergency_address_apartment1' => $this->emergency_edit['emergency_address_apartment1'],

            'emergency_contact2' => $this->emergency_edit['emergency_contact2'],
            'emergency_relationship2' => $this->emergency_edit['emergency_relationship2'],
            'emergency_tel2' => $this->emergency_edit['emergency_tel2'],
            'emergency_address_prefecture2' => $this->emergency_edit['emergency_address_prefecture2'],
            'emergency_post_code2' => $this->emergency_edit['emergency_post_code2'],
            'emergency_address_city2' => $this->emergency_edit['emergency_address_city2'],
            'emergency_address_ward2' => $this->emergency_edit['emergency_address_ward2'],
            'emergency_address_apartment2' => $this->emergency_edit['emergency_address_apartment2'],
        ]);
        $this->emergency = $this->emergency_edit;
        $this->emergency_edit_flg = false;
    }

    public function loginEmailCancel()
    {
        $this->login_email_edit = $this->login_email;
        $this->login_email_edit_flg = false;
        $this->login_email_error = false;
        $this->resetErrorBag();
    }

    public function loginEmailEdit()
    {
        $this->login_email_edit_flg = true;
    }

    public function loginEmailSave()
    {
        $validated = $this->validate([
            'login_email_edit' => 'required|email|max:255',
        ]);

        if (User::where('email', $this->login_email_edit)->exists()) {
            $this->login_email_error = true;
            return;
        }

        User::where('employee_id', $this->employee_id)->update([
            'email' => $this->login_email_edit,
        ]);
        $this->login_email = $this->login_email_edit;
        $this->login_email_edit_flg = false;
    }

    public function loginPassSave()
    {
        $validated = $this->validate([
            'login_pass_edit' => 'required|min:6|max:20|regex:/^[!-~]+$/',
            'login_pass_confirm_edit' => 'required|min:6|max:20|regex:/^[!-~]+$/',
        ]);

        $this->login_pass_success = false;
        $empty = empty($this->login_pass_edit) || empty($this->login_pass_confirm_edit);
        $isEqualconfirm = $this->login_pass_edit === $this->login_pass_confirm_edit;
        $unknown = true;
        if (!$empty && $isEqualconfirm) {
            try {
                $user = Auth::user();
                $user->forceFill([
                    'password' => Hash::make($this->login_pass_confirm_edit)
                ]);
                $user->save();
                $this->login_pass_edit = '';
                $this->login_pass_confirm_edit = '';
                $this->login_pass_success = true;
            } catch (\Exception $err) {
                $unknown = false;
            }
        }

        $this->login_pass_valid = ['filled' => !$empty, 'unknown' => $unknown, 'confirm' => $isEqualconfirm];
    }

    public function loginPassCancel()
    {
        $this->login_pass_edit = '';
        $this->login_pass_confirm_edit = '';
        $this->login_pass_success = true;
        $this->login_pass_edit_flg = false;
        $this->resetErrorBag();
    }

    public function loginPassEdit()
    {
        $this->login_pass_edit_flg = true;
        $this->login_pass_valid = ['filled' => true, 'unknown' => true, 'confirm' => true];
    }
}
