<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Cliente;
use App\persona_contacto;
use App\Telefono;
use App\Correo_electronico;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactoCon extends Controller
{
    public function consultarProveedor($rif_proveedor){
        $proveedor = Proveedor::findOrFail($rif_proveedor);
                    
        $persona_contacto = persona_contacto::where('fk_proveedor', $rif_proveedor)->get();
        
        return view('ContactoProveedor',compact('proveedor', 'persona_contacto'));

    }

    public function consultarJuridico($rif_cliente){
        $cliente = Cliente::findOrFail($rif_cliente);
                    
        $persona_contacto = persona_contacto::where('fk_cliente', $rif_cliente)->get();
        
        return view('ContactoJuridico',compact('cliente', 'persona_contacto'));

    }

    public function consultarContactoProveedor($codigo_persona_contacto){
        $persona_contacto = persona_contacto::findOrFail($codigo_persona_contacto);
        $telefono = telefono::where('fk_contacto', $codigo_persona_contacto)->get();  
        $correo = Correo_electronico::where('fk_contacto', $codigo_persona_contacto)->get(); 
        return view('consultarContactoProveedor',compact('persona_contacto', 'telefono', 'correo'));

    }

    public function regContactoProveedor($rif_proveedor) {
        $proveedor = Proveedor::findOrFail($rif_proveedor);
        return view('registrarContactoProveedor', compact('proveedor'));
    }

    public function regContactoJuridico($rif_cliente) {
        $cliente = Cliente::findOrFail($rif_cliente);
        return view('registrarContactoJuridico', compact('cliente'));
    }

    public function RegistrarContactoProveedor(Request $request, $rif_proveedor){
        
        $contactoNuevo = new persona_contacto;
        $contactoNuevo->nombre_contacto =  $request->nombre;
        $contactoNuevo->apellido_contacto =  $request->apellido;
        $contactoNuevo->fk_proveedor =  $rif_proveedor;
        $contactoNuevo->save();

        $contactoEditar = persona_contacto::OrderBy('codigo_persona_contacto', 'desc')->first();
        $telefonoNuevo = new Telefono;
            $telaux = explode("-", $request->telefono);
            $telefonoNuevo->codigo_area = $telaux[0];
            $telefonoNuevo->numero = $telaux[1];
            $telefonoNuevo->fk_contacto = $contactoEditar->codigo_persona_contacto;
            $telefonoNuevo->save();

        $correoNuevo = new Correo_electronico;
        $correoNuevo->direccion_correo = $request->correo;
        $correoNuevo->fk_contacto = $contactoEditar->codigo_persona_contacto;;
        $correoNuevo->save();

        

        return redirect()->back();
    }



    public function RegistrarContactoJuridico(Request $request, $rif_cliente){
        
        $contactoNuevo = new persona_contacto;
        $contactoNuevo->nombre_contacto =  $request->nombre;
        $contactoNuevo->apellido_contacto =  $request->apellido;
        $contactoNuevo->fk_cliente =  $rif_cliente;
        $contactoNuevo->save();

        $contactoEditar = persona_contacto::OrderBy('codigo_persona_contacto', 'desc')->first();
        $telefonoNuevo = new Telefono;
            $telaux = explode("-", $request->telefono);
            $telefonoNuevo->codigo_area = $telaux[0];
            $telefonoNuevo->numero = $telaux[1];
            $telefonoNuevo->fk_contacto = $contactoEditar->codigo_persona_contacto;
            $telefonoNuevo->save();

        $correoNuevo = new Correo_electronico;
        $correoNuevo->direccion_correo = $request->correo;
        $correoNuevo->fk_contacto = $contactoEditar->codigo_persona_contacto;;
        $correoNuevo->save();

        

        return redirect()->back();
    }

    

    public function editarContactoProveedor(Request $request, $codigo_persona_contacto){

        $contactoEditar = persona_contacto::findOrFail($codigo_persona_contacto);
        $contactoEditar->nombre_contacto = $request->nombre;
        $contactoEditar->apellido_contacto = $request->apellido;

        $contactoEditar->save();

        $telefono = Telefono::where('fk_contacto', $codigo_persona_contacto)->get();
        
        $telefonoEditar = Telefono::findOrFail($telefono[0]->codigo_telefono);
        $telaux = explode("-", $request->telefono);
            $telefonoEditar->codigo_area = $telaux[0];
            $telefonoEditar->numero = $telaux[1];
        $telefonoEditar->save();

        $correo = Correo_electronico::where('fk_contacto', $codigo_persona_contacto)->get();

        $correoEditar = Correo_electronico::findOrFail($correo[0]->codigo_correo);
        $correoEditar->direccion_correo = $request->correo;
        $correoEditar->save();

        return redirect()->route('nómina');
    }

    public function eliminarContactoProveedor ($codigo_persona_contacto){
        $contactoEliminar = persona_contacto::findOrFail($codigo_persona_contacto);
        $contactoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    
}