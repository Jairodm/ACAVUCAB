<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Orden_compra;
use App\Detalle_compra;
use App\Estatus;
use App\Metodo_pago;
use App\Estatus_y_orden;
use App\Usuario;
use App\Inventario;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ordenCon extends Controller
{
    
    public function ordenesPendientes() {

        $aprobadas= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 4)->pluck('orden');
        $pendientes= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 1)->pluck('orden');

        $eyo= Estatus_y_orden::whereIn('orden', $pendientes)->whereNotIn('orden', $aprobadas)->get();    

        return view('ordenesPendientes', compact('eyo'));
    }

    public function aprobarOrden($codigo_estatus) {
        $eyo = Estatus_y_orden::findOrFail($codigo_estatus);
        $detalle = Detalle_compra::where ('orden_compra', $eyo->orden)->first();
        return view('aprobarOrden', compact('eyo', 'detalle'));
    }


    public function eliminarOrden ($codigo_orden_compra){
        $beneficioEliminar = Orden_compra::findOrFail($codigo_orden_compra);
        $beneficioEliminar->delete();
        
        return redirect()->route('ordenesPendientes');
    }

    public function aprobacionOrden($codigo_estatus){

        $eyo = Estatus_y_orden::findOrFail($codigo_estatus);
        $orden = Orden_compra::where ('codigo_orden_compra', $eyo->orden)->first();

        $eyo2 = new Estatus_y_orden;
        $eyo2->orden= $orden->codigo_orden_compra;
        $eyo2->fecha_estatus= now();
        $eyo2->estatus = 4;
        $eyo2->save();

        return redirect()->route('ordenesPendientes');

        
    }

    public function ordenesAprobadas() {

        $aprobadas= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 4)->pluck('orden');
        $entregadas= DB::table('estatus_y_orden')->select('orden')->where ('estatus', 3)->pluck('orden');

        $eyo= Estatus_y_orden::whereIn('orden', $aprobadas)->whereNotIn('orden', $entregadas)->distinct('orden')->get();    

        return view('ordenesAprobadas', compact('eyo'));
    }

    public function recibirOrden($codigo_estatus) {
        $eyo = Estatus_y_orden::findOrFail($codigo_estatus);
        $detalle = Detalle_compra::where ('orden_compra', $eyo->orden)->first();
        return view('recibirOrden', compact('eyo', 'detalle'));
    }

    public function recepcionOrden($codigo_estatus){

        $eyo = Estatus_y_orden::findOrFail($codigo_estatus);
        $orden = Orden_compra::where ('codigo_orden_compra', $eyo->orden)->first();
        $detalle = Detalle_compra::where ('orden_compra', $eyo->orden)->first();

        $eyo2 = new Estatus_y_orden;
        $eyo2->orden= $orden->codigo_orden_compra;
        $eyo2->fecha_estatus= now();
        $eyo2->estatus = 3;
        $eyo2->save();

        $inventario = new inventario;
            $inventarioAux=Inventario::where('fk_cerveza', $detalle->cerveza)->OrderBy('codigo_inventario', 'desc')->first();
            $inventario->cantidad_operacion= $detalle->cantidad_compra;
            $inventario->cantidad_disponible= $inventarioAux->cantidad_disponible + $detalle->cantidad_compra;
            $inventario->fecha_operacion= now();
            $inventario->fk_cerveza= $detalle->cerveza;
            $inventario->fk_orden= $detalle->codigo_detalle_compra;
            $inventario->save();

        return redirect()->route('ordenesPendientes');

        
    }

}