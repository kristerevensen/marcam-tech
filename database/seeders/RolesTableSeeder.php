<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**s
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::truncate();
       
       Role::create(['name' => 'admin']);
       Role::create(['name' => 'service']);
       Role::create(['name' => 'user']);
    }
}
