<?php

namespace App\Http\Controllers;

use PHPJasper\PHPJasper as PHPJasper;
use Illuminate\Http\Request;

class reporteController extends Controller
{
    public function carnet($rif_cliente) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/carnet.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/'.$rif_cliente;    
    
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["rif" => $rif_cliente],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function carnetJuridico($rif_cliente) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/CarnetJuridico.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/CarnetJu'.$rif_cliente;    
    
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["rif" => $rif_cliente],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function factura($id) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/Factura.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Factura'.$id;    
    
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["numero_factura" => $id],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function asistencia() {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/reporteAsistencia.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/reporteAsistencia';    
    
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => [],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function ficha($rif_proveedor) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/FichaProveedor.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Ficha'.$rif_proveedor;    
    
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Rif_proveedor" => $rif_proveedor],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function top10Cerveza(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/Top10Cervezas.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Top10Cerveza'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function top5Evento(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/Top5Evento.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Top5Evento'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function top10Cliente(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/Top10Cliente.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Top10Cliente'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    
    public function inventario(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/Inventario.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/Inventario'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    

            
    }
    
    public function tipoCerveza(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/CervezaPorMes.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/CervezaPorMes'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function reciboAfiliacion($rif_proveedor) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/ReciboAfiliacion.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/ReciboAfiliacion'.$rif_proveedor; 
            
        
            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Rif_proveedor" => $rif_proveedor],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

    public function listaordenes(Request $request) {
        require base_path() . '/vendor/autoload.php';
    
            $input = base_path() . '/vendor/geekcom/phpjasper/examples/ListadoOrdenes.jasper';  
            $output = base_path() . '/vendor/geekcom/phpjasper/examples/ListadoOrdenes'; 
            
            
            $fechaInicio = $request->fechaInicio;
            $fechaFin = $request->fechaFin;

            $options = [ 
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => ["Fecha_Inicio" => $fechaInicio , "Fecha_Fin" => $fechaFin],
                'db_connection' => [
                    'driver' => 'postgres', //mysql, ....
                    'username' => 'postgres',
                    'password' => '07diciembre',
                    'host' => '127.0.0.1',
                    'database' => 'ProyectoBDACAVUCAB',
                    'port' => '5432'
                ]
            ];
            $jasper = new PHPJasper;
            $jasper->process(
                $input,
                $output,
                $options
            )->execute();
            return redirect()->route('index');
    
    }

}
