<?php
use App\Http\Controllers\AdmissionController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoArchivoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\FirmaDigitalController;
use App\Http\Controllers\RolPermisoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role:admin|supervisor'])->group(function () {
    Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
    Route::get('/inscripciones/{id}', [InscripcionController::class, 'show'])->name('inscripciones.show');
});
Route::get('/admissions', [AdmissionController::class, 'create'])->name('admissions.create');
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');
Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', function () {
        return view('matriculacion.form1');
    })->name('complete-profile');
    Route::post('/matriculation/store', function () {
        // Aquí puedes simular el guardado o mostrar un mensaje temporal
        return 'Formulario guardado temporalmente (esto es solo una prueba)';
    })->name('matriculation.store');

});
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
Route::get('/home', function () {
    return view('dashboard');
})->name('home');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


});
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('archivo', ArchivoController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('rol', RolController::class);
Route::resource('tipo_archivo', TipoArchivoController::class);
Route::resource('permiso', PermisoController::class);
Route::resource('notificacion', NotificacionController::class);
Route::resource('documento', DocumentoController::class);
Route::resource('firma_digital', FirmaDigitalController::class);
Route::resource('rol_permiso', RolPermisoController::class);
Route::resource('users', UserController::class);

});
require __DIR__.'/auth.php';
