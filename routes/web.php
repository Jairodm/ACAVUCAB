<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use PHPJasper\PHPJasper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('beneficiosYVacaciones', function () {
    return view('beneficiosYVacaciones');
});

Route::get('carrito', function () {
    return view('carrito');
});

Route::get('/consultarBeneficio', function () {
    return view('ConsultarBeneficio');
});

Route::get('consultarClienteJuridico', function () {
    return view('consultarClienteJuridico');
});

Route::get('ConsultarEmpleado', function () {
    return view('ConsultarEmpleado');
});

Route::get('consultarEventoEmpleado', function () {
    return view('ConsultarEventoEmpleado');
});

Route::get('consutarMetodosDePago', function () {
    return view('ConsultarMetodosDePago');
});

Route::get('ConsultarProductoCliente', function () {
    return view('ConsultarProductoCliente');
});

Route::get('consultarProveedor', function () {
    return view('consultarProveedor');
});

Route::get('ConsultarVacacion', function () {
    return view('ConsultarVacacion');
});

Route::get('controlEntrada', function () {
    return view('controlEntrada');
});

Route::get('detalleCompra', function () {
    return view('detalleCompra');
});

Route::get('diarioCerveza', function () {
    return view('diarioCerveza');
});

Route::get('EscogerMetodoDePagoCompraDigital', function () {
    return view('escogerMetodoDePagoCompraDigital');
});

Route::get('EscogerMetodoDePagoEntrada', function () {
    return view('EscogerMetodoDePagoEntrada');
});

Route::get('eventos', function () {
    return view('eventos');
});

Route::get('facturacion', function () {
    return view('facturacion');
});

Route::get('facturacionEntrada', function () {
    return view('facturacionEntrada');
});

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('inicioSesion', function () {
    return view('inicioSesion');
});

Route::get('inventario', function () {
    return view('inventario');
});

Route::get('menuAdministrador', function () {
    return view('menuAdministrador');
})->name('menuAdministrador');

Route::get('menuClienteNatural', function () {
    return view('menuClienteNatural');
});

Route::get('menuProveedor', function () {
    return view('menuProveedor');
});

Route::get('menuRegistro', function () {
    return view('menuRegistro');
    
})->name('menuRegistro');
/* Route::get('miscompras', function () {
    return view('miscompras');
}); */


Route::get('olvidoContrasena', function () {
    return view('olvidoContrasena');
});

Route::get('ordendeDespacho', function () {
    return view('ordendedespacho');
});

Route::get('pagarcuota', function () {
    return view('pagarcuota');
});

Route::get('pago', function () {
    return view('pago');
});

Route::get('presupuesto', function () {
    return view('presupuesto');
});

Route::get('productos', function () {
    return view('productos');
})->name('productos');

Route::get('productosProveedor', function () {
    return view('productosProveedor');
});

Route::get('RegistrarBeneficio', function () {
    return view('RegistrarBeneficio');
});

Route::get('registrarClienteJuridico', function () {
    return view('registrarClienteJuridico');
})->name('registrarClienteJuridico');

Route::get('registrarEmpleado', function () {
    return view('registrarEmpleado');
});

Route::get('registrarMetodoPago', function () {
    return view('registrarMetodoPago');
});

Route::get('registrarProducto', function () {
    return view('registrarProducto');
});

Route::get('registrarProveedor', function () {
    return view('registrarProveedor');
})->name('registrarProveedor');

Route::get('RegistroUsuario', function () {
    return view('RegistroUsuario');
});

Route::get('tarjetas', function () {
    return view('tarjetas');
});

Route::get('ventaEntrada', function () {
    return view('ventaEntrada');
});

Route::get('/consultarTelefono', function () {
    return view('consultarTelefono');
});

Route::get('/consultarCorreo', function () {
    return view('consultarCorreo');
});

Route::get('registrarContactoProveedor', function () {
    return view('registrarContactoProveedor');
});

