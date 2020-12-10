<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template extends Model
{
    use HasFactory;
    protected $table = "campaigns_templates";

    public function getTemplates($id)
    {
        return DB::table('campaigns_templates')
                ->where('project_token',$id)
                ->get();
    }
}
