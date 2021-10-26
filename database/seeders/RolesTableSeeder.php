<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**s
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
       DB::table('roles')->truncate();
       
       Role::create(['name' => 'admin']);
       Role::create(['name' => 'service']);
       Role::create(['name' => 'user']);
    }
}