Route::get('contactoProveedor', function () {
    return view('contactoProveedor');
});

Route::middleware(['auth'])->group(function(){
    /* DIVISAS */
    Route::get('divisas', 'consultarDivisa@consultar')->name('divisas');
    Route::get('divisas','consultarDivisa@consultar')->name('divisas');
    Route::get('modificarDivisa/{codigo_divisa}','consultarDivisa@modificarValor')->name('modificarDivisa');
    Route::post('registroDivisa', 'consultarDivisa@crear')->name('registrar.Divisa');
    Route::get('registrarDivisa','consultarDivisa@index')->name('registrarDivisa');
    Route::put('modificarDivisa/{codigo_divisa}','consultarDivisa@actualizaValor')->name('actualizaDivisa');
    Route::delete('modificarDivisa/{codigo_divisa}','consultarDivisa@eliminaDivisa')->name('eliminaDivisa');

    // Beneficios y vacaciones

    Route::get('beneficiosYVacaciones/{cedula_empleado?}','beneficiosYVacacionesCon@consultar')->name('beneficiosYVacaciones');

    Route::delete('consultarBeneficio/{codigo_beneficio?}', 'beneficiosYVacacionesCon@eliminarBeneficio')->name('eliminar.beneficio');

    Route::get('consultarBeneficio/{codigo_beneficio?}','beneficiosYVacacionesCon@consultarBeneficio')->name('consultarBeneficio');

    Route::put('consultarBeneficio/{codigo_beneficio?}','beneficiosYVacacionesCon@editarBeneficio')->name('editar.beneficio');

    Route::get('registrarBeneficio/{cedula_empleado?}','beneficiosYVacacionesCon@regBeneficio')->name('registrarBeneficio');

    Route::get('RegistrarVacacion/{cedula_empleado?}','beneficiosYVacacionesCon@regVacacion')->name('RegistrarVacacion');

    Route::delete('ConsultarVacacion/{codigo_vacacion?}', 'beneficiosYVacacionesCon@eliminarVacacion')->name('eliminar.vacacion');

    Route::get('ConsultarVacacion/{codigo_vacacion?}','beneficiosYVacacionesCon@consultarVacacion')->name('ConsultarVacacion');

    Route::put('ConsultarVacacion/{codigo_vacacion?}','beneficiosYVacacionesCon@editarVacacion')->name('editar.vacacion');

    Route::post('RegistrarVacacion/{cedula_empleado?}', 'beneficiosYVacacionesCon@RegistrarVacacion')->name('registrar.vacacion');

    Route::post('RegistrarBeneficio/{cedula_empleado?}','beneficiosYVacacionesCon@RegistrarBeneficio')->name('registrar.beneficio');

    // Horario y asistencias

    Route::get('registrarHorario', function () {
        return view('registrarHorario');
    });

    Route::post('registrarHorario','horarioAsistenciaCon@registrarHorario')->name('registrar.horario');

    Route::get('registrarHorarioEmpleado', function () {
        return view('registrarHorarioEmpleado');
    });

    Route::get('registrarHorarioEmpleado/{cedula_empleado?}','horarioAsistenciaCon@regHorarioEmpleado')->name('registrarHorarioEmpleado');

    Route::post('registrarHorarioEmpleado/{cedula_empleado?}/{codigo_horario?}','horarioAsistenciaCon@registrarHorarioEmpleado')->name('registrar.horarioEmpleado');

    Route::get('horariosEmpleado', function () {
        return view('horariosEmpleado');
    });

    Route::get('horariosEmpleado/{cedula_empleado?}','horarioAsistenciaCon@horariosEmpleado')->name('horariosEmpleado');

    Route::delete('horariosEmpleado/{codigo_horario_y_empleado?}','horarioAsistenciaCon@eliminarHorarioEmpleado')->name('eliminar.horarioEmpleado');

    Route::get('asistenciasEmpleado/{cedula_empleado?}', 'horarioAsistenciaCon@consultarAsistenciasEmpleado')->name('asistenciasEmpleado');

    Route::get('registrarEmpleado','registrarEmpleadoCon@vista')->name('registrarEmpleado');
    Route::post('nómina', 'registrarEmpleadoCon@leerAsistencias')->name('leerAsistencias');

    //Correos y teléfonos

    Route::delete('consultarTelefono/{codigo_telefono?}', 'CorreoTelefonoCon@eliminarTelefono')->name('eliminar.telefono');

    Route::get('consultarTelefono/{codigo_telefono?}','CorreoTelefonoCon@consultarTelefono')->name('consultarTelefono');

    Route::put('consultarTelefono/{codigo_telefono?}','CorreoTelefonoCon@editarTelefono')->name('editar.telefono');

    Route::delete('consultarCorreo/{codigo_correo?}', 'CorreoTelefonoCon@eliminarCorreo')->name('eliminar.correo');

    Route::get('consultarCorreo/{codigo_correo?}','CorreoTelefonoCon@consultarCorreo')->name('consultarCorreo');

    Route::put('consultarCorreo/{codigo_correo?}','CorreoTelefonoCon@editarCorreo')->name('editar.correo');

    //Método de pago

    Route::get('ConsultarMetodosDePago/{rif_cliente?}','MetodoPagoCon@consultarMetodosDePago')->name('ConsultarMetodosDePago');

    Route::get('consultarMetodoCliente/{codigo_metodo_pago?}','MetodoPagoCon@consultarMetodoCliente')->name('consultarMetodoCliente');

    Route::get('registrarMetodoPago/{rif_cliente?}','MetodoPagoCon@regMetodoCliente')->name('registrarMetodoCliente');

    Route::post('registrarMetodoPago/{rif_cliente?}','MetodoPagoCon@RegistrarMetodoCliente')->name('registrar.metodoCliente');

    Route::delete('consultarMetodoCliente/{codigo_metodo_pago?}', 'MetodoPagoCon@eliminarMetodoCliente')->name('eliminar.metodoCliente');

    Route::put('consultarMetodoCliente/{codigo_metodo_pago?}','MetodoPagoCon@editarMetodoCliente')->name('editar.metodoCliente');

    //Persona de contacto

    Route::get('contactoProveedor/{rif_proveedor?}','ContactoCon@consultarProveedor')->name('ContactoProveedor');

    Route::get('consultarContactoProveedor/{codigo_persona_contacto?}','ContactoCon@consultarContactoProveedor')->name('consultarContactoProveedor');

    Route::get('registrarContactoProveedor/{rif_proveedor?}','ContactoCon@regContactoProveedor')->name('registrarContactoProveedor');

    Route::post('registrarContactoProveedor/{rif_proveedor?}','ContactoCon@RegistrarContactoProveedor')->name('registrar.contactoProveedor');

    Route::delete('consultarContactoProveedor/{codigo_persona_contacto?}', 'ContactoCon@eliminarContactoProveedor')->name('eliminar.contactoProveedor');

    Route::put('consultarContactoProveedor/{codigo_persona_contacto?}','ContactoCon@editarContactoProveedor')->name('editar.contactoProveedor');


    Route::get('contactoJuridico/{rif_cliente?}','ContactoCon@consultarJuridico')->name('ContactoJuridico');

    Route::get('registrarContactoJuridico/{rif_cliente?}','ContactoCon@regContactoJuridico')->name('registrarContactoJuridico');

    Route::post('registrarContactoJuridico/{rif_cliente?}','ContactoCon@RegistrarContactoJuridico')->name('registrar.contactoJuridico');



    //Empleados
    Route::post('/', 'registrarEmpleadoCon@crear')->name('registrar.crear')->middleware('can:registrar.empleado');
    Route::get('nómina', 'registrarEmpleadoCon@nomina')->name('nómina');

    Route::get('ConsultarEmpleado/{cedula_empleado?}','registrarEmpleadoCon@consultar')->name('ConsultarEmpleado')->middleware('can:consultar.empleado');

    Route::put('ConsultarEmpleado/{cedula_empleado?}','registrarEmpleadoCon@editar')->name('editar.empleado')->middleware('can:editar.empleado');

    Route::delete('ConsultarEmpleado/{cedula_empleado?}', 'registrarEmpleadoCon@eliminar')->name('eliminar.empleado')->middleware('can:eliminar.empleado');

    //Usuariooos

    Route::get('usuarios', 'UserController@index')->name('index.usuario')->middleware('can:index.usuario');

    Route::get('consultarUsuario/{id?}','UserController@consultar')->name('consultar.usuario')->middleware('can:consultar.usuario');

    Route::put('consultarUsuario/{id?}','UserController@editar')->name('editar.usuario')->middleware('can:editar.usuario');

    Route::delete('consultarUsuario/{id?}', 'UserController@eliminar')->name('eliminar.usuario')->middleware('can:eliminar.usuario');


    
    //Roles

    Route::get('registrarRol', 'RoleController@formulario')->name('registrar.get.rol')->middleware('can:registrar.rol');
    Route::post('registrarRol', 'RoleController@crear')->name('registrar.rol')->middleware('can:registrar.rol');

    Route::get('roles', 'RoleController@index')->name('index.rol')->middleware('can:index.rol');

    Route::get('consultarRol/{id?}','RoleController@consultar')->name('consultar.rol')->middleware('can:consultar.rol');

    Route::put('consultarRol/{id?}','RoleController@editar')->name('editar.rol')->middleware('can:editar.rol');

    Route::delete('consultarRol/{id?}', 'RoleController@eliminar')->name('eliminar.rol')->middleware('can:eliminar.rol');

    //Evento  - Administrador

    Route::get('registrarEvento', 'EventoController@formulario')->name('registrar.get.evento')->middleware('can:registrar.evento');
    Route::post('registrarEvento', 'EventoController@crear')->name('registrar.evento')->middleware('can:registrar.evento');

    Route::get('registrarEventoProveedor/{id?}', 'EventoController@eventoProveedor')->name('registrarEventoProveedor')->middleware('can:registrar.evento');

    Route::post('registrarEventoProveedor/{id?}', 'EventoController@agregarEventoProveedor')->name('agregar.evento.proveedor')->middleware('can:registrar.evento');
    
    Route::delete('registrarEventoProveedor/{id?}/{id2?}', 'EventoController@eliminarProveedorEvento')->name('eliminar.proveedor.evento')->middleware('can:eliminar.proveedor.evento');

    Route::get('eventos', 'EventoController@index')->name('index.evento');
    
    Route::delete('eventos/{id?}', 'EventoController@eliminar')->name('eliminar.evento')->middleware('can:eliminar.evento');

    Route::get('consultarEvento/{id?}','EventoController@consultar')->name('consultar.evento')                              ->middleware('can:consultar.evento');
    
    Route::put('consultarEvento/{id?}','EventoController@editar')->name('editar.evento')->middleware('can:editar.evento');

    // Entrada Evento - Incluye la consulta de cliente

    Route::get('consultarEntradas/{id?}', 'entradaController@consultar')->name('consultar.entradas')->middleware('can:comprar.entradas');
    Route::get('ventaEntrada/{id?}', 'entradaController@comprarView')->name('comprar.entradas')->middleware('can:comprar.entradas');
    Route::post('EscogerMetodoDePagoEntrada/{id?}', 'entradaController@asociarEntrada')->name('pagar.entrada')->middleware('can:comprar.entradas');

    Route::get('EscogerMetodoDePagoEntrada/{total?}', 'entradaController@escogerMetodo')->name('escogerMetodoDigitalEntrada');

    Route:: get('digitalProcesadaEntrada/{codigo_metodo_pago?}/{total?}', 'entradaController@digitalProcesarEntrada')->name('digitalProcesarEntrada');


    // Reportes

                //carnet
                Route::get('reporteCarnet/{id?}', 'reporteController@carnet')->name('reporte.carnet');
                Route::get('reporteCarnetJuridico/{id?}', 'reporteController@carnetJuridico')->name('reporte.carnet.juridico');
                                                //recibo de afiliacion

                Route::get('reporteReciboAfiliacion/{id?}', 'reporteController@reciboAfiliacion')->name('reporte.reciboAfiliacion');

                Route::post('reporteTop10Cerveza/', 'reporteController@top10Cerveza')->name('reporte.top10.cerveza')->middleware('can:reporte.cerveza');

                Route::get('reporteTop10Cerveza', function () {
                    return view('reporteTop10Cerveza');
                })->name('vista.reporte.top10.cerveza');

                            //ficha de afiliacion
                Route::get('reporteFicha/{id?}', 'reporteController@ficha')->name('reporte.ficha');
            
                            //top 10 cliente
                Route::get('reporteTop10Cliente', function () {
                    return view('reporteTop10Cliente');
                })->name('vista.reporte.top10.cliente');
            
                Route::post('reporteTop10Cliente/', 'reporteController@top10Cliente')->name('reporte.top10.cliente')->middleware('can:reporte.cliente');
            
                            //inventariooo
                    
                 Route::get('reporteInventario', function () {
                                return view('reporteInventario');
                 })->name('vista.reporte.inventario');
                        
                 Route::post('reporteInventario/', 'reporteController@inventario')->name('reporte.inventario')->middleware('can:reporte.inventario');
            
                            //tipo de cerveza
            
                 Route::get('reporteTipoCerveza', function () {
                                return view('reporteTipoCerveza');
                 })->name('vista.reporte.tipoCerveza');
                        
                 Route::post('reporteTipoCerveza/', 'reporteController@tipoCerveza')->name('reporte.tipoCerveza')->middleware('can:reporte.tipoCerveza');

                    //top evento

                    Route::get('reporteTop5Evento', function () {
                        return view('reporteTop5Evento');
                     })->name('vista.reporte.top5.evento');
                
                     Route::post('reporteTop5Evento/', 'reporteController@top5evento')->name('reporte.top5.evento');
                 
            
                            //reporte asistencia 
                  Route::get('reporteAsistencia/', 'reporteController@asistencia')->name('reporte.asistencia');

                            //factura
                  Route::get('reporteFactura/{id?}', 'reporteController@factura')->name('reporte.factura');
});


