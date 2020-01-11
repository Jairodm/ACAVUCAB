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


    public function añadirIngrediente(Request $request){
        
    }
}
