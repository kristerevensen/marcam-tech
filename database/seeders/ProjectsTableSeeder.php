<?php

namespace Database\Seeders;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('projects')->truncate();

        DB::table('projects')->insert([
            'project_name' => 'OneCall',
            'project_token' => 'ABC123',
            'url' => 'https://onecall.no',
            'language' => 'NO',
            'location' => 'Norway',
            'description' => 'Onecall.no website with webshop.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('projects')->insert([
            'project_name' => 'MyCall',
            'project_token' => 'DEF456',
            'url' => 'https://mycall.no',
            'language' => 'NO',
            'location' => 'Norway',
            'description' => 'MyCall.no website with webshop.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('projects')->insert([
            'project_name' => 'Skogluft',
            'project_token' => 'skg123',
            'url' => 'https://www.skogluft.com',
            'language' => 'NO',
            'location' => 'Norway',
            'description' => 'Skogluft.com.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
