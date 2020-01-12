<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Cliente;
use App\Metodo_pago;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MetodoPagoCon extends Controller
{
    public function consultarMetodosDePago($rif_cliente){
        $cliente = Cliente::findOrFail($rif_cliente);
                    
        $metodo_pago = Metodo_pago::where('fk_cliente', $rif_cliente)->get();
        
        return view('ConsultarMetodosDePago',compact('cliente', 'metodo_pago'));

    }

    public function consultarMetodoCliente($codigo_metodo_pago){
        $metodo_pago = metodo_pago::findOrFail($codigo_metodo_pago);
        return view('consultarMetodoCliente',compact('metodo_pago'));

    }

    public function regMetodoCliente($rif_cliente) {
        $cliente = Cliente::findOrFail($rif_cliente);
        return view('registrarMetodoCliente', compact('cliente'));
    }
    
    public function RegistrarMetodoCliente(Request $request, $rif_cliente){
        
        $metodoNuevo = new metodo_pago;
        $metodoNuevo->tipo_metodo_pago =  'Tarjeta de Crédito';
        $metodoNuevo->tipo_tarjeta_credito =$request->tipoTarjeta;
        $metodoNuevo->numero_tarjeta_credito =  $request->numeroTarjeta;
        $metodoNuevo->nombre_titular= $request->nombreTarjeta;
        $metodoNuevo->cedula_titular= $request->tipoCI.$request->cedulaNatural;
        $metodoNuevo->cvv= $request->cvv;
        $metodoNuevo->fecha_vencimiento = $request->vencimiento;
        $metodoNuevo->fk_cliente = $rif_cliente;
        $metodoNuevo->save();

        return redirect()->back();
    }

    public function editarMetodoCliente(Request $request, $codigo_metodo_pago){

        $metodoNuevo = metodo_pago::findOrFail($codigo_metodo_pago);
        $metodoNuevo->tipo_tarjeta_credito =  $request->tipoTarjeta;
        $metodoNuevo->numero_tarjeta_credito =  $request->numeroTarjeta;
        $metodoNuevo->nombre_titular= $request->nombreTitular;
        $metodoNuevo->cvv= $request->cvv;
        $metodoNuevo->fecha_vencimiento = $request->vencimiento;

        $metodoNuevo->save();

        return redirect()->route('nómina');
    }

    public function eliminarMetodoCliente ($codigo_metodo_pago){
        $metodoEliminar = metodo_pago::findOrFail($codigo_metodo_pago);
        $metodoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    
}