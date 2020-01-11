<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IngredienteControlador extends Controller
{
    public function vista(){
        $ingredientes=Ingrediente::all();
        return view('ingredientes',compact('ingredientes'));

    }



    public function crear(Request $request){
        $request->validate([
            'nombre_ingrediente' => 'required',
            'descripcion_ingrediente' => 'required'
        ]);
        $ingredienteNuevo= new Ingrediente;
        $ingredienteNuevo->nombre_ingrediente = $request->nombre_ingrediente;
        $ingredienteNuevo->descripcion_ingrediente = $request->descripcion_ingrediente;
        $ingredienteNuevo->save();
        return redirect()->route('Listadodeproductos');
    }

    public function vistaModificar($codigo_ingrediente){
        $modIngrediente = Ingrediente::findOrFail($codigo_ingrediente);
        return view('modificarIngrediente', compact('modIngrediente'));
    }

    public function modifica(Request $request,$codigo_ingrediente){
        $request->validate([
            'nombre_ingrediente' => 'required',
            'descripcion_ingrediente' => 'required'
        ]);

        $actIngrediente = Ingrediente::findOrFail($codigo_ingrediente);
        $actIngrediente->nombre_ingrediente = $request->nombre_ingrediente;
        $actIngrediente->descripcion_ingrediente = $request->descripcion_ingrediente;
        $actIngrediente->save();
        return redirect()->route('ingredientes');
    }

    public function eliminar($codigo_ingrediente){
        $eliIngrediente = Ingrediente::findOrFail($codigo_ingrediente);
        $eliIngrediente->delete();
        return redirect()->route('ingredientes');
    }
}
