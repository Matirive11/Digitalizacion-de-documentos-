<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoArchivoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\documentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('archivo', ArchivoController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('rol', RolController::class);
Route::resource('tipo_archivo', TipoArchivoController::class);
Route::resource('permiso', PermisoController::class);
Route::resource('persona', PersonaController::class);
Route::resource('supervisor', SupervisorController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('documento', documentoController::class);


require __DIR__.'/auth.php';
