<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AccountController extends Controller
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

    public function profile()
    {
        $data = array();
        return view('account.profile', $data);
    }

    public function editprofile()
    {
        $data = array();
       // return view('account.profile', $data);
    }
    public function editpassword()
    {
        $data = array();
       // return view('account.profile', $data);
    }

}
