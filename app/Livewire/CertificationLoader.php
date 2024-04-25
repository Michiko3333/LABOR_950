<?php

namespace App\Livewire;

use App\Models\Certificate;
use App\Models\CurrentUser;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class CertificationLoader extends Component
{
    use WithFileUploads;

    #[Validate('max:1024')]
    public $cert_file;

    public $cert_pass = '';

    public $view = 0;

    public $isError = false;

    public function mount()
    {
        $company = CurrentUser::currentCompany()->first();
        $cert = Certificate::where('company_id', $company->id)->where('delete_flg', 0)->first();
        if (!empty($cert)) $this->view = 2;
    }

    public function render()
    {
        return view('livewire.certification-loader');
    }

    public function remove()
    {
        $this->view = 0;
        $this->cert_pass = '';
        $company = CurrentUser::currentCompany()->first();
        Certificate::where('company_id', $company->id)->update(['delete_flg' => 1]);
    }

    public function loadCert()
    {
        if (empty($this->cert_file) || mb_strlen($this->cert_pass) > 20) {
            return;
        }

        $this->view = 1;

        $company = CurrentUser::currentCompany()->first();
        $path = $this->cert_file->storeAs(path: 'tmp_loading_pfx', name: 'cert_' . $company->id . '_file.pfx');
        $file = Storage::get($path);
        $result = true;
        if ($result) {
            $this->isError = false;
            $company = CurrentUser::currentCompany()->first();
            if (Certificate::where('company_id', $company->id)->exists()) {
                Certificate::where('company_id', $company->id)->update(['delete_flg' => 0, 'file' => $file, 'password' => $this->cert_pass]);
            } else {
                Certificate::insert(['company_id' => $company->id, 'file' => $file, 'password' => $this->cert_pass]);
            }
            $this->view = 2;
        } else {
            $this->isError = true;
            $this->view = 0;
        }

        //Storage::delete($path);
    }

    private function checkKey($file, $pass)
    {
        $pkcs12 = openssl_pkcs12_read($file, $certs, $pass);
        $error = openssl_error_string();
        if ($pkcs12) {
            return true;
        } else {
            return false;
        }
    }
}
