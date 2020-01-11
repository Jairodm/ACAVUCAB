<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Cargo;
use App\Beneficio;
use App\Vacacion;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class beneficiosYVacacionesCon extends Controller
{
    public function consultar($cedula_empleado){
        $empleado = Empleado::findOrFail($cedula_empleado);
                    
        $beneficio = Beneficio::where('fk_empleado', $cedula_empleado)->get();
        
        $vacacion = Vacacion::where('fk_empleado', $cedula_empleado)->get();
        
        return view('beneficiosYVacaciones',compact('empleado', 'beneficio', 'vacacion'));

    }

    public function regVacacion($cedula_empleado) {
        $empleado = Empleado::findOrFail($cedula_empleado);
        return view('RegistrarVacacion', compact('empleado'));
    }

    public function regBeneficio($cedula_empleado) {
        $empleado = Empleado::findOrFail($cedula_empleado);
        return view('registrarBeneficio', compact('empleado'));
    }

    public function eliminarBeneficio ($codigo_beneficio){
        $beneficioEliminar = Beneficio::findOrFail($codigo_beneficio);
        $beneficioEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function eliminarVacacion ($codigo_vacacion){
        $vacacionEliminar = Vacacion::findOrFail($codigo_vacacion);
        $vacacionEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function consultarBeneficio($codigo_beneficio){
        $beneficio = Beneficio::findOrFail($codigo_beneficio);
        return view('consultarBeneficio',compact('beneficio'));

    }

    public function consultarVacacion($codigo_vacacion){
        $vacacion = Vacacion::findOrFail($codigo_vacacion);
        return view('ConsultarVacacion',compact('vacacion'));

    }

    public function editarBeneficio(Request $request, $codigo_beneficio){

        $beneficioEditar = Beneficio::findOrFail($codigo_beneficio);
        $beneficioEditar->tipo_beneficio = $request->tipoBeneficio;
        $beneficioEditar->descripcion_beneficio = $request->descripcionBeneficio;

        $beneficioEditar->save();
        
        return redirect()->route('nómina');
    }

    public function editarVacacion(Request $request, $codigo_vacacion){

        $vacacionEditar = Vacacion::findOrFail($codigo_vacacion);
        $vacacionEditar->fecha_inicio_vacacion = $request->fechaInicio;
        $vacacionEditar->fecha_fin_vacacion = $request->fechaFin;

        $vacacionEditar->save();
        
        return redirect()->route('nómina');
    }

    public function RegistrarVacacion(Request $request, $cedula_empleado){
        
        $vacacionNuevo = new Vacacion;
        $vacacionNuevo->fecha_inicio_vacacion =  $request->fechaInicio;
        $vacacionNuevo->fecha_fin_vacacion =  $request->fechaFin;
        $vacacionNuevo->fk_empleado =  $cedula_empleado;

        $vacacionNuevo->save();

        return redirect()->route('beneficiosYVacaciones', $cedula_empleado);
    }

    public function RegistrarBeneficio(Request $request, $cedula_empleado){
        
        $beneficioNuevo = new Beneficio;
        $beneficioNuevo->tipo_beneficio =  $request->tipoBeneficio;
        $beneficioNuevo->descripcion_beneficio =  $request->descripcionBeneficio;
        $beneficioNuevo->fk_empleado =  $cedula_empleado;

        $beneficioNuevo->save();

        return redirect()->route('beneficiosYVacaciones', $cedula_empleado);
    }
    

    
}