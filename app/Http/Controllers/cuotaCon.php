<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Cuota_afiliacion;
use App\Proveedor_y_cuota;
use App\Metodo_pago;
use App\Usuario;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class cuotaCon extends Controller
{
    
    public function generarCuotas() {
        $fecha = now();
        return view('generarCuotas', compact('fecha'));
    }

    public function modificarCuota($codigo_cuota) {
        $cuota = Cuota_afiliacion::findOrFail($codigo_cuota);
        return view('modificarCuota', compact('cuota'));
    }

    public function eliminarCuota ($codigo_cuota){
        $cuota = Cuota_afiliacion::findOrFail($codigo_cuota);
        $cuota->delete();
        
        return redirect()->route('cuotasEmpleado');
    }

    public function registrarCuotas(Request $request, $fecha){
        
        $first = date('Y-m-01'); 
        $last  = date('Y-m-t');
             
        $aux = DB::table('cuota_afiliacion')
        ->select(DB::raw('codigo_cuota'))
        ->where('fecha_cuota', '>', $first)
        ->where('fecha_cuota', '<', $last)->value('codigo_cuota');
        if (is_null($aux)){
            $cuota = new Cuota_afiliacion;
        $cuota->fecha_cuota =  $fecha;
        $cuota->monto_cuota =  $request->monto;
        $cuota->save();

        $cuotaAux = Cuota_afiliacion::OrderBy('codigo_cuota', 'desc')->first();
        $proveedores = Proveedor::all();
        foreach ($proveedores as $item){
            $nan = new Proveedor_y_cuota;
            $nan->rif_proveedor= $item->rif_proveedor;
            $nan->codigo_cuota= $cuotaAux->codigo_cuota;
            $nan->estatus= 'Pendiente';
            $nan->save();
        }
        return redirect()->route('index');
        } 
        else{
            return redirect()->route('cuotasEmpleado')->withErrors(['  La cuota de afiliacion para el mes actual ya ha sido creada, 
            puede modificar su monto si así lo desea', 'The Message']);
        }
        
    }

    public function editarCuota(Request $request, $codigo_cuota){

        $cuota = Cuota_afiliacion::findOrFail($codigo_cuota);
        $cuota->monto_cuota = $request->monto;

        $cuota->save();
        
        return redirect()->route('cuotasEmpleado');
    }

    public function cuotasEmpleado (){
        $cuota = Cuota_afiliacion::OrderBy('fecha_cuota', 'desc')->get();
        return view('cuotasEmpleado', compact('cuota'));
    }

    public function cuotasProveedor (){

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $proveedor = Proveedor::where('rif_proveedor',$usuario->fk_proveedor)->first();

        $cuota = Proveedor_y_cuota::where('rif_proveedor', $usuario->fk_proveedor)->get();
        return view('cuotasProveedor', compact('cuota', 'proveedor'));
    }
    
    public function consultarCuotaProveedor($codigo_cuota){
        $cuota= Cuota_afiliacion::findOrFail($codigo_cuota);

        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $proveedor = Proveedor::where('rif_proveedor',$usuario->fk_proveedor)->first();
        $rif = $usuario->fk_proveedor;
        $nan = Proveedor_y_cuota::where('rif_proveedor', $proveedor->rif_proveedor)->where('codigo_cuota', $codigo_cuota)->first();
        return view('consultarCuotaProveedor', compact('cuota', 'nan','rif'));
    }

    public function escogerMetodoCuota($codigo_cuota, $monto_cuota){
        $cuota= Cuota_afiliacion::findOrFail($codigo_cuota);
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $proveedor = Proveedor::where('rif_proveedor',$usuario->fk_proveedor)->first();
        return view('escogerMetodoCuota', compact('codigo_cuota', 'proveedor', 'monto_cuota'));
    }

    public function registrarMetodoCuota(Request $request, $codigo_cuota, $monto_cuota){
        $metodoNuevo = new metodo_pago;
        $metodoNuevo->tipo_metodo_pago =  'Tarjeta de Crédito';
        $metodoNuevo->tipo_tarjeta_credito =$request->tipoTarjeta;
        $metodoNuevo->numero_tarjeta_credito =  $request->numeroTarjeta;
        $metodoNuevo->nombre_titular= $request->nombreTarjeta;
        $metodoNuevo->cedula_titular= $request->tipoCI.$request->cedulaNatural;
        $metodoNuevo->cvv= $request->cvv;
        $metodoNuevo->fecha_vencimiento = $request->vencimiento;
        $metodoNuevo->save();

        return redirect()->route('cuotaProcesar', [$codigo_cuota, $monto_cuota, $codigo_cuota]);
    }



    public function cuotaProcesada(Request $request, $codigo_metodo_pago, $monto_cuota, $codigo_cuota){
        $cuota= Cuota_afiliacion::findOrFail($codigo_cuota);
        $user = Auth::user();
        $usuario = Usuario::where('nombre_usuario',$user->email)->first();
        $proveedor = Proveedor::where('rif_proveedor',$usuario->fk_proveedor)->first();

        $nan = Proveedor_y_cuota::where('rif_proveedor', $proveedor->rif_proveedor)->where('codigo_cuota', $codigo_cuota)->first();
        $nan->estatus='Solvente';
        $nan->fecha_pago= now();
        $nan->fk_metodo_pago=$codigo_metodo_pago;
        $nan->save(); 

        return redirect()->route('cuotasProveedor');
 

    }

    public function cuotaProcesar(Request $request, $codigo_metodo_pago, $monto_cuota, $codigo_cuota ){
        
        return view('cuotaProcesada',compact('codigo_metodo_pago', 'monto_cuota', 'codigo_cuota'));

    }
}