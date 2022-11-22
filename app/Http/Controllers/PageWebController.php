<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use anlutro\cURL\cURL;
use App\Profile;
use App\carrusel;
use App\Pagina;


class PageWebController extends Controller
{
    public function index()
    {   
        $curl = new cURL();
        $uri = env('API_BACKEND_URL').'/PageWeb';
        $json = $curl->get($uri);
        $data = json_decode($json);

        return view('PageWeb')
                ->with('data', $data);
    }//::END=>index

    public function update_pageWeb(Request $request)
    {
        $paginaW = Pagina::find($request->id);
        //General
        $paginaW->Name = $request->Name;
        $paginaW->Estado = $request->Estado;
        $paginaW->Private_Public = $request->Private_Public;
        $paginaW->Roll = $request->Roll;
        $paginaW->Url = $request->Url;
        $paginaW->Home = $request->Url2;
        //Diseño
        $paginaW->Color = $request->Color;
        if($request->Background != null AND $request->Background !='null' AND $request->Background !=''){
                $request->file('Background');
                $path = Storage::disk('public')->put('image',$request->file('Background'));
                $paginaW->background = $path;
        }
        if($request->ImgLogo == true):
                $request->file('Logo');
                var_dump($request->file('Logo'));
                $path = Storage::disk('public2')->put('h2.jpg',$request->file('Logo'));  
                // $paginaW->Logo = $path;
        endif;
        
        //Descripcion
        $paginaW->Description = utf8_encode($request->Description);        

        try {
            $paginaW->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204: '.$e;
        }

        // return $resul;
        return $paginaW;
    }//END=>update_pageWeb
}//::END class