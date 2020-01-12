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
        $cliente = Cliente::findOrFail($usuario->fk_cliente);
        $telefono = telefono::where('fk_cliente', $cliente->rif_cliente)->get();
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        return view('consultarClienteNatural',compact('cliente', 'telefono', 'estado', 'municipio', 'parroquia'));


    }
    
    public function consultarJuridico(){
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $cliente = Cliente::findOrFail($usuario->fk_cliente);
        $telefono = telefono::where('fk_cliente', $cliente->rif_cliente)->get();
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        return view('consultarClienteJuridico',compact('cliente', 'telefono', 'estado', 'municipio', 'parroquia'));


    }

    public function crear(Request $request) {
         //return $request->all();
 
         $clienteNuevo = new Cliente;
         $clienteNuevo->rif_cliente = $request->tipoRif.$request->rifNatural;
         $clienteNuevo->cedula_natural = $request->tipoCI.$request->CedulaNatural;
 
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
                          ->where('tipo_lugar', '=', 'Parroquia')
                          ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;
 
 
         $clienteNuevo->save();

         $telefonoNuevo = new telefono;

         $telefonoNuevo->numero = $request->telefonoNatural;
         $telefonoNuevo->codigo_area = $request->codigotelefonoNatural;
         $telefonoNuevo->fk_cliente = $clienteNuevo->rif_cliente;
         $telefonoNuevo->save();

         $user = Auth::user();
         $usuario = Usuario::where('nombre_usuario',$user->email)->first();
         $usuario->fk_cliente =$clienteNuevo->rif_cliente;
         $usuario->save();
 
         return redirect()->route('index');;
 
     }

     public function editarNatural(Request $request, $rif_cliente) {
        //return $request->all();

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $clienteNuevo = Cliente::findOrFail($usuario->fk_cliente);

        $clienteNuevo->primer_nombre = $request->primerNombreNatural;

        $clienteNuevo->segundo_nombre = $request->segundoNombreNatural;

        $clienteNuevo->primer_apellido = $request->primerApellidoNatural;

        $clienteNuevo->segundo_apellido = $request->segundoApellidoNatural;

        $clienteNuevo->direccion_fisica = $request->direccionFisica;

        $variable = $request->parroquia;
       
        $clienteNuevo->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;


        $clienteNuevo->save();

        if (strcmp($request->telefonoNatural, "")!=0){

            $telefonos = explode(" ", $request->telefonoNatural);
    
            foreach($telefonos as $item) {
                $telefonoNuevo = telefono::where('fk_cliente', $usuario->fk_cliente)->first();
                $telefonoEditar = telefono::findOrFail($telefonoNuevo->codigo_telefono);
                $telaux = explode("-", $item);
                $telefonoEditar->codigo_area = $telaux[0];
                $telefonoEditar->numero = $telaux[1];
                $telefonoEditar->save();
            }
            }

        return redirect()->route('index');;

    }

    public function eliminarNatural ($rif_cliente){
        $clienteEliminar = Cliente::findOrFail($rif_cliente);
        $clienteEliminar->delete();
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect()->route('index');
    }

     public function crearjuridico(Request $request) {
        //return $request->all();

        $clienteNuevo = new Cliente;

        $clienteNuevo->denominacion_comercial = $request->denominacionComercial;

        $clienteNuevo->razon_social = $request->razonSocial;

        $clienteNuevo->rif_cliente = $request->tipoRif.$request->rifJuridico;

        $clienteNuevo->capital_disponible = $request->capitalDisponible;

        $clienteNuevo->pagina_web = $request->paginaWeb;

        $clienteNuevo->tipo_cliente = 'Juridico';

        $clienteNuevo->cantidad_puntos = 0;

        $clienteNuevo->direccion_fisica = $request->detalleDireccionFisica;

        $variable = $request->get('parroquia');
       
        $clienteNuevo->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $variable2 = $request->get('parroquia2');

        $clienteNuevo->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable2)->value('codigo_lugar');;

        $clienteNuevo->direccion_fiscal = $request->detalleDireccionFiscal;


        $clienteNuevo->save();

        $telefonos = explode(" ", $request->numerosTelefonicos);

        foreach($telefonos as $item) {
            $telefonoNuevo = new telefono;
            $telaux = explode("-", $item);
            $telefonoNuevo->codigo_area = $telaux[0];
            $telefonoNuevo->numero = $telaux[1];
            $telefonoNuevo->fk_cliente = $clienteNuevo->rif_cliente;
            $telefonoNuevo->save();
        }
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $usuario->fk_cliente =$clienteNuevo->rif_cliente;
        $usuario->save();

        return redirect()->route('index');;

    }


    public function editarJuridico(Request $request, $rif_cliente) {
        //return $request->all();

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $clienteNuevo = Cliente::findOrFail($usuario->fk_cliente);

        $clienteNuevo->denominacion_comercial = $request->denominacionComercial;

        $clienteNuevo->razon_social = $request->razonSocial;

        $clienteNuevo->capital_disponible = $request->capitalJuridico;

        $clienteNuevo->pagina_web = $request->direccionWeb;

        $clienteNuevo->direccion_fisica = $request->detalleDireccionFisica;

        $variable = $request->get('parroquia');
       
        $clienteNuevo->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $variable2 = $request->get('parroquia2');

        $clienteNuevo->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable2)->value('codigo_lugar');;

        $clienteNuevo->direccion_fiscal = $request->detalleDireccionFiscal;


        $clienteNuevo->save();

        if (strcmp($request->numerosTelefonicos, "")!=0){

            $telefonos = explode(" ", $request->numerosTelefonicos);
    
            foreach($telefonos as $item) {
                $telefonoNuevo = new telefono;
                $telaux = explode("-", $item);
                $telefonoNuevo->codigo_area = $telaux[0];
                $telefonoNuevo->numero = $telaux[1];
                $telefonoNuevo->fk_cliente = $clienteNuevo->rif_cliente;
                $telefonoNuevo->save();
            }
            }

        return redirect()->route('index');;

    }

    public function eliminarJuridico ($rif_cliente){
        $clienteEliminar = Cliente::findOrFail($rif_cliente);
        $clienteEliminar->delete();
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect()->route('index');
    }



     public function vistajuridico(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarClienteJuridico', compact('estado','municipio','parroquia'));

    }

}
