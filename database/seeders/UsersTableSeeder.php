<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first(); //admin of the website
        $serviceRole = Role::where('name', 'service')->first(); // service staff of the website
        $userRole = Role::where('name', 'user')->first(); //member of the website

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $service = User::create([
            'name' => 'Service User',
            'email' => 'service@service.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $krister = User::create([
            'name' => 'Krister M. Ross',
            'email' => 'krister.ross.evensen@gmail.com',
            'password' => Hash::make('qwas33ZX')
        ]);

        $admin->roles()->attach($adminRole);
        $service->roles()->attach($serviceRole);
        $user->roles()->attach($userRole);
        $krister->roles()->attach($adminRole);
    }
}
