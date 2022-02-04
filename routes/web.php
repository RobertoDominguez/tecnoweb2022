<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MensualidadController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\ReporteController;
use App\Models\contador;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {

    $contador = contador::find('index');
    $contador->update(['count' => $contador->count + 1]);
    
    return view('index',compact('contador'));
})->name('index');

/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/login', [AccesoController::class, 'loginView'])->name('acceso.login');
Route::post('/login', [AccesoController::class, 'ingresar'])->name('usuario.ingresar');
Route::post('/logout', [AccesoController::class, 'logout'])->name('logout');
Route::put('/login/{loginId}', [AccesoController::class, 'guardarSession'])->name('acceso.editar.guardar');


Route::get('/verPerfil/{usuarioId}', [UsuarioController::class, 'verPerfil'])->name('usuario.verPerfil');
Route::put('/modificar-usuario/{usuarioId}', [UsuarioController::class, 'guardarModificacion'])->name('usuario.editar.guardar');
Route::get('/registrar-usuario', [UsuarioController::class, 'create'])->name('usuario.registrar');
Route::post('/registrar-usuario', [UsuarioController::class, 'registrar'])->name('usuarios.CrearReg');
Route::get('/usuario-listar', [UsuarioController::class, 'listar'])->name('usuario.listar');

Route::get('/modificar-user/{usuarioId}', [UsuarioController::class, 'editar'])->name('usuario.editar');
Route::delete('/eliminarUser/{usuarioId}', [UsuarioController::class, 'eliminar'])->name('usuario.eliminar');
Route::get('/acceso-listar', [AccesoController::class, 'listar'])->name('acceso.listar');

Route::get('/registrar-producto', [ProductoController::class, 'create'])->name('producto.registrar');
Route::post('/registrar-producto', [ProductoController::class, 'registrar'])->name('producto.CrearReg');
Route::get('/producto-listar', [ProductoController::class, 'listar'])->name('producto.listar');
Route::get('/modificar-producto/{productoId}', [ProductoController::class, 'editar'])->name('producto.editar');
Route::put('/modificar-producto/{productoId}', [ProductoController::class, 'guardarModificacion'])->name('producto.editar.guardar');
Route::delete('/eliminarProd/{productoId}', [ProductoController::class, 'eliminar'])->name('producto.eliminar');

Route::get('/Mensualidad-listar', [MensualidadController::class, 'listar'])->name('mensualidad.listar');
Route::get('/modificar-Mensualidad/{mensualidadId}', [MensualidadController::class, 'editar'])->name('mensualidad.editar');
Route::put('/modificar-Mensualidad/{mensualidadId}', [MensualidadController::class, 'guardarModificacion'])->name('mensualidad.editar.guardar');
Route::delete('/eliminarMen/{mensualidadId}', [MensualidadController::class, 'eliminar'])->name('mensualidad.eliminar');
Route::get('/registrar-Mensualidad', [MensualidadController::class, 'create'])->name('mensualidad.registrar');
Route::post('/registrar-Mensualidad', [MensualidadController::class, 'registrar'])->name('mensualidad.CrearReg');

Route::get('/registrar-ventas', [NotaVentaController::class, 'create'])->name('ventas.registrar');

Route::get('/ventas-listar', [NotaVentaController::class, 'listar'])->name('ventas.listar');
Route::get('/ventas-listar-usuario', [NotaVentaController::class, 'listarUser'])->name('ventas.usuario.listar');
Route::get('/ventas-listar-usuario/{notaventaId}', [NotaVentaController::class, 'listarDetalle'])->name('notaventa.detalleventa');


Route::get('/Rutina-listar', [RutinaController::class, 'listar'])->name('rutina.listar');
Route::get('/modificar-Rutina/{rutinaId}', [RutinaController::class, 'editar'])->name('rutina.editar');
Route::put('/modificar-Rutina/{rutinaId}', [RutinaController::class, 'guardarModificacion'])->name('rutina.editar.guardar');
Route::delete('/eliminar-Rutina/{rutinaId}', [RutinaController::class, 'eliminar'])->name('rutina.eliminar');
Route::get('/registrar-Rutina', [RutinaController::class, 'create'])->name('rutina.registrar');
Route::post('/registrar-Rutina', [RutinaController::class, 'registrar'])->name('rutina.CrearReg');

Route::get('/Rutina/ejercicios-listar/{rutinaId}', [RutinaController::class, 'ejercicios'])->name('rutina.ejercicio.listar');
Route::post('/registrar-Ejercicio/{rutinaId}', [RutinaController::class, 'registrarEjercicio'])->name('rutina.ejercicio.CrearReg');
Route::delete('/eliminar-Ejercicio/{ejercicioId}/{rutinaId}', [RutinaController::class, 'eliminarEjercicio'])->name('rutina.ejercicio.eliminar');


Route::get('/Asistencia-listar-usuarios', [AsistenciaController::class, 'usuarios'])->name('asistencia.usuario.listar');
Route::get('/Asistencia-listar/{usuarioId}', [AsistenciaController::class, 'listar'])->name('asistencia.listar');
Route::delete('/eliminar-asistencia/{asistenciaId}', [AsistenciaController::class, 'eliminar'])->name('asistencia.eliminar');
Route::post('/registrar-Asistencia/{usuarioId}', [AsistenciaController::class, 'registrar'])->name('asistencia.CrearReg');

Route::get('/Horario-listar-usuarios', [HorarioController::class, 'usuarios'])->name('horario.usuario.listar');
Route::get('/Horario-listar/{usuarioId}', [HorarioController::class, 'listar'])->name('horario.listar');
Route::delete('/eliminar-horario/{horarioId}/{usuarioId}', [HorarioController::class, 'eliminar'])->name('horario.eliminar');
Route::post('/registrar-Horario/{usuarioId}', [HorarioController::class, 'registrar'])->name('horario.CrearReg');

Route::get('/administrador', [ReporteController::class, 'administrador'])->name('reporte.administrador');
Route::get('/entrenador', [ReporteController::class, 'entrenador'])->name('reporte.entrenador');
Route::get('/cliente', [ReporteController::class, 'cliente'])->name('reporte.cliente');

Route::get('/charts',[ReporteController::class,'chart'])->name('charts');