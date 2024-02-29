<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatosTecnicosTelefonoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AveriaController;


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
    return view('welcome');
    //return view('auth/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Escritorio
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Consultas Datos Técnicos
Route::get('/consulta_datos_telefono', [DatosTecnicosTelefonoController::class, 'index'])->middleware(['auth', 'verified'])->name('consulta_datos_telefono.index');

//CRUD Zonas
Route::get('/zonas', [ZonaController::class, 'index'])->middleware(['auth', 'verified'])->name('zonas.index');
Route::get('/zonas/create', [ZonaController::class, 'create'])->middleware(['auth', 'verified'])->name('zonas.create');
Route::post('/zonas/store', [ZonaController::class, 'store'])->middleware(['auth', 'verified'])->name('zonas.store');
Route::get('/zonas/{zona}', [ZonaController::class, 'show'])->middleware(['auth', 'verified'])->name('zonas.show');
Route::get('/zonas/{zona}/edit', [ZonaController::class, 'edit'])->middleware(['auth', 'verified'])->name('zonas.edit');
Route::put('/zonas/{zona}', [ZonaController::class, 'update'])->middleware(['auth', 'verified'])->name('zonas.update');
//Route::delete('/zonas/{zona}', [ZonaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('zonas.destroy');
Route::delete('/zonas/{zona}/hide', [ZonaController::class, 'hide'])->middleware(['auth', 'verified'])->name('zonas.hide');

//CRUD Servicios
Route::get('/tipo_servicio', [TipoServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('tipo_servicio.index');
Route::get('/tipo_servicio/create', [TipoServicioController::class, 'create'])->middleware(['auth', 'verified'])->name('tipo_servicio.create');
Route::post('/tipo_servicio/store', [TipoServicioController::class, 'store'])->middleware(['auth', 'verified'])->name('tipo_servicio.store');
Route::get('/tipo_servicio/{tipo_servicio}', [TipoServicioController::class, 'show'])->middleware(['auth', 'verified'])->name('tipo_servicio.show');
Route::get('/tipo_servicio/{tipo_servicio}/edit', [TipoServicioController::class, 'edit'])->middleware(['auth', 'verified'])->name('tipo_servicio.edit');
Route::put('/tipo_servicio/{tipo_servicio}', [TipoServicioController::class, 'update'])->middleware(['auth', 'verified'])->name('tipo_servicio.update');
Route::delete('/tipo_servicio/{tipo_servicio}', [TipoServicioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('tipo_servicio.destroy');

//CRUD Personas
Route::get('/personas', [PersonaController::class, 'index'])->middleware(['auth', 'verified'])->name('personas.index');
Route::get('/personas/create', [PersonaController::class, 'create'])->middleware(['auth', 'verified'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->middleware(['auth', 'verified'])->name('personas.store');
Route::get('/personas/{persona}', [PersonaController::class, 'show'])->middleware(['auth', 'verified'])->name('personas.show');
Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->middleware(['auth', 'verified'])->name('personas.edit');
Route::put('/personas/{persona}', [PersonaController::class, 'update'])->middleware(['auth', 'verified'])->name('personas.update');
Route::delete('/personas/{persona}', [PersonaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('personas.destroy');

//CRUD Averias
Route::get('/averias', [AveriaController::class, 'index'])->middleware(['auth', 'verified'])->name('averias.index');
Route::get('/averias/create', [AveriaController::class, 'create'])->middleware(['auth', 'verified'])->name('averias.create');
Route::post('/averias', [AveriaController::class, 'store'])->middleware(['auth', 'verified'])->name('averias.store');
Route::get('/averias/{averia}', [AveriaController::class, 'show'])->middleware(['auth', 'verified'])->name('averias.show');
Route::get('/averias/{averia}/edit', [AveriaController::class, 'edit'])->middleware(['auth', 'verified'])->name('averias.edit');
Route::put('/averias/{averia}', [AveriaController::class, 'update'])->middleware(['auth', 'verified'])->name('averias.update');
Route::delete('/averias/{averia}', [AveriaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('averias.destroy');

require __DIR__.'/auth.php';