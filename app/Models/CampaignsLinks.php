<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CampaignsLinks extends Model
{
    use HasFactory;

    public function get_links($project_token)
    {
        return DB::table('campaigns_links')
                ->where('project_token',$project_token)
                ->get();
    }
}
