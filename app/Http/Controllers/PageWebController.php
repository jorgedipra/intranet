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

    public function update_presentation(Request $request)
    {
        $Perfil = Profile::find(1);

        $Perfil->Title_card = $request->Title_card;
        $Perfil->Nombre = $request->Nombre;
        $Perfil->Apellido = $request->Apellido;
        $Perfil->Cargo = $request->Cargo;
        $Perfil->Empresa = $request->Empresa;
        if($request->Imagen!=null or $request->Imagen !=''){
            $request->file('Imagen');
            $path =Storage::disk('public')->put('image',$request->file('Imagen'));
            $Perfil->Imagen = $path;
        }
        try {
            $Perfil->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204';
        }

        return  $resul;
    }//END=>update_presentation

    public function update_frase(Request $request)
    {
        $Perfil = Profile::find(1);

        $Perfil->Titulo_frase = $request->Titulo_frase;
        $Perfil->Frase = utf8_encode($request->Frase);
    
        if($request->Imagen2!=null or $request->Imagen2 !=''){
            $request->file('Imagen2');
            $path =Storage::disk('public')->put('image',$request->file('Imagen2'));
            $Perfil->Imagen2 = $path;
        }
        try {
            $Perfil->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204';
        }

        return  $resul;
    }//END=>update_presentation

    public function update_carrusel(Request $request){
        $carrusel = carrusel::find($request->id);

        $carrusel->Title = $request->Title;
        $carrusel->SubTitle = $request->SubTitle;

        if($request->Url!=null or $request->Url !=''){
            $request->file('Url');
            $path =Storage::disk('public')->put('image',$request->file('Url'));
            $carrusel->Url = $path;
        }

        try {
            $carrusel->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204';
        }

        return  $resul;
    }//END=>update_carrusel

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
        if($request->Background !=null AND $request->Background !='null' AND $request->Background !=''){
            $request->file('Background');
            $path =Storage::disk('public')->put('image',$request->file('Background'));
            $paginaW->background = $path;
        }
        $paginaW->Logo = $request->Logo;
        //Descripcion
        $paginaW->Description = utf8_encode($request->Description);        

        try {
            // $paginaW->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204: '.$e;
        }

        // return $resul;
        // return $paginaW;
    }//END=>update_pageWeb
}//::END class