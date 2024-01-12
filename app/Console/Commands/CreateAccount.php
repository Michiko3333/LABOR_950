<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

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

        $name = $this->ask('Name?');

        if (empty($name)) {
            $this->info('名前を入力してください');
            return;
        }

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

        $request = new Request();
        $request->mergeIfMissing(['name' => $name, 'email' => $email, 'password' => $pass]);
        $register_controller = new RegisterController();
        $result = $register_controller->registerAccount($request);

        if ($result->success) {
            $this->info("下記アカウントを作成しました。\n\n名前：$name\nメールアドエス：$email\nパスワード：$pass");
        } else {
            $this->error($result->message);
        }
    }
}
