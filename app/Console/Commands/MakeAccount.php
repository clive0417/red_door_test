<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MakeAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MakeAccount {name} {email} {password} {password_confirmation} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'input name/email/password/confirm password can create account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
                // 取值
                $infoArray = $this->argument();
                // 驗證資料
                $validator = Validator::make($infoArray, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
        
                ]);
                // 如果錯誤 顯示錯誤 正確執行
                if ($validator->fails()) {
                    $messages = $validator->messages();
                    echo $messages;
                }else {
                    User::create([
                        'name' =>  $infoArray['name'],
                        'email' => $infoArray['email'],
                        'password' => Hash::make($infoArray['password']),
                    ]);
        
                }
        
                return 1;
    }
}