//Parte de registrar usuario 

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('registrarUsuario', 'UserController@viewRegistrarUsuario')->name('registrarUsuario');
Route::post('crearUsuario', 'UserController@usuarioEmpleado')->name('usuario.empleado');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

//Registrar cliente

Route::get('registrarClienteNatural','clienteControlador@vista')->name('registrarClienteNatural');

Route::post('registrarClienteNatural', 'clienteControlador@crear')->name('cliente.natural.crear');

Route::get('consultarClienteNatural','clienteControlador@consultar')->name('consultarClienteNatural');

Route::get('registrarClienteJuridico','clienteControlador@vistajuridico')->name('registrarClienteJuridico');

Route::post('registrarClienteJuridico', 'clienteControlador@crearjuridico')->name('cliente.juridico.crear');

Route::put('consultarClienteNatural/{rif_cliente?}','clienteControlador@editarNatural')->name('editar.natural');

Route::delete('consultarClienteNatural/{rif_cliente?}', 'clienteControlador@eliminarNatural')->name('eliminar.natural');

Route::get('consultarClienteJuridico','clienteControlador@consultarJuridico')->name('consultarClienteJuridico');

Route::put('consultarClienteJuridico/{rif_cliente?}','clienteControlador@editarJuridico')->name('editar.juridico');

