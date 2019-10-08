<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    protected $signature = 'make:user';

    protected $description = 'Create a new application user';

    public function handle()
    {
        $data = [
            'name' => $this->ask("What is the new user's name?"),
            'email' => $this->ask("What is the new user's email address?"),
            'password' => $this->secret("What is the new user's password?")
        ];

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            $this->info('validator failed');

            $this->info($validator->errors());

            exit();
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
