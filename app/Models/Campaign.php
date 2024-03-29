<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CampaignsLinks;
use App\Models\Clicks;

class Campaign extends Model
{
    use HasFactory;

    protected $table ="campaigns"; 
    protected $fillable = [
        'campaign_name', 
        'campaign_spend', 
        'campaign_token',
        'description', 
        'start', 
        'end', 
        'status', 
        'category', 
        'template', 
        'model', 
        'reporting', 
        'created_by', 
        'project_token'
    ];

    
    public function CampaignsLinks()
    {
        return $this->hasMany(CampaignsLinks::class);
    }

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }
    
   
  

    public function delete_campaign($id)
    {
        $data = DB::table('campaigns')
                ->where('project_token', session('selected_project'))
                ->where('id',$id);
        if($data->delete()){
            return true;
        } else {
            return false;
        }
    }

    public function getCampaign($token,$id)
    {
        return DB::table('campaigns')
                ->select(DB::raw('*,users.name as user_name, campaigns.id as campaign_id, campaigns.description as description'))
                ->leftJoin('users', 'users.id','=','campaigns.created_by')
                ->where('project_token',$token)
                ->where('campaigns.id',$id)
                ->groupBy('campaigns.id')
                ->first();
    }

    public function getCampaigns($id)
    {
        return DB::table('campaigns')
                ->select(DB::raw('*,users.name as user_name, campaigns.id as campaign_id,users.id as user_id'))
                ->leftJoin('users', 'users.id','=','campaigns.created_by')
                ->where('project_token',$id)
                ->groupBy('campaigns.id')
                ->get();
    }
    
    public function get_campaign_name($id)
    {
        return DB::table('campaigns')
                ->where('project_token',session('selected_project'))
                ->where('id',$id)
                ->pluck('campaign_name');
    }

    public function get_campaign_clicks($session,$id){
        
        return DB::table('clicks')
                    ->select(DB::raw('
                        *,
                        count(clicks.created_at) as clickcount, 
                        date(clicks.created_at) as DATE, 
                        campaigns.campaign_name as name, 
                        campaigns.id as campaignID')) // count(clicks.id) as clicks, cast(clicks.created_at as DATE) as date
                    ->leftJoin('campaigns_links', 'campaigns_links.link_token','=','clicks.link_token')
                    ->leftJoin('campaigns', 'campaigns.id','=','campaigns_links.campaign_id')
                    ->where('campaigns.project_token',$session)
                    ->where('campaigns.id',$id)
                    ->groupBy('DATE')
                    ->orderBy('DATE','DESC')
                    ->get();
    }

    public function get_last_30_days_campaigns_clicks($session){
        
        return DB::table('clicks')
                    ->select(DB::raw('
                        count(clicks.link_token) as clickcount, 
                        date(clicks.created_at) as DATE, 
                        campaigns.campaign_name as name, 
                        campaigns.id as campaignID')) // count(clicks.id) as clicks, cast(clicks.created_at as DATE) as date
                    ->leftJoin('campaigns_links', 'campaigns_links.link_token','=','clicks.link_token')
                    ->leftJoin('campaigns', 'campaigns.id','=','campaigns_links.campaign_id')
                    ->where('campaigns.project_token',$session)
                    
                    ->groupBy('DATE')
                    ->orderBy('DATE','DESC')
                    ->get();
    }
}