Route::delete('consultarClienteJuridico/{rif_cliente?}', 'clienteControlador@eliminarJuridico')->name('eliminar.juridico');

//Proveedor
Route::get('registrarProveedor','proveedorCon@vista')->name('registrarProveedor');

Route::post('registrarProveedor', 'proveedorCon@crearproveedor')->name('proveedor.crear');

Route::get('consultarProveedor/{rif_proveedor?}','proveedorCon@consultar')->name('consultarProveedor');
Route::get('consultarProveedor/','proveedorCon@consultarPerfil')->name('consultarPerfilProveedor');

Route::put('consultarProveedor/{rif_proveedor?}','proveedorCon@editar')->name('editar.proveedor');

Route::delete('consultarProveedor/{rif_proveedor?}', 'proveedorCon@eliminar')->name('eliminar.proveedor');

Route::get('proveedores', 'proveedorCon@proveedores')->name('proveedores');


//cervezaa

Route::get('productos','CatalogoControlador@productos')->name('productos');
Route::post('/registrarProducto', 'CervezaControlador@crear')->name('cerveza.crear');
Route::get('registrarProducto','CervezaControlador@vista')->name('registrarProducto');
Route::get('ConsultarProductoCliente/{codigo_cerveza?}','consultarProductoClienteControlador@consultar')->name('ConsultarProductoCliente');
Route::get('Listadodeproductos','CervezaControlador@listado')->name('Listadodeproductos');



