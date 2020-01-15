<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Correo_electronico;
use App\lugar;
use App\Telefono;
use App\Usuario;
use App\proveedor;
use App\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class proveedorCon extends Controller
{
    public function vista(){
      
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarProveedor', compact('estado','municipio','parroquia'));

    }

    public function crearproveedor(Request $request) {

        $proveedor = new proveedor;

        $proveedor->denominacion_comercial = $request->denominacionComercial;

        $proveedor->razon_social = $request->razonSocial;

        $proveedor->rif_proveedor = $request->tipoDocumento . $request->rifProveedor;

        $variable = $request->parroquiaFisica;
       
        $proveedor->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable)->where('tipo_lugar', '=', 'Parroquia')->value('codigo_lugar');

        $variable2 = $request->parroquiaFiscal;

        $proveedor->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable2)->where('tipo_lugar', '=', 'Parroquia')->value('codigo_lugar');

        $proveedor->direccion_fiscal = $request->detalleFiscal;
        $proveedor->direccion_fisica = $request->detalleFisica;

        $proveedor->save();

        $telefonos = explode(" ", $request->numerosTelefonicos);

        foreach($telefonos as $item) {
            $telefonoNuevo = new telefono;
            $telaux = explode("-", $item);
            $telefonoNuevo->codigo_area = $telaux[0];
            $telefonoNuevo->numero = $telaux[1];
            $telefonoNuevo->fk_proveedor = $proveedor->rif_proveedor;
            $telefonoNuevo->save();
        }

        $correos = explode(" ", $request->correosElectronicos);

        foreach($correos as $item) {
            $correoNuevo = new Correo_electronico;
            $correoNuevo->direccion_correo = $item;
            $correoNuevo->fk_proveedor = $proveedor->rif_proveedor;
            $correoNuevo->save();
        }

     /* $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $usuario->fk_proveedor =$request->rifProveedor;
        $usuario->save(); */

        return redirect()->route('proveedores');;

    }

    public function editar(Request $request, $rif_proveedor){

        $proveedorEditar = proveedor::findOrFail($rif_proveedor);
        $proveedorEditar->razon_social = $request->razonSocial;
        $proveedorEditar->denominacion_comercial = $request->denominacionComercial;
        $proveedorEditar->direccion_fisica = $request->direccionFisica;
        $proveedorEditar->direccion_fiscal = $request->direccionFiscal;

        $variable = $request->parroquiaFisica;
       
        $proveedorEditar->fk_lugar_fisica= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $variable2 = $request->parroquiaFiscal;

        $proveedorEditar->fk_lugar_fiscal= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('tipo_lugar', '=', 'Parroquia')
                         ->where('nombre_lugar', '=', $variable2)->value('codigo_lugar');;

        $proveedorEditar->save();

        if (strcmp($request->numerosTelefonicos, "")!=0){

        $telefonos = explode(" ", $request->numerosTelefonicos);

        foreach($telefonos as $item) {
            $telefonoNuevo = new telefono;
            $telaux = explode("-", $item);
            $telefonoNuevo->codigo_area = $telaux[0];
            $telefonoNuevo->numero = $telaux[1];
            $telefonoNuevo->fk_proveedor = $proveedorEditar->rif_proveedor;
            $telefonoNuevo->save();
        }
        }

        if (strcmp($request->correosElectronicos, "")!=0){
        $correos = explode(" ", $request->correosElectronicos);

        foreach($correos as $item) {
            $correoNuevo = new Correo_electronico;
            $correoNuevo->direccion_correo = $item;
            $correoNuevo->fk_proveedor = $proveedorEditar->rif_proveedor;
            $correoNuevo->save();
        }

        }   
        return redirect()->route('consultarProveedor', $rif_proveedor);
    }

    public function consultar($rif_proveedor){
        $proveedor = Proveedor::findOrFail($rif_proveedor);
        $telefono = telefono::where('fk_proveedor', $rif_proveedor)->get();  
        $correo = Correo_electronico::where('fk_proveedor', $rif_proveedor)->get();  
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        return view('consultarProveedor',compact('proveedor', 'telefono', 'correo', 'estado', 'municipio', 'parroquia'));

    }

    public function consultarPerfil(){ 
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $proveedor = Proveedor::findOrFail($usuario->fk_proveedor);
        $telefono = telefono::where('fk_proveedor', $proveedor->rif_proveedor)->get();
        $correo = Correo_electronico::where('fk_proveedor', $proveedor->rif_proveedor)->get(); 
        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        return view('consultarProveedor',compact('proveedor', 'telefono', 'correo', 'estado', 'municipio', 'parroquia'));
    }

    public function eliminar ($rif_proveedor){
        $proveedorEliminar = Proveedor::findOrFail($rif_proveedor);
        $proveedorEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function proveedores() {
        $proveedores = Proveedor::orderBy('razon_social')->paginate(5);
        return view('proveedores', compact('proveedores'));
    }

}