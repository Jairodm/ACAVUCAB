<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proveedor;
use App\lugar;
use App\Evento;
use App\Evento_y_proveedor;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{



    public function index() {
        $eventos = Evento::paginate(5);
        return view('eventos', compact('eventos'));
    }


    public function eliminar ($id){
        $eventoEliminar = Evento::findOrFail($id);
        $eventoEliminar->delete();
        
        return redirect()->route('index.evento');
    }

    public function consultar($id){


        $evento = Evento::findOrFail($id);

        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $eventoProveedor = $evento->proveedor;
        
        return view('consultarEvento',compact('evento','estado','municipio','parroquia','eventoProveedor'));

    }

    public function editar(Request $request, $id){

        $evento = Evento::findOrFail($id);
        $evento->nombre_evento = $request->nombreEvento;
        $evento->descripcion_evento = $request->descripcionEvento;

        $evento->fecha_inicio_evento = $request->fechaInicioEvento;

        $evento->fecha_fin_evento = $request->fechaFinEvento;

        $evento->hora_inicio_evento = $request->inicioEvento;

        $evento->hora_fin_evento = $request->finalEvento;

        $evento->precio_entrada = $request->precioEvento;

        $variable = $request->get('parroquia');
       
        $evento->fk_lugar= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $evento->direccion_evento = $request->detalleDireccionEvento;
        $evento->save();

        return redirect()->route('registrarEventoProveedor',$evento);
    }

    public function formulario(){

        $estado = lugar::where('fk_lugar',null)->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $municipio = lugar::where('tipo_lugar', 'Municipio')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');
        $parroquia = lugar::where('tipo_lugar', 'Parroquia')->orderby('nombre_lugar','ASC')->pluck('nombre_lugar');

        return view('registrarEvento',compact('estado','municipio','parroquia'));
    }

    public function crear(Request $request) {
        //return $request->all();

        $evento = new Evento;
        $evento->nombre_evento = $request->nombreEvento;
        $evento->descripcion_evento = $request->descripcionEvento;

        $evento->fecha_inicio_evento = $request->fechaInicioEvento;

        $evento->fecha_fin_evento = $request->fechaFinEvento;

        $evento->hora_inicio_evento = $request->inicioEvento;

        $evento->hora_fin_evento = $request->finalEvento;

        $evento->precio_entrada = $request->precioEvento;

        $variable = $request->get('parroquia');
       
        $evento->fk_lugar= DB::table('lugar')
                         ->select(DB::raw('codigo_lugar'))
                         ->where('nombre_lugar', '=', $variable)->value('codigo_lugar');;

        $evento->direccion_evento = $request->detalleDireccionEvento;


        $evento->save();
        return redirect()->route('registrarEventoProveedor',$evento);;

    }

    public function eliminarProveedorEvento ($id, $id2){
        //id2 es evento, id es el nombre del proveedor
        $proveedor = proveedor::findOrFail($id);
        $evento = Evento::findOrFail($id2);
        $evento->proveedor()->detach($id);

        return redirect()->route('registrarEventoProveedor',$evento);
    }

    public function agregarEventoProveedor(Request $request ,$id) {
        // return $request->all();
         
        $evento = Evento::findOrFail($id);
        $eventoProveedor = new Evento_y_proveedor();
        $eventoProveedor->fk_evento = $id; 


        $variable = $request->proveedor;
        $eventoProveedor->fk_proveedor = DB::table('proveedor')
                                        ->select(DB::raw('rif_proveedor'))
                                        ->where('razon_social', '=', $variable)->value('rif_proveedor');; 

        $eventoProveedor->save();
 
        return redirect()->route('registrarEventoProveedor',$evento);
 
     }


    public function eventoProveedor($id) {

                              
        $evento = Evento::findOrFail($id);
        $proveedor = DB::select( DB::raw("SELECT p.razon_social FROM proveedor p
                                         WHERE  p.rif_proveedor NOT IN (SELECT pa.rif_proveedor FROM proveedor pa, evento_y_proveedor ea
                                        WHERE ea.fk_evento = '$id'
                                 and    ea.fk_proveedor = pa.rif_proveedor)"));

        $eventoProveedor = $evento->proveedor;

        return view('registrarEventoProveedor',compact('proveedor','eventoProveedor','evento'));


     }
}
