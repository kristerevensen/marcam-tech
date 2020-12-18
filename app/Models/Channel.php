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

    public function getAllChannelsFromToken($analysis_token)
    {
        return DB::table('channels')
                ->select(DB::raw('id, created_at, channel,
                    channel_token, year, avg(users) as users,
                    avg(sessions) as sessions, avg(pageviews) as pageviews,
                    avg(avgorder) as avgorder, avg(transactions) as transactions,
                    avg(revenue) as revenue, avg(bouncerate) as bouncerate,
                    avg(exitrate) as exitrate, avg(pagevalue) as pagevalue, project_token, analysis_token 
                    '))
                ->groupBy('year','channel')
                ->where('project_token',session('selected_project'))
                ->where('analysis_token',$analysis_token)
                ->orderBy('year','desc')
                ->orderBy('sessions','desc')
                ->get();
    }

    public function get_yearly_channels()
    {
        return DB::table('channels')
        ->select(DB::raw('id, created_at, channel,
            channel_token, year, avg(users) as users,
            avg(sessions) as sessions, avg(pageviews) as pageviews,
            avg(avgorder) as avgorder, avg(transactions) as transactions,
            avg(revenue) as revenue, avg(bouncerate) as bouncerate,
            avg(exitrate) as exitrate, avg(pagevalue) as pagevalue, project_token, analysis_token 
            '))
        ->groupBy('year','channel')
        ->where('project_token',session('selected_project'))
        ->where('import_type','channels yearly')
        ->orderBy('year','desc')
        ->orderBy('sessions','desc')
        ->get();
    }

    public function get_monthly_channels()
    {
        return DB::table('channels')
        ->select(DB::raw('id, created_at, channel,
            channel_token, year, avg(users) as users,
            avg(sessions) as sessions, avg(pageviews) as pageviews,
            avg(avgorder) as avgorder, avg(transactions) as transactions,
            avg(revenue) as revenue, avg(bouncerate) as bouncerate,
            avg(exitrate) as exitrate, avg(pagevalue) as pagevalue, project_token, analysis_token 
            '))
        ->groupBy('year','channel')
        ->where('project_token',session('selected_project'))
        ->where('import_type','channels monthly')
        ->orderBy('year','desc')
        ->orderBy('sessions','desc')
        ->get();
    }

    public function get_weekly_channels()
    {
        return DB::table('channels')
                ->select(DB::raw('id, created_at, channel,
                    channel_token, year, avg(users) as users,
                    avg(sessions) as sessions, avg(pageviews) as pageviews,
                    avg(avgorder) as avgorder, avg(transactions) as transactions,
                    avg(revenue) as revenue, avg(bouncerate) as bouncerate,
                    avg(exitrate) as exitrate, avg(pagevalue) as pagevalue, project_token, analysis_token 
                    '))
                ->groupBy('year','channel')
                ->where('project_token',session('selected_project'))
                ->where('import_type','channels weekly')
                ->orderBy('year','desc')
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

    public function getChannelDataWeek($year,$channeltoken)
    {
        return DB::table('channels')    
                ->groupBy('week')
                ->groupBy('channel_token')
                ->where('channel_token',$channeltoken)
                ->where('year',$year)
                ->where('import_type','channels weekly')
                ->where('project_token',session('selected_project'))
                ->get();
    }
    public function getChannelDataMonth($year,$channeltoken)
    {
        return DB::table('channels')    
                ->groupBy('month')
                ->groupBy('channel_token')
                ->where('channel_token',$channeltoken)
                ->where('year',$year)
                ->where('import_type','channels monthly')
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
