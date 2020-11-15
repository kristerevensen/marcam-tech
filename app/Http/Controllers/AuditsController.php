<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditsController extends Controller
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
        return view('audits.index');
    }
}
