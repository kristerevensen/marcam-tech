<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campaign extends Model
{
    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function CampaignsCategory()
    {
        return $this->hasMany('App\Models\CampaignsCategory');
    }

    public function delete_campaign($id)
    {
        $data = DB::table('campaigns')->where('project_token', $id);
        if($data->delete()){
            return true;
        } else {
            return false;
        }
    }

    public function getCampaigns($id)
    {
        return DB::table('campaigns')
                ->where('project_token',$id)
                ->get();
    }
    
    public function get_campaign_name($id)
    {
        return DB::table('campaigns')
                ->distinct('campaign_name')
                ->where('project_token',session('selected_project'))
                ->where('id',$id)
                ->get();
    }
}
