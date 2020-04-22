<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use anlutro\cURL\cURL;

class webController extends Controller
{
    public function index(Request $request)
    {   
        $curl = new cURL();
        $uri = env('API_BACKEND_URL');
        $json = $curl->get($uri);
        $data = json_decode($json);

        return view('web')
                ->with('data', $data);
    } 
}//::END class
