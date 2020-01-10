<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerveza; 
use App\proveedor; 
use App\Tipo_de_cerveza;
use App\Ingrediente;
use App\Receta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class cervezaControlador extends Controller
{
    public function vista(){
      
        $proveedor = proveedor::all()->pluck('denominacion_comercial');      
        $tipoCerveza = Tipo_de_cerveza::all()->pluck('nombre_tipo_cerveza');
        $fotoCerveza = Cerveza::all()->pluck('imagen_cerveza');
        $ingredienteCerveza = Ingrediente::all()->pluck('nombre_ingrediente');
        $receta = receta::all()->pluck('unidad_ingrediente');
        //$receta = DB::table('receta')->select('unidad_ingrediente')->distinct();
        return view('registrarProducto', compact('proveedor','tipoCerveza','fotoCerveza','ingredienteCerveza','receta'));
    }

    

    public function crear(Request $request) {
        $cervezaNuevo = new Cerveza;
        $cervezaNuevo->nombre_cerveza = $request->nombreCerveza;
        $cervezaNuevo->precio = $request->precio;
        $cervezaNuevo->imagen_cerveza = $request->fotoCerveza; 
        $variable = $request->get('proveedor');
        $cervezaNuevo->fk_proveedor= DB::table('proveedor')
                       ->select(DB::raw('rif_proveedor'))
                       ->where('denominacion_comercial', '=', $variable)->value('rif_proveedor');     
        $variable = $request->get('tipoCerveza');
        $cervezaNuevo->fk_tipo_de_cerveza= DB::table('tipo_de_cerveza')
                       ->select(DB::raw('codigo_tipo_cerveza'))
                       ->where('nombre_tipo_cerveza', '=', $variable)->value('codigo_tipo_cerveza');
        $cervezaNuevo->save();
        return redirect()->route('index');
     }

     public function listado(){
        // Faltaría hacer validación del proveedor que está logeado.
        $cerveza = Cerveza::paginate(8);
        //$tipoCerveza = Tipo_de_cerveza::all()->pluck('nombre_tipo_cerveza');
        return view('Listadodeproductos',compact('cerveza'));
     }


}