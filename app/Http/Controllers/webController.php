<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function index(Request $request)
    {   

            return view('web');
    } 
}//::END class