/* Tipo de cerveza */
//Route::get('registrarTipoCerveza',


// Receta
Route::get('registrarReceta/{codigo_cerveza?}','RecetaControlador@vista')->name('registrarReceta');
Route::post('registrarReceta/{codigo_cerveza?}','RecetaControlador@añadirReceta')->name('añadirReceta');
Route::get('modificarReceta/{codigo_receta}','RecetaControlador@vistaModifica')->name('modifica');
Route::put('modificarReceta/{codigo_receta}','RecetaControlador@modificar')->name('modificar');
Route::delete('modificarReceta/{codigo_receta}','RecetaControlador@elimina')->name('eliminarReceta');

// Ingredientes
Route::get('ingredientes','IngredienteControlador@vista')->name('ingredientes');
Route::post('registrarIngrediente','IngredienteControlador@crear')->name('registrarIngrediente');
Route::put('modificarIngrediente/{codigo_ingrediente}','IngredienteControlador@modifica')->name('modificaIngrediente');
Route::get('modificarIngrediente/{codigo_ingrediente}','IngredienteControlador@vistaModificar')->name('modificarIngrediente');
Route::delete('modificarIngrediente/{codigo_ingrediente}','IngredienteControlador@eliminar')->name('eliminaIngrediente');

//Cuota afiliación

