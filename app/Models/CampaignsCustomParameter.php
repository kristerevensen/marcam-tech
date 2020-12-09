<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CampaignsCustomParameter extends Model
{
    use HasFactory;
    

    public function get_custom_parameters($project_token)
    {
        return DB::table('campaigns_custom_parameters')
                    ->where('project_token',$project_token)
                    ->get();
    }
}