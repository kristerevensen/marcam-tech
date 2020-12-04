<?php

namespace App\Http\Controllers;

use App\Models\Keywords;
use Illuminate\Http\Request;

class KeywordsController extends Controller
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

    public function index(request $request) {
        $data['keywords'] = Keywords::all();
        return view('keywords.index',$data);
    }
}
