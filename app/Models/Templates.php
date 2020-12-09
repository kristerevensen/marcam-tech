<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Templates extends Model
{
    use HasFactory;

    public function get_templates($project_token)
    {
        return DB::table('campaigns_templates')
                ->where('project_token',$project_token)
                ->get();
    }
}
