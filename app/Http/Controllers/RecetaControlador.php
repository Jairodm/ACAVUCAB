<?php

namespace App\Http\Controllers;
use App\Ingrediente;
use App\Receta;
use App\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RecetaControlador extends Controller
{
    public function vista($codigo_cerveza){
        $cerveza = Cerveza::findOrFail($codigo_cerveza);
        $ingrediente = DB::select(DB::raw("SELECT DISTINCT r.codigo_receta, i.nombre_ingrediente, r.descripcion_receta,r.unidad_ingrediente,r.cantidad_ingrediente
                from ingrediente i, receta r, cerveza c 
                WHERE r.codigo_ingrediente = i.codigo_ingrediente 
                and r.codigo_cerveza = '$codigo_cerveza'
                order by r.codigo_receta"));
        $receta = DB::select(DB::raw("SELECT DISTINCT unidad_ingrediente
                    from cerveza c, receta r
                    where r.codigo_cerveza = c.codigo_cerveza"));
        $descripcion = DB::select(DB::raw("SELECT descripcion_receta,cantidad_ingrediente,unidad_ingrediente
                    from cerveza c, receta r
                    where r.codigo_cerveza = c.codigo_cerveza"));
        $listadoIngredientes = DB::select(DB::raw("SELECT DISTINCT nombre_ingrediente from ingrediente"));
        return view ('registrarReceta',compact('cerveza','receta','ingrediente','descripcion','listadoIngredientes'));
    }


    public function añadirReceta(Request $request, $codigo_cerveza){
        $request->validate([
            'nombre_ingrediente' => 'required',
            'cantidad_ingrediente' => 'required',
            'unidad_ingrediente' => 'required'
        ]);
        $nombreIngrediente = $request->nombre_ingrediente;
        $nuevaReceta = new Receta;
        $nuevaReceta->codigo_cerveza = $codigo_cerveza;
        $nuevaReceta->cantidad_ingrediente = $request->cantidad_ingrediente;
        $nuevaReceta->unidad_ingrediente = $request->unidad_ingrediente;
        $nuevaReceta->descripcion_receta = $request->descripcion_receta;
        $nuevaReceta->codigo_ingrediente = DB::table('ingrediente')
                                           ->select(DB::raw('codigo_ingrediente'))
                                           ->where('nombre_ingrediente','=',$nombreIngrediente)
                                           ->value('codigo_ingrediente');
                                           
        $nuevaReceta->save();                                   
        return redirect()->route('registrarReceta',$codigo_cerveza);
    }
    public function vistaModifica($codigo_receta){
        $receta = Receta::findOrFail($codigo_receta);
        $ingrediente = Ingrediente::all();
        return view('modificarReceta',compact('receta','ingrediente'));               
    }

    public function modificar(Request $request,$codigo_receta){
        $request->validate([
            'nombre_ingrediente' => 'required',
            'cantidad_ingrediente' => 'required',
            'unidad_ingrediente' => 'required'
        ]);
        $nombreIngrediente = $request->nombre_ingrediente;
        $actReceta = Receta::findOrFail($codigo_receta);
        $actReceta->descripcion_receta = $request->descripcion_receta;
        $actReceta->codigo_ingrediente = DB::table('ingrediente')
                                           ->select(DB::raw('codigo_ingrediente'))
                                           ->where('nombre_ingrediente','=',$nombreIngrediente)
                                           ->value('codigo_ingrediente');
        $actReceta->cantidad_ingrediente = $request->cantidad_ingrediente;
        $actReceta->unidad_ingrediente = $request->unidad_ingrediente;
        $actReceta->save();
        
        return redirect()->route('Listadodeproductos');                               
    }

    public function elimina($codigo_receta){
        $eliReceta = Receta::findOrFail($codigo_receta);
        //$FK_Cerveza = $eliReceta->codigo_cerveza;
        //$FK_Ingrediente = $eliReceta->codigo_ingrediente;
        $eliReceta->delete();
        return redirect()->route('Listadodeproductos');   
    }
}


