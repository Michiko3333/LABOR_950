<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\CurrentUser;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\User;
use App\Models\Prefecture;
use App\Rules\noEmoji;
use App\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\Component;

class UserModalContent extends Component
{
    use WithFileUploads;

    public $prefectures;
    public $employee_id = 0;
    public $company_id = 0;
    public $icon_file;
    public $icon_change_state = false;
    public $tab = 0;
    public $profiles = [
        'name' => '',
        'file_path' => '/img/image.png',
        'company_name' => '',
        'branch_name' => '',
        'departments' => [],
        'human_resources_permissions' => true
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
            $this->role_id = (new Permission())->getRoleId();
            $employee = CurrentUser::info();
            $this->employee_id = $employee->id;
            $this->login_email = $user->email;
            $this->login_email_edit = $this->login_email;
            if (!empty($user) || !empty($employee)) {
                if ($this->role_id !== 999) {
                    $company = CurrentUser::currentCompany();
                    if($this->role_id === 500) {
                        $branch = $employee->branch()->first();
                        $company = $branch->company()->first();
                    }
                    if (!empty($company)) {
                        $this->profiles['company_name'] = $company->name;
                        $this->company_id = $company->id;
                        $directory = 'photo/' . $this->company_id;
                        $files = Storage::files($directory);
                        foreach ($files as $file) {
                            $fileName = pathinfo($file, PATHINFO_FILENAME);
                            if ((int)$fileName === $this->employee_id) {
                                $this->profiles['file_path'] = '/' . $file;
                            }
                        }
                    }
                    $this->profiles['branch_name'] = $employee->branch->name;
                    $this->profiles['departments'] = Employee_department::select('name')
                        ->where('m_employee_department.delete_flg', 0)
                        ->leftJoin('m_department as d', 'department_id', '=', 'd.id')
                        ->where('employee_id', $this->employee_id)
                        ->pluck('name')->toArray();
                    if ($this->role_id === 100) {
                        $employee_status = $employee->employee_status;
                        $departmentPermissionId = Employee_department::select('d.department_permission_id')
                            ->join('m_department as d', 'm_employee_department.department_id', '=', 'd.id')
                            ->where('m_employee_department.delete_flg', 0)
                            ->where('d.delete_flg', 0)
                            ->where('m_employee_department.employee_id', $this->employee_id)
                            ->pluck('d.department_permission_id')
                            ->toArray();
                        if (!in_array(2, $departmentPermissionId) || $employee_status === 1){
                            $this->profiles['human_resources_permissions'] = false;
                        }
                    }

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

    public function iconChangeState()
    {
        $this->icon_change_state = !$this->icon_change_state;
    }

    public function changeIcon() {
        $this->dispatch('changeIcon');
    }

    public function saveIcon()
    {
        if ($this->icon_file && $this->company_id && $this->employee_id) {
            $maxSize = 5 * 1024 * 1024;
            if ($this->icon_file->getSize() > $maxSize) {
                session()->flash('error', 'ファイルサイズは5MB以下である必要があります。');
                return;
            }
            $extension = $this->icon_file->getClientOriginalExtension();
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (!in_array($extension, $allowedExtensions)) {
                session()->flash('error', 'jpn, jpeg, pngのみ許可されています。');
                return;
            }

            $directory = 'photo/' . $this->company_id;
            $filePath = $directory . '/' . $this->employee_id . '.' . $extension;

            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            foreach (Storage::files($directory) as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $this->employee_id) {
                    Storage::delete($file);
                }
            }

            $result = $this->icon_file->storeAs($filePath);

            \Log::info([$this->profiles['file_path']]);
            if ($result) {
                $this->profiles['file_path'] = $filePath . '?v=' . time();
                $this->icon_change_state = false;
                $this->dispatch('changeIconImage', $this->profiles['file_path']);
            }
        }
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
            'names_edit.old_last_name' => ['nullable', 'string', 'max:255', new noEmoji],
            'names_edit.old_first_name' => ['nullable', 'string', 'max:255', new noEmoji],
            'names_edit.old_last_name_kana' => ['nullable', 'string', 'max:255', 'regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u', new noEmoji],
            'names_edit.old_first_name_kana' => ['nullable', 'string', 'max:255', 'regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u', new noEmoji],
            'names_edit.old_last_name_alphabet' => ['nullable', 'string', 'max:255', 'regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u', new noEmoji],
            'names_edit.old_first_name_alphabet' => ['nullable', 'string', 'max:255', 'regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u', new noEmoji],
            'names_edit.name_common' => ['nullable', 'string', 'max:255', new noEmoji],
            'names_edit.name_common_kana' => ['nullable', 'string', 'max:255', 'regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u', new noEmoji],
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
            'emergency_edit.emergency_contact1' => ['nullable', 'string', 'max:255', new noEmoji],
            'emergency_edit.emergency_relationship1' => ['nullable', 'string', 'max:255', new noEmoji],
            'emergency_edit.emergency_tel1' => ['nullable', 'string', 'max:12', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_address_prefecture1' => ['nullable', 'string', 'max:20', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_post_code1' => ['nullable', 'string', 'max:20', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_address_city1' => ['nullable', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],
            'emergency_edit.emergency_address_ward1' => ['nullable', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],
            'emergency_edit.emergency_address_apartment1' => ['nullable', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],

            'emergency_edit.emergency_contact2' => ['nullable', 'string', 'max:255', new noEmoji],
            'emergency_edit.emergency_relationship2' => ['nullable', 'string', 'max:255', new noEmoji],
            'emergency_edit.emergency_tel2' => ['nullable', 'string', 'max:12', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_address_prefecture2' => ['nullable', 'string', 'max:20', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_post_code2' => ['nullable', 'string', 'max:12', 'regex:/\A[0-9]+\z/u', new noEmoji],
            'emergency_edit.emergency_address_city2' => ['nullable', 'string', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],
            'emergency_edit.emergency_address_ward2' => ['nullable', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],
            'emergency_edit.emergency_address_apartment2' => ['nullable', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u', new noEmoji],
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
            'login_email_edit' => ['required', 'email:rfc', 'max:255', new noEmoji],
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
            'login_pass_edit' => ['required', 'min:6', 'max:20', 'regex:/^[!-~]+$/', new noEmoji],
            'login_pass_confirm_edit' => ['required', 'min:6', 'max:20', 'regex:/^[!-~]+$/', new noEmoji],
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
