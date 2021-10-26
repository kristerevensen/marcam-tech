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

    public function Clicks()
    {
        return $this->hasMany(Clicks::class);
    }

    public function get_links($project_token)
    {
        return DB::table('campaigns_links')
                ->select(DB::raw('*,COUNT(clicks.link_token) as nrclicks'))
                ->leftJoin('clicks', 'campaigns_links.link_token','=','clicks.link_token')
                ->where('project_token',$project_token)
                ->groupBy('campaigns_links.id')
                ->get();
    }

    public function get_campaign_links($project_token,$campaign_id)
    {
        return DB::table('campaigns_links')
                ->select(DB::raw('*,COUNT(clicks.link_token) as nrclicks'))
                ->leftJoin('clicks', 'campaigns_links.link_token','=','clicks.link_token')
                ->where('project_token',$project_token)
                ->where('campaigns_links.campaign_id',$campaign_id)
                ->get();
    }
}
