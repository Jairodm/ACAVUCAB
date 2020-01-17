<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerveza;
use App\Cargo;
use App\Ingrediente;
use App\Receta;
use App\Carrito;
use App\Usuario;
use App\User;
use App\Cliente;
use App\Detalle_venta;
use App\Venta;
use App\Metodo_pago;
use App\Inventario;
use App\Estatus;
use App\Estatus_y_venta;
use App\Empleado;
use App\Orden_compra;
use App\Detalle_compra;
use App\Estatus_y_orden;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class consultarProductoClienteControlador extends Controller
{
    
    public function consultar($codigo_cerveza){
        $cerveza = Cerveza::findOrFail($codigo_cerveza);
        $receta = Receta:: where ('codigo_cerveza', $codigo_cerveza)->get();
        return view('ConsultarProductoCliente',compact('cerveza', 'receta'));

    }

    public function editar(Request $request, $cedula_empleado){

        $empleadoEditar = Empleado::findOrFail($cedula_empleado);
        $empleadoEditar->salario = $request->salario;

        $variable = $request->fk_cargo;

        $empleadoEditar->fk_cargo = DB::table('cargo')
                                    ->select(DB::raw('codigo_cargo'))
                                    ->where('nombre_cargo', '=', $variable)->value('codigo_cargo');;

        $empleadoEditar->save();
        return redirect()->route('nómina');
    }

    public function eliminar ($cedula_empleado){
        $empleadoEliminar = Empleado::findOrFail($cedula_empleado);
        $empleadoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function registrarEnCarrito (request $request, $codigo_cerveza){
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $cliente= $usuario->fk_cliente;
        $buscarCarrito= Carrito::where('fk_cliente', $cliente)->where('fk_cerveza', $codigo_cerveza)->first();
        if($buscarCarrito){
            $aux= $buscarCarrito->cantidad;
            $buscarCarrito->cantidad = $aux + $request->cantidadProducto;
        }else{
        $buscarCarrito = new Carrito;
        $buscarCarrito->cantidad = $request->cantidadProducto;
        $buscarCarrito->fk_cliente=$usuario->fk_cliente;
        $buscarCarrito->fk_cerveza = $codigo_cerveza;
        }
        $buscarCarrito->save();

        return redirect()->back();
    }

    public function consultarCarrito(){
        
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $carrito = Carrito::where('fk_cliente', $usuario->fk_cliente)->get();
        $cliente = Cliente::where('rif_cliente', $usuario->fk_cliente)->get();
        $total=0;
        foreach ($carrito as $item){
            $monto= $item->cantidad * $item->cerveza->precio;
            $total=$total+$monto;
        }

        
        return view('carrito',compact('carrito', 'cliente', 'total'));

    }

    public function consultarCarritoIndividual($codigo_carrito){
        
        $carrito = Carrito::findOrFail($codigo_carrito);
        return view('consultarCarrito',compact('carrito'));

    }

    public function eliminarDeCarrito($codigo_carrito){
        
        $carrito = Carrito::findOrFail($codigo_carrito);
        $carrito->delete();
        
        return redirect()->route('carrito');

    }

    public function modificarCarrito(Request $request, $codigo_carrito){

        $contactoEditar = Carrito::findOrFail($codigo_carrito);
        $contactoEditar->cantidad = $request->cantidad;
        $contactoEditar->save();

        return redirect()->route('carrito');
    }

    public function escogerMetodo(Request $request, $total){
        
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $cliente = Cliente::where('rif_cliente',$usuario->fk_cliente)->first();
        $carrito = Carrito::where('fk_cliente', $usuario->fk_cliente)->get();
        $metodo_pago = Metodo_pago::where('fk_cliente', $usuario->fk_cliente)->get();
        return view('EscogerMetodoDePagoCompraDigital',compact('total',  'metodo_pago', 'cliente', 'carrito'));

    }

    public function digitalProcesada(Request $request, $codigo_metodo_pago, $total){
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $cliente = Cliente::where('rif_cliente',$usuario->fk_cliente)->first();
        $carrito = Carrito::where('fk_cliente', $usuario->fk_cliente)->get();

        //Comprobar inventario
        $flag=1;
        foreach ($carrito as $item){
            $inventarioAux=Inventario::where('fk_cerveza', $item->fk_cerveza)->OrderBy('codigo_inventario', 'desc')->first();
            if ($inventarioAux->cantidad_disponible < $item->cantidad){
                $flag=0;
            }
        }

        //Procesar compra
        if($flag==1){
        $venta = new venta;
        $venta->fecha_venta = now();
        $venta->monto_total_venta = $total;
        $venta->fk_cliente= $cliente->rif_cliente;
        $venta->fk_metodo_pago= $codigo_metodo_pago;
        $venta->fk_tienda_web= 2;
        $venta->save(); 

        $ventaAux = venta::OrderBy('numero_factura', 'desc')->first();
        $ev= new estatus_y_venta;
        $ev->estatus= 1;
        $ev->venta=$ventaAux->numero_factura;
        $ev->fecha_estatus= now();
        $ev->save();
        foreach ($carrito as $item){
            $detalle_venta = new Detalle_venta;
            $detalle_venta->cantidad_venta = $item->cantidad;
            $detalle_venta->precio_unitario_venta = $item->cerveza->precio;
            $detalle_venta->cerveza=$item->fk_cerveza;
            $detalle_venta->venta=$ventaAux->numero_factura;
            $detalle_venta->save();

            $inventario = new inventario;
            $inventarioAux=Inventario::where('fk_cerveza', $item->fk_cerveza)->OrderBy('codigo_inventario', 'desc')->first();
            $inventario->cantidad_operacion= $item->cantidad;
            $inventario->cantidad_disponible= $inventarioAux->cantidad_disponible - $item->cantidad;
            $inventario->fecha_operacion= now();
            $inventario->fk_cerveza= $item->fk_cerveza;
            $inventario->fk_venta= $ventaAux->numero_factura;
            $inventario->save();

            //Generar orden de compra

            if ($inventario->cantidad_disponible < 100){

                $aprobadas= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 4)->pluck('orden');
                $pendientes= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 1)->pluck('orden');
                $entregadas= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 3)->pluck('orden');

                $ests=null;
                $ords=null;
                $dets= Detalle_compra::where ('cerveza', $item->fk_cerveza)->OrderBy('codigo_detalle_compra', 'desc')->first();
                if($dets){
                $ords= Orden_compra:: where ('codigo_orden_compra', $dets->orden_compra)->first();
                }
                if($ords){
                    $ests= Estatus_y_orden::whereIn('orden', $pendientes)->whereNotIn('orden', $entregadas)->
                    where('orden', $ords->codigo_orden_compra)->distinct('orden')->get();
                }
                
                if (is_null($ests)){
                    $orden = new Orden_compra;
                $orden->fecha_orden_compra = now();
                $orden->monto_total_orden_compra= 10000 * $item->cerveza->precio;
                $orden->fk_proveedor =  $item->cerveza->fk_proveedor;
                $orden->save();

                $ordenAux = Orden_compra::OrderBy('codigo_orden_compra', 'desc')->first();
                $detorden = new Detalle_compra;
                $detorden->cantidad_compra = 10000;
                $detorden->precio_unitario_compra = $item->cerveza->precio;
                $detorden->cerveza= $item->cerveza->codigo_cerveza;
                $detorden->orden_compra= $ordenAux->codigo_orden_compra;
                $detorden->save();

                $estorden = new Estatus_y_orden;
                $estorden->estatus= 1; 
                $estorden->orden = $ordenAux->codigo_orden_compra;
                $estorden->fecha_estatus= now();
                $estorden->save();
                }
            }
        }
        foreach ($carrito as $item){
            $item->delete();
        }

        }
        if ($flag==1){
            return redirect()->route('carrito');
        }
        if ($flag==0){
            return redirect()->route('carrito')->withErrors(['  La compra no pudo ser procesada, actualmente no disponemos de la
            cantidad solicitada para uno o más de los productos solicitados', 'The Message']);
        }

    }

    public function digitalProcesar(Request $request, $codigo_metodo_pago, $total ){

        $cliente=$request->cliente;
        $carrito = Carrito::where('fk_cliente', $cliente)->get();
        $total;

        
        return view('digitalProcesada',compact('codigo_metodo_pago', 'total'));

    }

    public function consultarVenta($numero_factura){
        
        $venta = Venta::findOrFail($numero_factura);
        $detalleVenta = detalle_venta::where ('venta', $numero_factura)->get();
        return view('consultarVenta',compact('venta', 'detalleVenta'));

    }

    public function consultarCompras(){
        
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $cliente = Cliente::where('rif_cliente',$usuario->fk_cliente)->first();
        $venta = Venta::where('fk_cliente', $usuario->fk_cliente)->get();
        return view('miscompras',compact('venta',  'cliente'));

    }




}
