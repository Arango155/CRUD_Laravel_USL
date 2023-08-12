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
//Ruta para Home
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('home.index');




//Excel
Route::get('/alumnos/export', [App\Http\Controllers\AlumnoController::class, 'exporAllAlumnos'])->name('alumno.export');


//Rutas para Alumnos
Route::get('/listar_alumno', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno.index');
Route::get('/listar_alumno', [App\Http\Controllers\AlumnoController::class, 'index2'])->name('alumno.index2');
Route::get('/create_alumno', [App\Http\Controllers\AlumnoController::class, 'create'])->name('alumno.create');
Route::post('/store_alumno', [App\Http\Controllers\AlumnoController::class, 'store'])->name('alumno.store');
Route::get('/edit_alumno/{id}', [App\Http\Controllers\AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('/update_alumno/{id}', [App\Http\Controllers\AlumnoController::class, 'update'])->name('alumno.update');
Route::get('/show_alumno/{id}', [App\Http\Controllers\AlumnoController::class, 'show'])->name('alumno.show');
Route::delete('/destroy_alumno/{id}', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('alumno.destroy');

//Notas
Route::get('/listar_nota', [App\Http\Controllers\NotaController::class, 'index'])->name('nota.index');
Route::get('/edit_nota/{id}', [App\Http\Controllers\NotaController::class, 'edit'])->name('nota.edit');
Route::put('/update_nota/{id}', [App\Http\Controllers\NotaController::class, 'update'])->name('nota.update');
Route::get('/show_nota/{id}', [App\Http\Controllers\NotaController::class, 'show'])->name('nota.show');

//Rutas para Catedratico
Route::get('/listar_catedratico', [App\Http\Controllers\CatedraticoController::class, 'index'])->name('catedratico.index');
Route::get('/create_catedratico', [App\Http\Controllers\CatedraticoController::class, 'create'])->name('catedratico.create');
Route::post('/store_catedratico', [App\Http\Controllers\CatedraticoController::class, 'store'])->name('catedratico.store');
Route::get('/edit_catedratico/{id}', [App\Http\Controllers\CatedraticoController::class, 'edit'])->name('catedratico.edit');
Route::put('/update_catedratico/{id}', [App\Http\Controllers\CatedraticoController::class, 'update'])->name('catedratico.update');
Route::get('/show_catedratico/{id}', [App\Http\Controllers\CatedraticoController::class, 'show'])->name('catedratico.show');
Route::delete('/destroy_catedratico/{id}', [App\Http\Controllers\CatedraticoController::class, 'destroy'])->name('catedratico.destroy');


//Reporte
Route::get('reporte_alumno',[App\Http\Controllers\ReporteController::class,'index'])->name('reporte.index');


//Rutas para Grado
Route::get('listar_grado',[App\Http\Controllers\GradoController::class,'index'])->name('grado.index');
Route::get('/create_grado', [App\Http\Controllers\GradoController::class, 'create'])->name('grado.create');
Route::post('/store_grado', [App\Http\Controllers\GradoController::class, 'store'])->name('grado.store');
Route::get('/edit_grado/{id}', [App\Http\Controllers\GradoController::class, 'edit'])->name('grado.edit');
Route::put('/update_grado/{id}', [App\Http\Controllers\GradoController::class, 'update'])->name('grado.update');
Route::get('/show_grado/{id}', [App\Http\Controllers\GradoController::class, 'show'])->name('grado.show');
Route::delete('/destroy_grado/{id}', [App\Http\Controllers\GradoController::class, 'destroy'])->name('grado.destroy');

//Rutas para Sucursales
Route::get('listar_sucursal',[App\Http\Controllers\SucursalController::class,'index'])->name('sucursal.index');
Route::get('/agregar_sucursal', [App\Http\Controllers\SucursalController::class, 'create'])->name('sucursal.create');
Route::post('/store_sucursal', [App\Http\Controllers\SucursalController::class, 'store'])->name('sucursal.store');
Route::get('/edit_sucursal/{id}', [App\Http\Controllers\SucursalController::class, 'edit'])->name('sucursal.edit');
Route::put('/update_sucursal/{id}', [App\Http\Controllers\SucursalController::class, 'update'])->name('sucursal.update');
Route::get('/show_sucursal/{id}', [App\Http\Controllers\SucursalController::class, 'show'])->name('sucursal.show');
Route::delete('/destroy_sucursal/{id}', [App\Http\Controllers\SucursalController::class, 'destroy'])->name('sucursal.destroy');

//Rutas para Cursos
Route::get('listar_curso',[App\Http\Controllers\CursoController::class,'index'])->name('curso.index');
Route::get('/agregar_curso', [App\Http\Controllers\CursoController::class, 'create'])->name('curso.create');
Route::post('/store_curso', [App\Http\Controllers\CursoController::class, 'store'])->name('curso.store');
Route::get('/edit_curso/{id}', [App\Http\Controllers\CursoController::class, 'edit'])->name('curso.edit');
Route::put('/update_curso/{id}', [App\Http\Controllers\CursoController::class, 'update'])->name('curso.update');
Route::get('/show_curso/{id}', [App\Http\Controllers\CursoController::class, 'show'])->name('curso.show');
Route::delete('/destroy_curso/{id}', [App\Http\Controllers\CursoController::class, 'destroy'])->name('curso.destroy');

