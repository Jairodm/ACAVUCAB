<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Cargo;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class registrarEmpleadoCon extends Controller
{
    public function vista(){
        return view('registrarEmpleado');
    }

    public function nomina() {
        $empleados = Empleado::all();
        return view('nómina', compact('empleados'));
    }

    public function crear(Request $request) {
       // return $request->all();
        

        $empleadoNuevo = new Empleado;
        $empleadoNuevo->cedula_empleado = $request->cedula_empleado;

        $empleadoNuevo->primer_nombre_empleado = $request->primer_nombre_empleado;

        $empleadoNuevo->segundo_nombre_empleado = $request->segundo_nombre_empleado;

        $empleadoNuevo->primer_apellido_empleado = $request->primer_apellido_empleado;

        $empleadoNuevo->segundo_apellido_empleado = $request->segundo_apellido_empleado;

        $empleadoNuevo->fecha_nacimiento = $request->fecha_nacimiento;

        $empleadoNuevo->salario = $request->salario;

        $variable = $request->fk_cargo;

        $empleadoNuevo->fk_cargo = DB::table('cargo')
                         ->select(DB::raw('codigo_cargo'))
                         ->where('nombre_cargo', '=', $variable)->value('codigo_cargo');;


        $empleadoNuevo->save();

        return redirect()->route('nómina');

    }

    public function consultar($cedula_empleado){
        $empleado = Empleado::findOrFail($cedula_empleado);
        return view('ConsultarEmpleado',compact('empleado'));

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

