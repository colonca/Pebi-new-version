<?php

use App\Http\Controllers\CargaEstudianteController;
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
	return view('auth/login');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

	//pagina principal despues de que el usuario se haya logueado
	Route::view('/dashboard', 'pages/dashboard');
	Route::view('/calendario', 'pages/calendario/index');

	//modulo de generales
	Route::prefix('generales')->group(function () {
		Route::view('/lineas', 'pages.generales.lineas.index')->name('generales.lineas');
		Route::view('/talleristas', 'pages.generales.talleristas.index')->name('generales.talleristas');
		Route::view('/campañas', 'pages.generales.campanhas.index')->name('generales.campanhas');
		Route::view('/talleres-grupales', 'pages.generales.talleres_grupales.index')->name('generales.talleres_grupales');
		Route::view('/docentes-permanencia', 'pages.generales.docentes.index')->name('generales.docentes-permanencia');
	});

	Route::prefix('reportes')->group(function () {
		Route::view('/lineas', 'pages.reportes.lineas')->name('reportes.lineas');
		Route::view('/riesgos', 'pages.reportes.riesgos')->name('reportes.riesgos');
	});

	Route::prefix('cargas')->group(function () {
		Route::view('/estudiantes', 'pages.cargas.estudiantes')->name('cargas.estudiantes');
		Route::post('/estudiantes', [CargaEstudianteController::class, 'upload']);
	});

	Route::prefix('academico')->group(function () {
		Route::view('/estudiantes', 'pages.academico.estudiantes.index')->name('academico.estudiantes');
		Route::view('/periodos', 'pages.academico.periodos.index')->name('academico.periodos');
	});

	//modulo de intervenciones
	Route::prefix('intervenciones')->group(function () {
		Route::view('/grupales/index', 'pages.intervenciones.grupales.index');
		Route::view('/solicitudes/index', 'pages.intervenciones.individuales.index');
		Route::view('/historias/index', 'pages.intervenciones.historias.index');
		Route::view('/remisiones/index', 'pages.intervenciones.remisiones.index');
	});

	//modulo de usuarios
	Route::prefix('usuarios')->group(function () {
		Route::view('/users', 'pages.usuarios.index')->name('usuarios.index');
	});
});
