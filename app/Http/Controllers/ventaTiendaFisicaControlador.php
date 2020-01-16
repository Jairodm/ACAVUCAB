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
use App\Divisa;


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
        //$totalFactura = venta::where('numero_factura','=',$ventaActual)->value('monto_total_venta');
        $totalFactura = 0;
        
        $productos = detalle_venta::where('venta','=',$ventaActual)->get();
        foreach($productos as $producto){
            $subtotal = $producto->cantidad_venta * $producto->cervezax->precio;
            $totalFactura = $subtotal + $totalFactura;
        }
        return view ('ventaDetalleFisica',compact('cervezas','detalleVenta','ventaActual','totalFactura'));
       
    }
    
    public function añadirProducto(Request $request,$ventaActual){
        $request->validate([
            'cerveza' => 'required',
            'cantidad_venta' => 'required'
        ]);
        $cantidadComprada = $request->cantidad_venta;
        $nombreCerveza = $request->cerveza;
        $buscaCodigoCerveza = Cerveza::where('nombre_cerveza','=',$nombreCerveza)->value('codigo_cerveza');
        $cantidadEnExistencia = Inventario::where('fk_cerveza',$buscaCodigoCerveza)->orderBy('fecha_operacion','desc')->first();
   
        //Comprobar inventario
        $flag=1;
        if ($cantidadComprada > $cantidadEnExistencia->cantidad_disponible){
            $flag=0;
        }
        //Añade el producto
        if($flag==1){
        $nuevoDetalle = new Detalle_venta;
        $nuevoDetalle->cantidad_venta = $request->cantidad_venta;
        $nuevoDetalle->venta = $ventaActual;
        $nuevoDetalle->precio_unitario_venta = Cerveza::where('nombre_cerveza','=',$nombreCerveza)->value('precio');
        $nuevoDetalle->cerveza =$buscaCodigoCerveza;
        $nuevoDetalle->save();
        }

        if($flag==1){
           return redirect()->back()->with('exito','Añadido con éxito');
        }

        if($flag==0){
            return redirect()->back()->with('error','Imposible añadir. Cantidad insuficiente en inventario');
        }

    }

    public function eliminardelDetalle($codigo_detalle_venta){
        $eliDetalle = detalle_venta::findOrFail($codigo_detalle_venta);
        $eliDetalle->delete();
        return redirect()->back()->with('eliminado','Eliminado con exito');
    }

    public function muestraMetodos($ventaActual){
        return view ('ventaTiendaFisicaMetodoPago',compact('ventaActual'));
    }

    public function metodoPago($ventaActual,$TipoMetodoPago){

        if($TipoMetodoPago == 'Divisa'){
            $divisas = Divisa::all();
            return view('ventaTiendaFisicaMetodoPagoDatos',compact('TipoMetodoPago','ventaActual','divisas'));
        }else{
        return view('ventaTiendaFisicaMetodoPagoDatos',compact('TipoMetodoPago','ventaActual'));
        }
    }

    public function agregarMetodo(Request $request ,$ventaActual,$TipoMetodoPago){

        if($TipoMetodoPago == 'Efectivo'){
            $cliente=Venta::where('numero_factura','=',$ventaActual)->value('fk_cliente');
            $nuevoMetodo = new Metodo_pago();
            $nuevoMetodo->denominacion = $request->denominacion;
            $nuevoMetodo->valor_moneda = $request->valor_moneda;
            $nuevoMetodo->fk_cliente = $cliente;
            $nuevoMetodo->tipo_metodo_pago = 'Efectivo';
            $nuevoMetodo->save();
            //descontar del inventario
            $detalleVentas = Detalle_venta::where('venta','=',$ventaActual)->get();

            foreach($detalleVentas as $item){
                $inventario = new Inventario;
                $inventarioAux = inventario::where('fk_cerveza','=',$item->cerveza)->OrderBy('codigo_inventario','desc')->first();
                $inventario->cantidad_operacion = $item->cantidad_venta;
                $inventario->fecha_operacion = now();
                $inventario->fk_cerveza = $item->cerveza;
                $inventario->fk_venta = $ventaActual;
                $inventario->cantidad_disponible = $inventarioAux->cantidad_disponible - $item->cantidad_venta;
                $inventario->save();
            }
            
            return view('pagorealizado',compact('ventaActual'));

        }

        if($TipoMetodoPago == 'Credito'){
            $cliente=Venta::where('numero_factura','=',$ventaActual)->value('fk_cliente');
            $nuevoMetodo = new Metodo_pago;
            $nuevoMetodo->tipo_tarjeta_credito = $request->tipo_tarjeta_credito;
            $nuevoMetodo->numero_tarjeta_credito = $request->numero_tarjeta_credito;
            $nuevoMetodo->fecha_vencimiento = $request->fecha_vencimiento;
            $nuevoMetodo->fk_cliente = $cliente;
            $nuevoMetodo->tipo_metodo_pago = 'Credito';
            $nuevoMetodo->save();
            //Descuenta inventario
            $detalleVentas = Detalle_venta::where('venta','=',$ventaActual)->get();
            foreach($detalleVentas as $item){
                $inventario = new Inventario;
                $inventarioAux = inventario::where('fk_cerveza','=',$item->cerveza)->OrderBy('codigo_inventario','desc')->first();
                $inventario->cantidad_operacion = $item->cantidad_venta;
                $inventario->fecha_operacion = now();
                $inventario->fk_cerveza = $item->cerveza;
                $inventario->fk_venta = $ventaActual;
                $inventario->cantidad_disponible = $inventarioAux->cantidad_disponible - $item->cantidad_venta;
                $inventario->save();
            }
            return view('pagorealizado',compact('ventaActual'));
        }

        if ($TipoMetodoPago == 'Debito'){
            $cliente=Venta::where('numero_factura','=',$ventaActual)->value('fk_cliente');
            $nuevoMetodo = new Metodo_pago;
            $nuevoMetodo->banco = $request->banco;
            $nuevoMetodo->numero_tarjeta_debito = $request->numero_tarjeta_debito;
            $nuevoMetodo->fk_cliente = $cliente;
            $nuevoMetodo->tipo_metodo_pago = 'Debito';
            $nuevoMetodo->save();
            //Descuenta inventario
            $detalleVentas = Detalle_venta::where('venta','=',$ventaActual)->get();
            foreach($detalleVentas as $item){
                $inventario = new Inventario;
                $inventarioAux = inventario::where('fk_cerveza','=',$item->cerveza)->OrderBy('codigo_inventario','desc')->first();
                $inventario->cantidad_operacion = $item->cantidad_venta;
                $inventario->fecha_operacion = now();
                $inventario->fk_cerveza = $item->cerveza;
                $inventario->fk_venta = $ventaActual;
                $inventario->cantidad_disponible = $inventarioAux->cantidad_disponible - $item->cantidad_venta;
                $inventario->save();
            }
            return view('pagorealizado',compact('ventaActual'));
        }

        if ($TipoMetodoPago == 'Cheque'){
            $cliente=Venta::where('numero_factura','=',$ventaActual)->value('fk_cliente');
            $nuevoMetodo = new Metodo_pago;
            $nuevoMetodo->banco = $request->banco;
            $nuevoMetodo->numero_cheque = $request->numero_cheque;
            $nuevoMetodo->numero_cuenta = $request->numero_cuenta;
            $nuevoMetodo->fk_cliente = $cliente;
            $nuevoMetodo->tipo_metodo_pago = 'Cheque';
            $nuevoMetodo->save();
            //Descuenta inventario
            $detalleVentas = Detalle_venta::where('venta','=',$ventaActual)->get();
            foreach($detalleVentas as $item){
                $inventario = new Inventario;
                $inventarioAux = inventario::where('fk_cerveza','=',$item->cerveza)->OrderBy('codigo_inventario','desc')->first();
                $inventario->cantidad_operacion = $item->cantidad_venta;
                $inventario->fecha_operacion = now();
                $inventario->fk_cerveza = $item->cerveza;
                $inventario->fk_venta = $ventaActual;
                $inventario->cantidad_disponible = $inventarioAux->cantidad_disponible - $item->cantidad_venta;
                $inventario->save();
            }
            return view('pagorealizado',compact('ventaActual'));
        }

        if ($TipoMetodoPago == 'Divisa'){
            $cliente=Venta::where('numero_factura','=',$ventaActual)->value('fk_cliente');
            $codigoDivisa = Divisa::where('nombre_divisa','=',$request->nombre_divisa)->value('codigo_divisa');
            $nuevoMetodo = new Metodo_pago;
            $nuevoMetodo->denominacion = $request->denominacion;
            $nuevoMetodo->valor_moneda = $request->valor_moneda;
            $nuevoMetodo->fk_divisa = $codigoDivisa;
            $nuevoMetodo->fk_cliente = $cliente;
            $nuevoMetodo->tipo_metodo_pago = 'Divisa';
            $nuevoMetodo->save();
            //Descuenta inventario
            $detalleVentas = Detalle_venta::where('venta','=',$ventaActual)->get();
            foreach($detalleVentas as $item){
                $inventario = new Inventario;
                $inventarioAux = inventario::where('fk_cerveza','=',$item->cerveza)->OrderBy('codigo_inventario','desc')->first();
                $inventario->cantidad_operacion = $item->cantidad_venta;
                $inventario->fecha_operacion = now();
                $inventario->fk_cerveza = $item->cerveza;
                $inventario->fk_venta = $ventaActual;
                $inventario->cantidad_disponible = $inventarioAux->cantidad_disponible - $item->cantidad_venta;
                $inventario->save();
            }
            return view('pagorealizado',compact('ventaActual'));
        }





    }


    public function eliminarVenta($ventaActual){
        $eliVenta = venta::findOrFail($ventaActual);
        $eliVenta->delete();
        return view ('TiendaFisica');
    }




}