Route::post('generarCuotas/{fecha?}', 'cuotaCon@registrarCuotas')->name('registrar.cuotaAfiliacion');
Route::get('generarCuotas', 'cuotaCon@generarCuotas')->name('generarCuotas');
Route::put('modificarCuota/{codigo_cuota?}', 'cuotaCon@editarCuota')->name('editar.cuotaAfiliacion');
Route::get('modificarCuota/{codigo_cuota?}', 'cuotaCon@modificarCuota')->name('modificarCuota');
Route::delete('modificarCuota/{codigo_cuota?}', 'cuotaCon@eliminarCuota')->name('eliminar.cuotaAfiliacion');
Route::get('cuotasEmpleado', 'cuotaCon@cuotasEmpleado')->name('cuotasEmpleado');
Route::get('consultarCuotaProveedor/{codigo_cuota?}', 'cuotaCon@consultarCuotaProveedor')->name('consultarCuotaProveedor');
Route::get('escogerMetodoCuota/{codigo_cuota?}/{monto_cuota?}', 'cuotaCon@escogerMetodoCuota')->name('escogerMetodoCuota');
Route::post('escogerMetodoCuota/{codigo_cuota?}/{monto_cuota?}', 'cuotaCon@registrarMetodoCuota')->name('registrar.metodoCuota');
Route::put('cuotaProcesada/{codigo_metodo_pago?}/{total?}/{codigo_cuota?}', 'cuotaCon@cuotaProcesada')->name('cuotaProcesada');
Route::get('cuotaProcesada/{codigo_metodo_pago?}/{total?}/{codigo_cuota?}', 'cuotaCon@cuotaProcesar')->name('cuotaProcesar');


