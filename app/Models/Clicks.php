<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clicks extends Model
{
    use HasFactory;

    protected $table ="clicks"; 
    protected $fillable = [
        'id', 
        'user_agent', 
        'referrer', 
        'ip', 
        'platform', 
        'link_token', 
        'category', 
        'created_at', 
        'updated_at'
    ];

    public function CampaignsLinks()
    {
        return $this->belongsTo(CampaignsLinks::class);
    }
}
