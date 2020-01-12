<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Correo_electronico;
use App\telefono;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CorreoTelefonoCon extends Controller
{
   

    public function eliminarCorreo ($codigo_correo){
        $correoEliminar = Correo_electronico::findOrFail($codigo_correo);
        $correoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function eliminarTelefono ($codigo_telefono){
        $telefonoEliminar = Telefono::findOrFail($codigo_telefono);
        $telefonoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function editarCorreo(Request $request, $codigo_correo){

        $correoEditar = Correo_electronico::findOrFail($codigo_correo);
        $correoEditar->direccion_correo = $request->direccionCorreo;
        $correoEditar->save();
        
        return redirect()->route('nómina');
    }

    public function consultarCorreo($codigo_correo){
        $correo = Correo_electronico::findOrFail($codigo_correo);
        return view('consultarCorreo',compact('correo'));

    }

    public function editarTelefono(Request $request, $codigo_telefono){

        $telefonoEditar = Telefono::findOrFail($codigo_telefono);
        $telaux = explode("-", $request->numeroTelefonico);
            $telefonoEditar->codigo_area = $telaux[0];
            $telefonoEditar->numero = $telaux[1];
        $telefonoEditar->save();
        
        return redirect()->route('nómina');
    }

    public function consultarTelefono($codigo_telefono){
        $telefono = Telefono::findOrFail($codigo_telefono);
        return view('consultarTelefono',compact('telefono'));

    }

    
    
}