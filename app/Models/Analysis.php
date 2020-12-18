<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Analysis extends Model
{
    use HasFactory;

    public function get_analyses($project_token){
        return DB::table('analyses')
                    ->select('*')
                    ->where('project_token',$project_token)
                    ->get();
    }
    public function check_imports()
    {
        return DB::table('analyses')
                ->select(DB::raw('distinct(import_type)'))
                ->where('project_token',session('selected_project'))
                ->groupBy('import_type')
                ->get();
    }

    public function delete_analysis($id)
    {
        return DB::table('analyses')
                ->where('project_token',session('selected_project'))
                ->where('analysis_token',$id)
                ->delete();
    }

    public function delete_channels($id)
    {
        return DB::table('channels')
            ->where('project_token',session('selected_project'))
            ->where('analysis_token',$id)
            ->delete();
    }
}
