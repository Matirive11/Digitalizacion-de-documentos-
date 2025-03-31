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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Admission;

Route::middleware(['auth', 'role:admin|supervisor'])->group(function () {
    Route::get('/inscripciones', [AdmissionController::class, 'index'])->name('inscripciones.index');
    Route::get('/inscripciones/{id}', [AdmissionController::class, 'show'])->name('inscripciones.show');
    Route::delete('/inscripciones/{id}', [AdmissionController::class, 'destroy'])->name('inscripciones.destroy');
    Route::get('/inscripciones/{id}/pdf', [AdmissionController::class, 'downloadPdf'])->name('inscripciones.downloadPdf');
    Route::put('/admissions/{id}/update-state', [AdmissionController::class, 'actualizarEstado'])->name('admissions.updateState');

    Route::middleware(['can:view-admissions'])->group(function () {
        Route::get('/admin/admissions', [AdmissionController::class, 'index'])->name('admin.admissions'); // Ver todas las admisiones
        Route::get('/admin/admissions/{id}', [AdmissionController::class, 'show'])->name('admin.admissions.show'); // Ver detalle de una admisión
    });
});

// Rutas protegidas (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [AdmissionController::class, 'create'])->name('complete-profile');
    Route::post('/inscripciones/store', [AdmissionController::class, 'store'])->name('inscripciones.store');
    Route::resource('documento', DocumentoController::class);
    Route::get('/inscripciones/edit/{id}', [AdmissionController::class, 'edit'])->name('inscripciones.edit');
    Route::put('/inscripciones/update/{id}', [AdmissionController::class, 'update'])->name('inscripciones.update');


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
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


});
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('archivo', ArchivoController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('rol', RolController::class);
Route::resource('tipo_archivo', TipoArchivoController::class);
Route::resource('permiso', PermisoController::class);
Route::resource('notificacion', NotificacionController::class);
Route::resource('firma_digital', FirmaDigitalController::class);
Route::resource('rol_permiso', RolPermisoController::class);
Route::resource('users', UserController::class);
Route::get('/estadistica', [AdmissionController::class, 'estadistica'])->name('inscripciones.estadistica');

});
require __DIR__.'/auth.php';
