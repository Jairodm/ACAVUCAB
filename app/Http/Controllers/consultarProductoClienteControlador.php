<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerveza;
use App\Cargo;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class consultarProductoClienteControlador extends Controller
{
    
    public function consultar($codigo_cerveza){
        $cerveza = Cerveza::findOrFail($codigo_cerveza);
        return view('ConsultarProductoCliente',compact('cerveza'));

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
}
