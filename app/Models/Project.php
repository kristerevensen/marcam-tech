<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use app\models\Campaign;

class Project extends Model
{
    use HasFactory;
    
    public function Campaign()
    {
        return $this->hasMany(Campaign::class);
    }

    public function plural()
    {
        return DB::table('projects')->get();
    }

    public function single($id){
        return DB::table('projects')
        ->where('project_token',$id)
        ->get();
    }
  
    function delete_project($id) {
        return DB::table('projects')
            ->where('project_token',$id)
            ->delete();
    }
}
