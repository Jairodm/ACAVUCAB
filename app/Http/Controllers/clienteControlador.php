<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente; 
use App\lugar; 
use App\telefono; 
use App\Usuario;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class clienteControlador extends Controller
{
    public function vista(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarClienteNatural', compact('estado','municipio','parroquia'));

    }

    public function consultar(){
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        
    
        $cliente = Cliente::where('rif_cliente',$usuario->fk_cliente)->first();
        return view('consultarClienteNatural',compact('cliente'));


    }
    

    public function crear(Request $request) {
         //return $request->all();
 
         $clienteNuevo = new Cliente;
         $clienteNuevo->rif_cliente = $request->rifNatural;
         $clienteNuevo->cedula_natural = $request->CedulaNatural;
 
         $clienteNuevo->primer_nombre = $request->primerNombreNatural;
 
         $clienteNuevo->segundo_nombre = $request->segundoNombreNatural;
 
         $clienteNuevo->primer_apellido = $request->primerApellidoNatural;
 
         $clienteNuevo->segundo_apellido = $request->segundoApellidoNatural;
 
         $clienteNuevo->tipo_cliente = 'Natural';
 
         $clienteNuevo->cantidad_puntos = 0;

         $clienteNuevo->direccion_fisica = $request->direccionFisica;
 
         $variable = $request->get('parroquia');
        
         $clienteNuevo->fk_lugar_fisica= DB::table('lugar')
                          ->select(DB::raw('codigo_lugar'))
                          ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

         $clienteNuevo->fk_lugar_fiscal= DB::table('lugar')
                          ->select(DB::raw('codigo_lugar'))
                          ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;
 
 
         $clienteNuevo->save();

         $telefonoNuevo = new telefono;

         $telefonoNuevo->numero = $request->telefonoNatural;
         $telefonoNuevo->codigo_area = $request->codigotelefonoNatural;
         $telefonoNuevo->fk_cliente = $request->rifNatural;
         $telefonoNuevo->save();

         $user = Auth::user();
         $usuario = Usuario::where('nombre_usuario',$user->email)->first();
         $usuario->fk_cliente =$request->rifNatural;
         $usuario->save();
 
         return redirect()->route('index');;
 
     }



     public function vistajuridico(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarClienteJuridico', compact('estado','municipio','parroquia'));

    }
}
