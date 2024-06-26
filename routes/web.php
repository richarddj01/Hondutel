<?php

use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AveriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Permissions;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Escritorio
Route::resource('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->names('dashboard');

//Consultas Datos Técnicos
Route::get('/telefonos/consulta_datos_telefono', [TelefonoController::class, 'mostrarDatosTelefono'])->middleware(['auth', 'verified'])->name('consulta_datos_telefono.index');

//Zonas
Route::resource('zonas', ZonaController::class)->middleware(['auth', 'verified']);
Route::delete('/zonas/{zona}/hide', [ZonaController::class, 'hide'])->middleware(['auth', 'verified'])->name('zonas.hide');

//Servicios
Route::resource('servicios', ServicioController::class)->middleware(['auth', 'verified']);

//Clientes
Route::resource('clientes', ClienteController::class)->middleware(['auth', 'verified']);
Route::get('/clientes/{cliente}/agregar-numero', [ClienteController::class, 'mostrarFormularioAgregarNumero'])->name('clientes.agregar-numero');
Route::post('/clientes/{cliente}/guardar-numero', [ClienteController::class, 'guardarNumero'])->name('clientes.guardar-numero');
Route::delete('/clientes/destroy/{abonado}', [ClienteController::class, 'destroyAbonado'])->name('clientes.eliminar-numero');
Route::get('/buscar-numeros', [ClienteController::class, 'buscarNumeros'])->name('buscar-numeros');
Route::get('/clientes/{cliente}/servicios/{abonado}', [ClienteController::class, 'showServiciosContratados'])->name('clientes.servicios');
Route::get('/clientes/{cliente}/servicios/{abonado}/create', [ClienteController::class, 'createServiciosContratados'])->name('clientes.serviciosCreate');
Route::post('/clientes/{cliente}/servicios/{abonado}', [ClienteController::class, 'storeServiciosContratados'])->middleware(['auth', 'verified'])->name('clientes.serviciosStore');
Route::delete('/clientes/eliminar-servicio/{abonados_servicio_id}', [ClienteController::class, 'destroyServiciosContratados'])->middleware(['auth', 'verified'])->name('clientes.serviciosDelete');

//Averias
Route::resource('averias', AveriaController::class)->middleware(['auth', 'verified']);
Route::get('/averias/{averia}/execute', [AveriaController::class, 'execute'])->middleware(['auth', 'verified'])->name('averias.execute');
Route::put('/averiasExecute/{averia}', [AveriaController::class, 'executeAveria'])->middleware(['auth', 'verified'])->name('averias.executeAverias');
Route::put('/averiasFinalizar/{averia}', [AveriaController::class, 'finalizarAveria'])->middleware(['auth', 'verified'])->name('averias.finalizarAveria');
Route::get('/averiasFinalizadas', [AveriaController::class, 'finalizadas'])->middleware(['auth', 'verified'])->name('averias.finalizadas');
Route::get('/averiasFinalizadas/{averia}', [AveriaController::class, 'showFinalizadas'])->middleware(['auth', 'verified'])->name('averias.showFinalizadas');
//Route::get('/averias/{averia}/execute', [AveriaController::class, 'execute'])->middleware(['auth', 'verified'])->name('averias.execute');

//Reportes
Route::get('/report/averias-finalizadas', [ReportController::class, 'averiasFinalizadas'])->middleware(['auth', 'verified'])->name('report.averiasFinalizadas');
Route::get('/report/averias-pendientes', [ReportController::class, 'averiasPendientes'])->middleware(['auth', 'verified'])->name('report.averiasPendientes');
Route::get('/report/averias-detalles', [ReportController::class, 'averiasDetalles'])->middleware(['auth', 'verified'])->name('report.averiasDetalles');
Route::get('report/{averia}/pdf', [AveriaController::class, 'averiasFinalizadasDetalle'])->name('report.averiasFinalizadasDetalle');


//Telefonos
Route::resource('telefonos', TelefonoController::class)->middleware(['auth', 'verified']);

//Inventarios
Route::resource('inventarios', InventarioController::class)->middleware(['auth', 'verified']);

// web.php
Route::get('/reportes', [ReportController::class, 'index'])->name('reportes.index');
Route::put('/reportes/generar', [ReportController::class, 'generate'])->name('reportes.generate');

//Usuarios
Route::resource('/users', UserController::class)->middleware(['auth', 'verified'])->names('users');

//Permisos
Route::resource('/permisos', PermissionsController::class)->middleware(['auth', 'verified'])->names('permisos');

//Roles
Route::resource('/roles', RolesController::class)->middleware(['auth', 'verified'])->names('roles');

//CRUD Averias
/*
Route::get('/averias', [AveriaController::class, 'index'])->middleware(['auth', 'verified'])->name('averias.index');
Route::get('/averias/create', [AveriaController::class, 'create'])->middleware(['auth', 'verified'])->name('averias.create');
Route::post('/averias', [AveriaController::class, 'store'])->middleware(['auth', 'verified'])->name('averias.store');
Route::get('/averias/{averia}', [AveriaController::class, 'show'])->middleware(['auth', 'verified'])->name('averias.show');
Route::get('/averias/{averia}/edit', [AveriaController::class, 'edit'])->middleware(['auth', 'verified'])->name('averias.edit');
Route::get('/averias/{averia}/execute', [AveriaController::class, 'execute'])->middleware(['auth', 'verified'])->name('averias.execute');
Route::get('/averias/{averia}', [AveriaController::class, 'executeAveria'])->middleware(['auth', 'verified'])->name('averias.executeAveria');
Route::put('/averias/{averia}', [AveriaController::class, 'update'])->middleware(['auth', 'verified'])->name('averias.update');
Route::delete('/averias/{averia}', [AveriaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('averias.destroy');
*/

//CRUD Zonas
/*
Route::get('/zonas', [ZonaController::class, 'index'])->middleware(['auth', 'verified'])->name('zonas.index');
Route::get('/zonas/create', [ZonaController::class, 'create'])->middleware(['auth', 'verified'])->name('zonas.create');
Route::post('/zonas/store', [ZonaController::class, 'store'])->middleware(['auth', 'verified'])->name('zonas.store');
Route::get('/zonas/{zona}', [ZonaController::class, 'show'])->middleware(['auth', 'verified'])->name('zonas.show');
Route::get('/zonas/{zona}/edit', [ZonaController::class, 'edit'])->middleware(['auth', 'verified'])->name('zonas.edit');
Route::put('/zonas/{zona}', [ZonaController::class, 'update'])->middleware(['auth', 'verified'])->name('zonas.update');
//Route::delete('/zonas/{zona}', [ZonaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('zonas.destroy');
*/

//CRUD Servicios
/*
Route::get('/servicios', [ServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('servicios.index');
Route::get('/servicios/create', [ServicioController::class, 'create'])->middleware(['auth', 'verified'])->name('servicios.create');
Route::post('/servicios/store', [ServicioController::class, 'store'])->middleware(['auth', 'verified'])->name('servicios.store');
Route::get('/servicios/{servicio}', [ServicioController::class, 'show'])->middleware(['auth', 'verified'])->name('servicios.show');
Route::get('/servicios/{servicio}/edit', [ServicioController::class, 'edit'])->middleware(['auth', 'verified'])->name('servicios.edit');
Route::put('/servicios/{servicio}', [ServicioController::class, 'update'])->middleware(['auth', 'verified'])->name('servicios.update');
Route::delete('/servicio/{servicio}', [ServicioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('servicios.destroy');
*/

//CRUD Clientes
/*
Route::get('/clientes', [ClienteController::class, 'index'])->middleware(['auth', 'verified'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->middleware(['auth', 'verified'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->middleware(['auth', 'verified'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->middleware(['auth', 'verified'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->middleware(['auth', 'verified'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->middleware(['auth', 'verified'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('clientes.destroy');
*/


require __DIR__ . '/auth.php';
