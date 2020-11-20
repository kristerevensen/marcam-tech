<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RestClient;
use FFI\Exception;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ApiController extends Controller
{
    protected $login = "krister@yearbase.com";
    protected $pass = "NMPixkCqU5duN4Qo";

    function __construct()
    {
        
    }
    public function connect($var = null)
    {
        try{
            $client = new RestClient('https://api.dataforseo.com/',null,$this->login,$this->pass);
            return $client;
        } catch (Exception $e){
            echo "\n";
            print "HTTP code: {$e->getHttpCode()}\n";
            print "Error code: {$e->getCode()}\n";
            print "Message: {$e->getMessage()}\n";
            print  $e->getTraceAsString();
            echo "\n";
            exit();
        }

    }

    public function common_search_engines()
    {
        $client = $this->connect();
        $res = $client->get('v2/cm_se');
        dd($res);
        $client = null;
    }
}
