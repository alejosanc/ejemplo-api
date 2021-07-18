<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;

class ExampleController extends BaseController 
{
    public function example(Request $request)
    {
        $exampleSessionId=$request->cookie('Example-SessionId');
        $result=['cookie'=>$exampleSessionId];
        $response=response($result)
            ->header('Content-type','application/json;charset-utf-8');
        if ($exampleSessionId==null) {
            $cookie=new Cookie('Example-SessionId','123456789',time()+10);
            $response=$response->cookie($cookie);
        }
        return $response;
    }
}