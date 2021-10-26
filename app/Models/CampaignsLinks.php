<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Clicks;

class CampaignsLinks extends Model
{
    use HasFactory;

    protected $table = "campaigns_links";

    protected $fillable = [
        'id', 
        'created_at', 
        'updated_at', 
        'landing_page', 
        'link_token', 
        'project_token', 
        'campaign_name', 
        'source', 
        'medium',
        'term',
        'content',
        'target',
        'campaign_id',
        'custom_parameters',
        'tagged_url',
        'marcam'
    ];

    public function Clicks()
    {
        return $this->hasMany(Clicks::class);
    }
    public function Campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function get_links($project_token)
    {
        return DB::table('campaigns_links')
                ->select(DB::raw('*,COUNT(clicks.link_token) as nrclicks, campaigns_links.id as linkID'))
                ->leftJoin('clicks', 'campaigns_links.link_token','=','clicks.link_token')
                ->where('project_token',$project_token)
                ->groupBy('campaigns_links.id')
                ->get();
    }

    public function get_campaign_links($project_token,$campaign_id)
    {
        return DB::table('campaigns_links')
                ->select(DB::raw('*,COUNT(clicks.link_token) as nrclicks,campaigns_links.id as linkID'))
                ->leftJoin('clicks', 'campaigns_links.link_token','=','clicks.link_token')
                ->where('project_token',$project_token)
                ->where('campaigns_links.campaign_id',$campaign_id)
                ->groupBy('campaigns_links.id')
                ->get();
    }
}
