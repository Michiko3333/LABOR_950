<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Employee;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'アカウントを新規作成する';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Email Address?');

        if (empty($email)) {
            $this->info('メールアドレスを入力してください');
            return;
        }

        $pass = $this->ask('Password?');
        if (empty($pass) || mb_strlen($pass) < 6) {
            $this->info('パスワードを6文字以上で入力してください');
            return;
        }

        try {
            $employee = new Employee();
            $employee->last_name = '管理';
            $employee->first_name = '太郎';
            $employee->branch_id = 0;
            $employee->role_id = 999;
            $employee->save();


            Log::info(print_r($employee->id, true));

            $data = [
                'name' => 'ADMIN',
                'email' => $email,
                'password' => Hash::make($pass),
                'employee_id' => $employee->id
            ];
            $user = User::create($data);
            $this->info("管理アカウントを下記に作成しました。\n\nメールアドレス：$email\nパスワード：$pass");
        } catch (\Exception $e) {
            $this->error($e);
        }
    }
}
