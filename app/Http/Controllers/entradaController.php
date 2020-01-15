<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\lugar;
use App\Evento;
use App\Venta_entrada;

use Illuminate\Support\Facades\DB;

class entradaController extends Controller
{
    public function consultar($id){


        $evento = Evento::findOrFail($id);

        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $eventoProveedor = $evento->proveedor;
        
        return view('consultarEntradas',compact('evento','estado','municipio','parroquia'));

    }

    public function comprarView($id){


        $evento = Evento::findOrFail($id);

        $eventoProveedor = $evento->proveedor;
        
        return view('ventaEntrada',compact('evento'));

    }
    public function asociarEntrada(Request $request, $id){
        //return $request->all();
        
        $evento = Evento::findOrFail($id);
        $user = auth()->user();


        if($request->cantidadEnt <= $evento->cantidad_entradas){ 
        $evento->cantidad_entradas = $evento->cantidad_entradas - $request->cantidadEnt;
        $venta_entrada = new Venta_entrada;
        $venta_entrada->fk_evento = $evento->codigo_evento;
        $venta_entrada->fk_cliente = DB::table('usuario')
                                    ->select(DB::raw('fk_cliente'))
                                    ->where('nombre_usuario', '=', $user->email)->value('fk_cliente');
        $venta_entrada->total = $request->precio * $request->cantidadEnt;       
        $evento->save();
        $venta_entrada->save();
        
        return redirect()->route('index.evento');
        }

        else {
            return redirect()->back()->with('alert', 'Solicitud supera cantidad de entradas disponibles');
        }   

    }
}
