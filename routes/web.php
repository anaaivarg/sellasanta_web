<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventoController;

Route::view('/', 'main')->name("main");
Route::view('/cofradia', 'cofradia')->name('cofradia');
Route::view('/noticias', 'noticias')->name('noticias');
Route::view('/semana-santa', 'semanasanta')->name('semanasanta');
Route::view('/contacto', 'contacto')->name('contacto');

Route::match(['get', 'post'], '/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('main');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Calendario para todos (solo lectura)
    Route::get('/calendario', [EventoController::class, 'calendarioUsuario'])->name('eventos.usuario');
    Route::get('/eventos/data', [EventoController::class, 'getEventos'])->name('eventos.data');
     Route::get('/eventos/{id}/qr', [EventoController::class, 'generarQR'])->name('eventos.qr');
    
    
    Route::get('/registrar-asistencia', [EventoController::class, 'registrarAsistencia'])->name('eventos.registrar');
   
    
    //  Estadísticas del usuario
    Route::get('/mis-estadisticas', [App\Http\Controllers\AsistenciaController::class, 'misEstadisticas'])->name('mis.estadisticas');
});
    
    // Rutas protegidas para administradores
    Route::middleware('admin')->group(function () {
        // Gestión de eventos (CRUD completo)
        Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
        Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
        Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
        Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
        Route::patch('/usuarios/{usuario}/activar', [UsuarioController::class, 'activar'])->name('usuarios.activar');
        Route::middleware(['auth', 'admin'])->group(function () {
    
    
    //  Control de Asistencias
    Route::get('/asistencias', [App\Http\Controllers\AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('/asistencias/evento/{id}', [App\Http\Controllers\AsistenciaController::class, 'detalleEvento'])->name('asistencias.evento');
    Route::get('/asistencias/usuario/{id}', [App\Http\Controllers\AsistenciaController::class, 'detalleUsuario'])->name('asistencias.usuario');
});
        
        // Gestión de usuarios (CRUD completo)
        Route::resource('usuarios', UsuarioController::class);
    });


require __DIR__ . '/auth.php';


