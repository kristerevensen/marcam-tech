<?php

namespace App\Http\Controllers;

use App\Imports\ChannelsImport;
use App\Imports\PagesImport;
use App\Models\Analysis;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('analysis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function show(Analysis $analysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function edit(Analysis $analysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analysis $analysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analysis $analysis)
    {
        //
    }
    public function channels($var = null)
    {
        $chans = new Channel();
        $data['channels'] = $chans->getAllChannels(session('selected_project'));
        //dd($data['channels']);
        
        return view('analysis.channels',$data);
    }
    public function pages(request $request) {
        return view('analysis.pages');
    }

    public function channel_analysis($channeltoken)
    {
        $chan = new Channel();
        $data['channel_name'] = $chan->getChannelNameFromToken($channeltoken);

        $data['channel'] = $chan->getChannelData(year(),$channeltoken);
        dd($data['channel']);
    }

    public function upload()
    {
        return view('analysis.upload');
    }
    public function channel_trends($channeltoken)
    {
        $year = date('Y');
        $channel = new Channel();
        $data['channel']= $channel->getChannelData($year,$channeltoken);

        $channelName = $channel->getChannelNameFromToken($channeltoken);
        $data['channel_name'] = $channelName[0];
        $data['selected_year'] = $year;
        return view('analysis.channel_trends',$data);
    }
    public function import(Request $request)
    {
        if($request->import_type === 'none') {
            redirect()->route('analysis.upload')->with('info','You need to select type of import')->send();
        } else {
            if($request->import_type === 'channels') {
              
                
                $excel = Excel::toArray(new ChannelsImport,request()->file('file'));
                
                $rows = $excel[0];

                foreach($rows as $row) {
                    $channels = new Channel();
                    $channels->week = $row['week'];
                    $channels->channel = $row['channel'];
                    $channels->channel_token = md5($row['channel']);
                    $channels->year = $row['year'];
                    $channels->users = $row['users'];
                    $channels->sessions = $row['sessions'];
                    $channels->pageviews = $row['pageviews'];
                    $channels->avgorder = $row['avgorder'];
                    $channels->transactions = $row['transactions'];
                    $channels->revenue = $row['revenue'];
                    $channels->bouncerate = $row['bouncerate'];
                    $channels->exitrate = $row['exitrate'];
                    $channels->pagevalue = $row['pagevalue'];
                    $channels->project_token = session('selected_project');
                    $channels->save();
                }

                return redirect()->route('analysis.channels');
            }
            if($request->import_type === 'pages') {
                Excel::toArray(new PagesImport,request()->file('file'));
            }
            if($request->import_type === 'segments') {
                
            }
        }
    }
  

   
}
