<?php

namespace App\Http\Controllers;

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
        return view('keywords.index');
    }
}
