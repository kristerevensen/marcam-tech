<?php

namespace App\Http\Controllers;

use App\Imports\PagesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   

}

