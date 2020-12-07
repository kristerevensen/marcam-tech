<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory; 

    protected $table = "sources";
    
    public function getSources($id)
    {
        return DB::table($this->table)
                ->where('project_token',$id)
                ->get();
    }

    public function del($id)
    {
        return DB::table($this->table)
                ->where('project_token',$id)
                ->delete();
    }
}
