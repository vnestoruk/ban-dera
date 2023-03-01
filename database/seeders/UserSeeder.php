<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nickname = $this->command->ask('Admin\'s nickname', 'admin');
        $email = $this->command->ask('Admin\'s email', null);
        $password = $this->command->secret('Admin\'s password');

        $_user = User::create([
            'nickname' => $nickname,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $_user->assignRole('admin');
        $_user->save();
    }
}
