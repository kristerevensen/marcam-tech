<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'campaign_name' => 'OneCall Think',
            'campaign_spend' => '10000',
            'project_token' => 'ABC123',
            'created_by' => '1',
            'template' => null,
            'category' => 'Social',
            'model' => 'Think',
            'start' => date('Y-m-d H:i:s'),
            'end' => date('Y-m-d H:i:s'),
            'status' => 1

        ]);

        DB::table('campaigns')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'campaign_name' => 'OneCall See',
            'campaign_spend' => '10000',
            'project_token' => 'ABC123',
            'created_by' => '1',
            'template' => null,
            'category' => 'Social',
            'model' => 'See',
            'start' => date('Y-m-d H:i:s'),
            'end' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);
    }
}
