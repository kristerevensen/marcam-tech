<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Channel extends Model
{
    use HasFactory;

    public function save_channels($rows)
    {
        foreach($rows as $row) {

        }
       return DB::table('channels')->insert($rows);
    }

    public function getAllChannels($id)
    {
        return DB::table('channels')
                ->groupBy('channel','year',)
                ->having('project_token',$id)
                ->orderBy('year','asc')
                ->orderBy('sessions','desc')
                ->get();
    }
    public function getChannelNameFromToken($channeltoken)
    {
        return DB::table('channels')
                ->distinct('channel')
                ->where('channel_token',$channeltoken)
                ->pluck('channel');
    }

    public function getChannelData($year,$channeltoken)
    {
        return DB::table('channels')    
                ->groupBy('week')
                ->groupBy('channel_token')
                ->where('channel_token',$channeltoken)
                ->where('year',$year)
                ->where('project_token',session('selected_project'))
                ->get();
    }

    public function get($id)
    {
        # code...
    }
    public function getOrganic($id)
    {
        # code...
    }
    

}
