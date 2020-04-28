<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use anlutro\cURL\cURL;
use App\Profile;


class webController extends Controller
{
    public function index()
    {   
        $curl = new cURL();
        $uri = env('API_BACKEND_URL');
        $json = $curl->get($uri);
        $data = json_decode($json);

        return view('web')
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
            $Perfil->Imagen = $request->Imagen;
        }

        try {
            $Perfil->save();
            $resul = "200";  
        } catch (\Exception $e) {
            $resul = '204';
        }

        return  $resul;
    }
}//::END class
