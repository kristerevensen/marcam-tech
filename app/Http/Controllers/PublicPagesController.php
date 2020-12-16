<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    public function __construct() {

    }
    
    public function error_404(){
        return view('404');
    }
}