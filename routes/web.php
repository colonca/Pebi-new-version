<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //pagina principal despues de que el usuario se haya logueado
    Route::view('/dashboard', 'dashboard');

    //modulo de generales
    Route::prefix('generales')->group(function () {
        Route::view('/talleres-grupales', 'pages.generales.talleres_grupales.index')->name('generales.talleres_grupales');
        Route::view('/campañas', 'pages.generales.campanhas.index')->name('generales.campanhas');
    });

    //modulo de intervenciones
    Route::prefix('intervenciones')->group(function () {
        Route::view('/grupales/index', 'pages.intervenciones.grupales.index');
    });
});
