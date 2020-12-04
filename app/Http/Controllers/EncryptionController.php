<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{    
    public function crypt($string)
    {
        $base = base64_encode($string);
        return Crypt::encryptString($base);
    }
    public function decrypt($string)
    {
        $string = Crypt::decryptString($base);
        return base64_decode($string);
    }
}
