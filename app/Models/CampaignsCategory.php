<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CampaignsCategory extends Model
{
    use HasFactory;
    protected $table = "campaigns_category";

    

    public function getCategories($projectID)
    {
        $data = DB::table('campaigns_category')
            ->where('project_token',$projectID)
            ->get();
        return $data;
    }
}
