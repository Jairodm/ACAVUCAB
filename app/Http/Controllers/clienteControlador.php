<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente; 
use App\lugar; 
use App\telefono; 
use App\Usuario;
use App\proveedor;
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
         $clienteNuevo->rif_cliente = $request->tipoRif . $request->rifNatural;
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
         $telefonoNuevo->fk_cliente = $request->tipoRif . $request->rifNatural;
         $telefonoNuevo->save();

         $user = Auth::user();
         $usuario = Usuario::where('nombre_usuario',$user->email)->first();
         $usuario->fk_cliente =$request->rifNatural;
         $usuario->save();
 
         return redirect()->route('index');;
 
     }



     public function crearjuridico(Request $request) {
        //return $request->all();

        $clienteNuevo = new Cliente;

        $clienteNuevo->denominacion_comercial = $request->denominacionComercial;

        $clienteNuevo->razon_social = $request->razonSocial;

        $clienteNuevo->rif_cliente = $request->tipoRif . $request->rifJuridico;

        $clienteNuevo->capital_disponible = $request->capitalDisponible;

        $clienteNuevo->pagina_web = $request->paginaWeb;

        $clienteNuevo->tipo_cliente = 'Juridico';

        $clienteNuevo->cantidad_puntos = 0;

        $clienteNuevo->direccion_fisica = $request->detalleDireccionFisica;

        $variable = $request->get('parroquia');
       
        $clienteNuevo->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $variable2 = $request->get('parroquia2');

        $clienteNuevo->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable2)->value('codigo_lugar');;

        $clienteNuevo->direccion_fiscal = $request->detalleDireccionFiscal;


        $clienteNuevo->save();

        $telefonoNuevo = new telefono;

        $telefonoNuevo->numero = $request->numerosTelefonicos;
        $telefonoNuevo->codigo_area = $request->codigotelefono;
        $telefonoNuevo->fk_cliente = $request->tipoRif .  $request->rifJuridico;
        $telefonoNuevo->save();

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $usuario->fk_cliente =$request->rifJuridico;
        $usuario->save();

        return redirect()->route('index');;

    }

     public function vistajuridico(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarClienteJuridico', compact('estado','municipio','parroquia'));

    }



    public function crearproveedor(Request $request) {

        $proveedor = new proveedor;

        $proveedor->denominacion_comercial = $request->denominacionComercial;

        $proveedor->razon_social = $request->razonSocial;

        $proveedor->rif_proveedor = $request->tipoRif . $request->rifProveedor;

        $proveedor->direccion_fisica = $request->detalleDireccionFisica;

        $variable = $request->get('parroquia');
       
        $proveedor->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $variable2 = $request->get('parroquia2');

        $proveedor->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable2)->value('codigo_lugar');;

        $proveedor->direccion_fiscal = $request->detalleDireccionFiscal;


        $proveedor->save();

        $telefonoNuevo = new telefono;

        $telefonoNuevo->numero = $request->numerosTelefonicos;
        $telefonoNuevo->codigo_area = $request->codigotelefono;
        $telefonoNuevo->fk_proveedor = $request->tipoRif . $request->rifProveedor;
        $telefonoNuevo->save();

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $usuario->fk_proveedor = $request->tipoRif . $request->rifProveedor;
        $usuario->save();

        return redirect()->route('index');;

    }

     public function vistaproveedor(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarProveedor', compact('estado','municipio','parroquia'));

    }
}
