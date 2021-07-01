<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Super Admin";
        $user->email = "admin@gmail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("Admin");
        $user->status = "active";
        $user->role = "Admin";
        $user->save();
        $user->assignRole('SuperAdmin');
    }
}
