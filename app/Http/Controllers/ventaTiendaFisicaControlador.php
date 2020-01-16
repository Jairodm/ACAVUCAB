<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Detalle_venta;
use App\Tienda_fisica;
use App\Venta;
use App\Metodo_pago;
use App\Empleado;
use App\Cliente;
use App\Inventario;
use App\Cerveza;

class ventaTiendaFisicaControlador extends Controller
{
    public function vistaVenta(Request $request){


        $existeCliente = $request->rif_cliente;
        $buscaCliente = Cliente::where('rif_cliente','=',$existeCliente)->value('rif_cliente');
        $tipoCliente = Cliente::where('rif_cliente','=',$existeCliente)->value('tipo_cliente');
        if ($buscaCliente){
            $mostrarCliente = $existeCliente;
            if($tipoCliente == 'Natural'){
            $nombreCliente = Cliente::where('rif_cliente','=',$existeCliente)->value('primer_nombre');
            }else{
            $nombreCliente = Cliente::where('rif_cliente','=',$existeCliente)->value('denominacion_comercial');
            }
        }else{
            $mostrarCliente = 'El cliente no está registrado';
            $nombreCliente = '';

        }




        return view ('TiendaFisica',compact('mostrarCliente','nombreCliente'));

    }

    public function crearVenta ($mostrarCliente){

        $nuevaVenta = new Venta();
        $nuevaVenta->fecha_venta = now();
        $nuevaVenta->monto_total_venta=0;
        // $nuevaVenta->fk_empleado_1 = Aqui debería pasar el id del empleado que ejecuta la venta ;
        $nuevaVenta->fk_cliente = $mostrarCliente;
        $nuevaVenta->fk_tienda_fisica = 1;
        $nuevaVenta->save();

        $ventaActual = Venta::OrderBy('numero_factura','desc')->first();
        //$cervezas = Cerveza::all();
        $cliente = Cliente::FindOrFail($mostrarCliente);
        //$detalleVenta = Detalle_venta::where('venta','=',$ventaActual);
        return view ('ventaTiendaFisica',compact('mostrarCliente','cliente','ventaActual'));
  
    }


    public function verDetalle($ventaActual){
        $cervezas = Cerveza::all();
        $detalleVenta = Detalle_venta::where('venta','=',$ventaActual)->get();
        $totalFactura = venta::where('numero_factura','=',$ventaActual)->value('monto_total_venta');
        
        return view ('ventaDetalleFisica',compact('cervezas','detalleVenta','ventaActual','totalFactura'));

    }
    
    public function añadirProducto(Request $request,$ventaActual){
        
      

        $nuevoDetalle = new Detalle_venta;
        $nuevoDetalle->cantidad_venta = $request->cantidad_venta;
        $nombreCerveza = $request->cerveza;
        $nuevoDetalle->venta = $ventaActual;
        $nuevoDetalle->cerveza = Cerveza::where('nombre_cerveza','=',$nombreCerveza)->value('codigo_cerveza');
        $nuevoDetalle->precio_unitario_venta = Cerveza::where('nombre_cerveza','=',$nombreCerveza)->value('precio');
        $nuevoDetalle->save();

        $totalFactura = venta::findOrFail($ventaActual);
        $totalFactura->monto_total_venta = $totalFactura->monto_total_venta + ($nuevoDetalle->precio_unitario_venta * $nuevoDetalle->cantidad_venta);
        $totalFactura->save();

        return redirect()->back();




    }








}
