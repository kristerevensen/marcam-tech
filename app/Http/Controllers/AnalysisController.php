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
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysis = new Analysis();
        $data['analyses'] = $analysis->get_analyses(session('selected_project'));
        //$data['token'] = $data['analyses']->analysis_token;
        return view('analysis.index',$data);
    }

   
    public function channels_year($year)
    {
        $data['year'] = $year;
        return view('analysis.channels.year',$data);
    }
    public function channels()
    {
        $chans = new Channel();
        $data['channels_weekly'] = $chans->get_weekly_channels();
        $data['channels_monthly'] = $chans->get_monthly_channels();
        $data['channels_yearly'] = $chans->get_yearly_channels();
        
        return view('analysis.channels',$data);
    }
    public function channel($analysis_token)
    {
        $chans = new Channel();
        $data['channels'] = $chans->getAllChannels();
        
        return view('analysis.channels',$data);
    }
    public function delete_trends()
    {
        $project_token = session('selected_project');

    }
    public function pages(request $request) {
        return view('analysis.pages');
    }

    /**
     * linear regression function
     * @param $x array x-coords
     * @param $y array y-coords
     * @returns array() m=>slope, b=>intercept
     */
    public function linear_regression($x, $y) {

        // calculate number points
        $n = count($x);
        
        // ensure both arrays of points are the same size
        if ($n != count($y)) {
    
        trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
        
        }
    
        // calculate sums
        $x_sum = array_sum($x);
        $y_sum = array_sum($y);
    
        $xx_sum = 0;
        $xy_sum = 0;
        
        for($i = 0; $i < $n; $i++) {
        
        $xy_sum+=($x[$i]*$y[$i]);
        $xx_sum+=($x[$i]*$x[$i]);
        
        }
        
        // calculate slope
        $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));
        
        // calculate intercept
        $b = ($y_sum - ($m * $x_sum)) / $n;
        
        // return result
        return array("m"=>$m, "b"=>$b);
    
    }

    function standard_deviation($arr) 
    { 
        $num_of_elements = count($arr); 
          
        $variance = 0.0; 
          
                // calculating mean using array_sum() method 
        $average = array_sum($arr)/$num_of_elements; 
          
        foreach($arr as $i) 
        { 
            // sum of squares of differences between  
                        // all numbers and means. 
            $variance += pow(($i - $average), 2); 
        } 
          
        return (float)sqrt($variance/$num_of_elements); 
    } 
     

    public function channel_analysis($channeltoken)
    {
        $chan = new Channel();
        $year = date('Y');
        $data['channel_name'] = $chan->getChannelNameFromToken($channeltoken);

        $data['channel'] = $chan->getChannelData($year,$channeltoken);
        dd($data['channel']);
    }
    public function average($array)
    {
        $a = array_filter($array);
        return array_sum($a)/count($a);
    }
    public function upload()
    {
        $analysis = new Analysis();
        $data['import_types'] = array();
        $analysis = $analysis->check_imports(session('selected_project'));
        foreach($analysis as $row){
            $data['import_types'][] = $row->import_type;
        }

        return view('analysis.upload',$data);
    }

    public function week_channel_trends_calculations($year,$channeltoken)
    {
        $channel = new Channel();
        $data['channel']= $channel->getChannelDataWeek($year,$channeltoken);

        foreach($data['channel'] as $item) {
            $data['pageviews'][] = $item->pageviews;
            $data['sessions'][] = $item->sessions;
            $data['users'][] = $item->users;
            $data['avgorder'][] = $item->avgorder;
            $data['transactions'][] = $item->transactions;
            $data['revenue'][] = $item->revenue;
            $data['bouncerate'][] = $item->bouncerate;
            $data['exitrate'][] = $item->exitrate;
            $data['pagevalue'][] = $item->pagevalue;
            $data['weeks'][] = $item->week;
        }
        
        /**
         * Collecting data points
         */
        $data['regression']['sessions'] = $this->linear_regression($data['weeks'],$data['sessions']);
        $data['regression']['pageviews'] = $this->linear_regression($data['weeks'],$data['pageviews']);
        $data['regression']['users'] = $this->linear_regression($data['weeks'],$data['users']);
        $data['regression']['avgorder'] = $this->linear_regression($data['weeks'],$data['avgorder']);
        $data['regression']['transactions'] = $this->linear_regression($data['weeks'],$data['transactions']);
        $data['regression']['revenue'] = $this->linear_regression($data['weeks'],$data['revenue']);
        $data['regression']['bouncerate'] = $this->linear_regression($data['weeks'],$data['bouncerate']);
        $data['regression']['exitrate'] = $this->linear_regression($data['weeks'],$data['exitrate']);
        $data['regression']['pagevalue'] = $this->linear_regression($data['weeks'],$data['pagevalue']);

        /**
         * Calculating standard deviation
         */
        $data['regression']['sessions']['standard_deviation'] = $this->standard_deviation($data['sessions']);
        $data['regression']['pageviews']['standard_deviation'] = $this->standard_deviation($data['pageviews']);
        $data['regression']['users']['standard_deviation'] = $this->standard_deviation($data['users']);
        $data['regression']['avgorder']['standard_deviation'] = $this->standard_deviation($data['avgorder']);
        $data['regression']['transactions']['standard_deviation'] = $this->standard_deviation($data['transactions']);
        $data['regression']['revenue']['standard_deviation'] = $this->standard_deviation($data['revenue']);
        $data['regression']['bouncerate']['standard_deviation'] = $this->standard_deviation($data['bouncerate']);
        $data['regression']['exitrate']['standard_deviation'] = $this->standard_deviation($data['exitrate']);
        $data['regression']['pagevalue']['standard_deviation'] = $this->standard_deviation($data['pagevalue']);
        
        /**
         * Calculating average
         */
        $data['regression']['sessions']['average'] = $this->average($data['sessions']);
        $data['regression']['pageviews']['average'] = $this->average($data['pageviews']);
        $data['regression']['users']['average'] = $this->average($data['users']);
        $data['regression']['avgorder']['average'] = $this->average($data['avgorder']);
        $data['regression']['transactions']['average'] = $this->average($data['transactions']);
        $data['regression']['revenue']['average'] = $this->average($data['revenue']);
        $data['regression']['bouncerate']['average'] = $this->average($data['bouncerate']);
        $data['regression']['exitrate']['average'] = $this->average($data['exitrate']);
        $data['regression']['pagevalue']['average'] = $this->average($data['pagevalue']);

        $data['regression']['sessions']['total'] = array_sum($data['sessions']);
        $data['regression']['pageviews']['total'] = array_sum($data['pageviews']);
        $data['regression']['users']['total'] = array_sum($data['users']);
        $data['regression']['transactions']['total'] = array_sum($data['transactions']);
        $data['regression']['revenue']['total'] = array_sum($data['revenue']);
        $data['regression']['pagevalue']['total'] = array_sum($data['pagevalue']);
       
        $data['regression']['avgorder']['total'] = 0;
        $data['regression']['bouncerate']['total'] = 0;
        $data['regression']['exitrate']['total'] = 0;
        return $data;
    }
    public function month_channel_trends_calculations($year,$channeltoken)
    {
        $channel = new Channel();
        $data['channel']= $channel->getChannelDataMonth($year,$channeltoken);

        foreach($data['channel'] as $item) {
            $data['pageviews'][] = $item->pageviews;
            $data['sessions'][] = $item->sessions;
            $data['users'][] = $item->users;
            $data['avgorder'][] = $item->avgorder;
            $data['transactions'][] = $item->transactions;
            $data['revenue'][] = $item->revenue;
            $data['bouncerate'][] = $item->bouncerate;
            $data['exitrate'][] = $item->exitrate;
            $data['pagevalue'][] = $item->pagevalue;
            $data['months'][] = $item->month;
        }
        
        /**
         * Collecting data points
         */
        $data['regression']['sessions'] = $this->linear_regression($data['months'],$data['sessions']);
        $data['regression']['pageviews'] = $this->linear_regression($data['months'],$data['pageviews']);
        $data['regression']['users'] = $this->linear_regression($data['months'],$data['users']);
        $data['regression']['avgorder'] = $this->linear_regression($data['months'],$data['avgorder']);
        $data['regression']['transactions'] = $this->linear_regression($data['months'],$data['transactions']);
        $data['regression']['revenue'] = $this->linear_regression($data['months'],$data['revenue']);
        $data['regression']['bouncerate'] = $this->linear_regression($data['months'],$data['bouncerate']);
        $data['regression']['exitrate'] = $this->linear_regression($data['months'],$data['exitrate']);
        $data['regression']['pagevalue'] = $this->linear_regression($data['months'],$data['pagevalue']);

        /**
         * Calculating standard deviation
         */
        $data['regression']['sessions']['standard_deviation'] = $this->standard_deviation($data['sessions']);
        $data['regression']['pageviews']['standard_deviation'] = $this->standard_deviation($data['pageviews']);
        $data['regression']['users']['standard_deviation'] = $this->standard_deviation($data['users']);
        $data['regression']['avgorder']['standard_deviation'] = $this->standard_deviation($data['avgorder']);
        $data['regression']['transactions']['standard_deviation'] = $this->standard_deviation($data['transactions']);
        $data['regression']['revenue']['standard_deviation'] = $this->standard_deviation($data['revenue']);
        $data['regression']['bouncerate']['standard_deviation'] = $this->standard_deviation($data['bouncerate']);
        $data['regression']['exitrate']['standard_deviation'] = $this->standard_deviation($data['exitrate']);
        $data['regression']['pagevalue']['standard_deviation'] = $this->standard_deviation($data['pagevalue']);
        
        /**
         * Calculating average
         */
        $data['regression']['sessions']['average'] = $this->average($data['sessions']);
        $data['regression']['pageviews']['average'] = $this->average($data['pageviews']);
        $data['regression']['users']['average'] = $this->average($data['users']);
        $data['regression']['avgorder']['average'] = $this->average($data['avgorder']);
        $data['regression']['transactions']['average'] = $this->average($data['transactions']);
        $data['regression']['revenue']['average'] = $this->average($data['revenue']);
        $data['regression']['bouncerate']['average'] = $this->average($data['bouncerate']);
        $data['regression']['exitrate']['average'] = $this->average($data['exitrate']);
        $data['regression']['pagevalue']['average'] = $this->average($data['pagevalue']);

        $data['regression']['sessions']['total'] = array_sum($data['sessions']);
        $data['regression']['pageviews']['total'] = array_sum($data['pageviews']);
        $data['regression']['users']['total'] = array_sum($data['users']);
        $data['regression']['transactions']['total'] = array_sum($data['transactions']);
        $data['regression']['revenue']['total'] = array_sum($data['revenue']);
        $data['regression']['pagevalue']['total'] = array_sum($data['pagevalue']);
       
        $data['regression']['avgorder']['total'] = 0;
        $data['regression']['bouncerate']['total'] = 0;
        $data['regression']['exitrate']['total'] = 0;
        return $data;
    }
    public function weekly_channel_trends($year,$channeltoken)
    {
        
        $data = $this->week_channel_trends_calculations($year,$channeltoken);
        
        $lastyear = $year -1;
        
        if($year == date('Y')) {
            $data['lastyear'][] = $this->week_channel_trends_calculations($lastyear,$channeltoken);

            $data['regression']['sessions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['sessions']['total'], $data['regression']['sessions']['total']) ?: 0;
            $data['regression']['pageviews']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pageviews']['total'], $data['regression']['pageviews']['total']);
            $data['regression']['users']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['users']['total'], $data['regression']['users']['total']);
            $data['regression']['transactions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['transactions']['total'], $data['regression']['transactions']['total']);
            $data['regression']['revenue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['revenue']['total'], $data['regression']['revenue']['total']);
            $data['regression']['pagevalue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pagevalue']['total'], $data['regression']['pagevalue']['total']);
            
            $data['regression']['avgorder']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['avgorder']['average'], $data['regression']['avgorder']['average']);
            $data['regression']['bouncerate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['bouncerate']['average'], $data['regression']['bouncerate']['average']);
            $data['regression']['exitrate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['exitrate']['average'], $data['regression']['exitrate']['average']);
           // dd($data['sessions']);
            //dd($this->getPercentageChangeArray($data['sessions']));
            //$data['regression']['sessions']['percentagechange'][] = $this->getPercentageChangeArray($data['sessions']);
            //dd($data['regression']['sessions']['percentagechange']);
        }

        dd($this->getPercentageChangeArray($data['sessions']));
        
        $channel = new Channel();
        $channelName = $channel->getChannelNameFromToken($channeltoken);
        $data['channel_name'] = $channelName[0];
        $data['selected_year'] = $year;
        return view('analysis.channel_trends_week',$data);
    }
    public function monthly_channel_trends($year,$channeltoken)
    {
        
        $data = $this->month_channel_trends_calculations($year,$channeltoken);
        
        $lastyear = $year -1;
        
        if($year == date('Y')) {
            $data['lastyear'][] = $this->month_channel_trends_calculations($lastyear,$channeltoken);

            $data['regression']['sessions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['sessions']['total'], $data['regression']['sessions']['total']) ?: 0;
            $data['regression']['pageviews']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pageviews']['total'], $data['regression']['pageviews']['total']);
            $data['regression']['users']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['users']['total'], $data['regression']['users']['total']);
            $data['regression']['transactions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['transactions']['total'], $data['regression']['transactions']['total']);
            $data['regression']['revenue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['revenue']['total'], $data['regression']['revenue']['total']);
            $data['regression']['pagevalue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pagevalue']['total'], $data['regression']['pagevalue']['total']);
            
            $data['regression']['avgorder']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['avgorder']['average'], $data['regression']['avgorder']['average']);
            $data['regression']['bouncerate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['bouncerate']['average'], $data['regression']['bouncerate']['average']);
            $data['regression']['exitrate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['exitrate']['average'], $data['regression']['exitrate']['average']);

            //$data['regression']['sessions']['percentagechange'][] = $this->getPercentageChangeArray($data['sessions']);
            //dd($data['regression']['sessions']['percentagechange']);
        }
        
        $channel = new Channel();
        $channelName = $channel->getChannelNameFromToken($channeltoken);
        $data['channel_name'] = $channelName[0];
        $data['selected_year'] = $year;
        return view('analysis.channel_trends_month',$data);
    }
    public function channel_trends($year,$channeltoken)
    {
        
        $data = $this->channel_trends_calculations($year,$channeltoken);
        
        $lastyear = $year -1;
        
        if($year == date('Y')) {
            $data['lastyear'][] = $this->channel_trends_calculations($lastyear,$channeltoken);

            $data['regression']['sessions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['sessions']['total'], $data['regression']['sessions']['total']) ?: 0;
            $data['regression']['pageviews']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pageviews']['total'], $data['regression']['pageviews']['total']);
            $data['regression']['users']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['users']['total'], $data['regression']['users']['total']);
            $data['regression']['transactions']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['transactions']['total'], $data['regression']['transactions']['total']);
            $data['regression']['revenue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['revenue']['total'], $data['regression']['revenue']['total']);
            $data['regression']['pagevalue']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['pagevalue']['total'], $data['regression']['pagevalue']['total']);
            
            $data['regression']['avgorder']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['avgorder']['average'], $data['regression']['avgorder']['average']);
            $data['regression']['bouncerate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['bouncerate']['average'], $data['regression']['bouncerate']['average']);
            $data['regression']['exitrate']['totalchange'] = $this->getPercentageChange($data['lastyear'][0]['regression']['exitrate']['average'], $data['regression']['exitrate']['average']);

            //$data['regression']['sessions']['percentagechange'][] = $this->getPercentageChangeArray($data['sessions']);
            //dd($data['regression']['sessions']['percentagechange']);
        }
        
        $channel = new Channel();
        $channelName = $channel->getChannelNameFromToken($channeltoken);
        $data['channel_name'] = $channelName[0];
        $data['selected_year'] = $year;
        return view('analysis.channel_trends',$data);
    }
    public function getPercentageChangeArray($array){
        $counter = 0;
        $array = (array)$array;
     
        $count = count($array);
        $changeArray = array();

        for ($i=0; $i < $count ; $i++) { 
            
            if($i > 0) {
                $changeArray[] = $this->getPercentageChange((float)$array[$i-1],(float)$array[$i]);
            }
            
        }

        return $changeArray;
    }

    public function getPercentageChange($oldNumber, $newNumber){
        //$decreaseValue = $oldNumber - $newNumber;
        $increaseValue = $newNumber - $oldNumber;
    
        return ($increaseValue / $oldNumber) * 100;
    }
    public function delete_analysis($id)
    {
         $analysis = new Analysis();
         if($analysis->delete_analysis($id)){
             $analysis->delete_channels($id);
             redirect()->route('analysis')->with('success', 'The analysis data was successfully deleted.')->send();
         } else {
             redirect()->route('analysis')->with('error', 'The data could not be deleted. Please contact support for help.')->send();
         }
    }
    public function import(Request $request)
    {
        if($request->import_type === 'none') {
            redirect()->route('analysis.upload')->with('info','You need to select type of import')->send();
        } else {
            if($request->import_type === 'channels monthly') {

                $excel = Excel::toArray(new ChannelsImport,request()->file('file'));
                
                $rows = $excel[0];
                $analysis_token = md5(rand(15,35));
                $import_type_token = md5($request->import_type);

                $analysis = new Analysis();
                $analysis->import_name = $request->import_name;
                $analysis->import_type = $request->import_type;
                $analysis->import_type_token = $import_type_token;
                $analysis->analysis_token = $analysis_token;
                $analysis->project_token = session('selected_project');
                $analysis->save();


                foreach($rows as $row) {
                    $channels = new Channel();
                    $channels->month = $row['month'];
                    $channels->import_name = $request->import_name;
                    $channels->import_type = $request->import_type;
                    $channels->analysis_token = $analysis_token;
                    $channels->import_type_token = $import_type_token;
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

                return redirect()->route('analysis')->with('success','The data was successfully imported');

            }
            if($request->import_type === 'channels yearly') {

                $excel = Excel::toArray(new ChannelsImport,request()->file('file'));
                
                $rows = $excel[0];
                $analysis_token = md5(rand(15,35));
                $import_type_token = md5($request->import_type);

                $analysis = new Analysis();
                $analysis->import_name = $request->import_name;
                $analysis->import_type = $request->import_type;
                $analysis->import_type_token = $import_type_token;
                $analysis->analysis_token = $analysis_token;
                $analysis->project_token = session('selected_project');
                $analysis->save();


                foreach($rows as $row) {
                    $channels = new Channel();
                   // $channels->month = $row['month'];
                    $channels->import_name = $request->import_name;
                    $channels->import_type = $request->import_type;
                    $channels->analysis_token = $analysis_token;
                    $channels->import_type_token = $import_type_token;
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

                return redirect()->route('analysis')->with('success','The data was successfully imported');

            }
            if($request->import_type === 'channels weekly') {
              
                
                $excel = Excel::toArray(new ChannelsImport,request()->file('file'));
                
                $rows = $excel[0];
                $analysis_token = md5(rand(15,35));
                $import_type_token = md5($request->import_type);

                $analysis = new Analysis();
                $analysis->import_name = $request->import_name;
                $analysis->import_type = $request->import_type;
                $analysis->import_type_token = $import_type_token;
                $analysis->analysis_token = $analysis_token;
                $analysis->project_token = session('selected_project');
                $analysis->save();


                foreach($rows as $row) {
                    $channels = new Channel();
                    $channels->week = $row['week'];
                    $channels->import_name = $request->import_name;
                    $channels->import_type = $request->import_type;
                    $channels->analysis_token = $analysis_token;
                    $channels->import_type_token = $import_type_token;
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

                return redirect()->route('analysis')->with('success','The data was successfully imported');
            }
            if($request->import_type === 'pages monthly') {
                Excel::toArray(new PagesImport,request()->file('file'));
            }
            if($request->import_type === 'segments') {
                
            }
        }
    }
  

   
}
