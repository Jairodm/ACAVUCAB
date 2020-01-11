<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Cargo;
use App\Asistencia;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class registrarEmpleadoCon extends Controller
{
    public function vista(){
        $cargo = Cargo::all()->pluck('nombre_cargo');  
        return view('registrarEmpleado', compact('cargo'));
    }

    public function nomina() {
        $empleados = Empleado::orderBy('primer_apellido_empleado')->orderBy('primer_nombre_empleado')->paginate(5);
        return view('nómina', compact('empleados'));
    }

    public function crear(Request $request) {
       // return $request->all();
        

        $empleadoNuevo = new Empleado;
        $empleadoNuevo->cedula_empleado = $request->tipo_documento . $request->cedula_empleado;

        $empleadoNuevo->primer_nombre_empleado = $request->primer_nombre_empleado;

        $empleadoNuevo->segundo_nombre_empleado = $request->segundo_nombre_empleado;

        $empleadoNuevo->primer_apellido_empleado = $request->primer_apellido_empleado;

        $empleadoNuevo->segundo_apellido_empleado = $request->segundo_apellido_empleado;

        $empleadoNuevo->fecha_nacimiento = $request->fecha_nacimiento;

        $empleadoNuevo->salario = $request->salario;

        $variable = $request->cargoEmpleado;

        $empleadoNuevo->fk_cargo = DB::table('cargo')
                         ->select(DB::raw('codigo_cargo'))
                         ->where('nombre_cargo', '=', $variable)->value('codigo_cargo');;


        $empleadoNuevo->save();

        return redirect()->route('nómina');

    }

    public function consultar($cedula_empleado){
        $empleado = Empleado::findOrFail($cedula_empleado);
        $cargo = cargo::all()->pluck('nombre_cargo');  
        return view('ConsultarEmpleado',compact('empleado', 'cargo'));

    }

    public function editar(Request $request, $cedula_empleado){

        $empleadoEditar = Empleado::findOrFail($cedula_empleado);
        $empleadoEditar->salario = $request->salario;

        $variable = $request->cargoEmpleado;

        $empleadoEditar->fk_cargo = DB::table('cargo')
                                    ->select(DB::raw('codigo_cargo'))
                                    ->where('nombre_cargo', '=', $variable)->value('codigo_cargo');

        $empleadoEditar->save();

        
        return redirect()->route('nómina');
    }

    public function eliminar ($cedula_empleado){
        $empleadoEliminar = Empleado::findOrFail($cedula_empleado);
        $empleadoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function leerAsistencias() {
        $content = fopen(storage_path("app/public/asistencias.txt"), "r");
        while (($line = fgets($content)) !== false) {
            $arreglo = explode(" ", $line);
            $cedaux = $arreglo[0];
            $fechaux = $arreglo[1];
            $entaux = $arreglo[2];
            $salaux = $arreglo[3];
            $asistNueva = new Asistencia;
            $asistNueva->fecha_asistencia = $fechaux;
            $asistNueva->hora_entrada_asistencia = $entaux;
            $asistNueva->hora_salida_asistencia = $salaux;
            $asistNueva->fk_empleado = $cedaux;

            $asistNueva->save();
        }

        return redirect()->route('nómina');
    }
}

