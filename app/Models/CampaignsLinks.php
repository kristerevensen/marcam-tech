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
                ->where('project_token',$project_token)
                ->get();
    }
}
