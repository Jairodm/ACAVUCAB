<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Asistencia;
use App\Horario_y_Empleado;
use App\Empleado;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class horarioAsistenciaCon extends Controller
{
    public function registrarHorario(Request $request){
        
        $horarioNuevo = new Horario;
        $horarioNuevo->dia =  $request->diaSemana;
        $horarioNuevo->hora_entrada =  $request->horaLlegada;
        $horarioNuevo->hora_salida =  $request->horaSalida;

        $horarioNuevo->save();

        return redirect()->route('nómina');
    }
    
    public function horariosEmpleado($cedula_empleado){
        $horario_y_Empleado = Horario_y_Empleado::where('cedula_empleado', $cedula_empleado)->get();
        $empleado = Empleado::findOrFail($cedula_empleado);

        
        return view('horariosEmpleado',compact('horario_y_Empleado', 'empleado'));

    }

    public function eliminarHorarioEmpleado ($codigo_horario_y_empleado){
        $horario_y_empleadoEliminar = Horario_y_Empleado::findOrFail($codigo_horario_y_empleado);
        $horario_y_empleadoEliminar->delete();
        
        return redirect()->route('nómina');
    }

    public function regHorarioEmpleado($cedula_empleado) {
        $empleado = Empleado::findOrFail($cedula_empleado);
        $horario = Horario::all();
        return view('registrarHorarioEmpleado', compact('empleado', 'horario'));
    }

    public function registrarHorarioEmpleado(Request $request, $cedula_empleado){
        
        $horario_y_empleadoNuevo = new Horario_y_Empleado;
        $arreglo = explode(" ", $request->opcionSelect);
        $diaux = $arreglo[0];
        $entaux = $arreglo[1];
        $salaux = $arreglo[2];

        
        $horarioAux = Horario::where('dia', $diaux)->where('hora_entrada', $entaux)->where('hora_salida', $salaux)->get();

        $horario_y_empleadoNuevo->codigo_horario =  $horarioAux->first()->codigo_horario;
        $horario_y_empleadoNuevo->cedula_empleado =  $cedula_empleado;

        $horario_y_empleadoNuevo->save();

        return redirect()->route('nómina');
    }

    public function consultarAsistenciasEmpleado($cedula_empleado) {
        $asistencia = Asistencia::where('fk_empleado', $cedula_empleado)->get();
        return view('asistenciasEmpleado', compact('asistencia'));
    }

    
}