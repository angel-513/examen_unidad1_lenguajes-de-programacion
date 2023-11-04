<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DirectorioController;

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
});

Route::get('/directorio', [DirectorioController::class, 'listarDirectorios'])->name('directorio.inicio');

Route::get('/directorio/agregar', [DirectorioController::class, 'agregarDirectorio'])->name('directorio.agregar');

Route::get('/directorio/buscar', [DirectorioController::class, 'buscarDirectorio'])->name('directorio.buscar');

Route::get('/directorio/contactos', [DirectorioController::class, 'verContactos'])->name('directorio.contactos');

Route::get('/directorio/eliminar', [DirectorioController::class, 'eliminarDirectorio'])->name('directorio.eliminar');