Route::get('cuotasProveedor', 'cuotaCon@cuotasProveedor')->name('cuotasProveedor');

//Orden de compra

Route::get('ordenesPendientes', 'ordenCon@ordenesPendientes')->name('ordenesPendientes');

Route::get('aprobarOrden/{codigo_estatus?}', 'ordenCon@aprobarOrden')->name('aprobarOrden');

// Route::post('aprobarOrden/{codigo_estatus?}', 'ordenCon@aprobarOrden')->name('aprobar.orden');

Route::delete('aprobarOrden/{codigo_orden_compra?}', 'ordenCon@eliminarOrden')->name('eliminar.ordenCompra');

Route::post('aprobarOrden/{codigo_estatus?}', 'ordenCon@aprobacionOrden')->name('aprobar.orden');

Route::get('ordenesAprobadas', 'ordenCon@ordenesAprobadas')->name('ordenesAprobadas');
Route::get('recibirOrden/{codigo_estatus?}', 'ordenCon@recibirOrden')->name('recibirOrden');
Route::post('recibirOrden/{codigo_estatus?}', 'ordenCon@recepcionOrden')->name('recibir.orden');

// Venta por tienda Física 

Route::get('TiendaFisica','ventaTiendaFisicaControlador@vistaVenta')->name('TiendaFisica');
Route::get('ventaTiendaFisica/{mostrarCliente}','ventaTiendaFisicaControlador@crearVenta')->name('crearVenta');
Route::get('ventaDetalleFisica/{numero_factura}','ventaTiendaFisicaControlador@verDetalle')->name('detalleVenta');
Route::post('ventaDetalleFisica/{ventaActual}','ventaTiendaFisicaControlador@añadirProducto');


//Carrito

Route::post('ConsultarProductoCliente/{codigo_cerveza?}', 'consultarProductoClienteControlador@registrarEnCarrito')->name('registrarEnCarrito');

Route::get('carrito','consultarProductoClienteControlador@consultarCarrito')->name('carrito');

Route::delete('carrito/{codigo_carrito}','consultarProductoClienteControlador@eliminarDeCarrito')->name('eliminarDeCarrito');

Route::get('consultarCarrito/{codigo_carrito}','consultarProductoClienteControlador@consultarCarritoIndividual')->name('consultarCarrito');

Route::put('consutlarCarrito/{codigo_carrito?}','consultarProductoClienteControlador@modificarCarrito')->name('editar.carrito');

Route::get('EscogerMetodoDePagoCompraDigital/{total?}', 'consultarProductoClienteControlador@escogerMetodo')->name('escogerMetodoDigital');

Route::post('digitalProcesada/{codigo_metodo_pago?}/{total?}', 'consultarProductoClienteControlador@digitalProcesada')->name('digitalProcesada');

Route:: get('digitalProcesada/{codigo_metodo_pago?}/{total?}', 'consultarProductoClienteControlador@digitalProcesar')->name('digitalProcesar');

Route::get('miscompras','consultarProductoClienteControlador@consultarCompras')->name('miscompras');

Route::get('consultarVenta/{numero_factura?}','consultarProductoClienteControlador@consultarVenta')->name('consultarVenta');

//inventario
Route::get('inventario','inventarioControlador@inventario')->name('inventario');


Route::get('menuReportes', function () {
    return view('menuReportes');
})->name('menuReportes');

