<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('create_user', function () {
    $name = $this->ask('Username');
    $email = $this->ask('Email');
    $password = $this->ask('Password');
    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
    ]);
    DB::table('users')->update(['admin' => 1]);
    $this->comment('User details:');
    $this->comment('User: ' . $name);
    $this->comment('Email:' . $email);
    $this->comment('Password: ' . $password);
})->purpose('Create a new user');



