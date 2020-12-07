<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";
    
    public function getContents($id)
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
