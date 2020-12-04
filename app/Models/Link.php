<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    public function get_project_links($project_id)
    {
        $data = DB::table('links')
                    ->where('projects',$project_id)
                    ->get();
        return $data;
    }
}
