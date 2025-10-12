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



Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\FirmaDigitalController;
use App\Http\Controllers\RolPermisoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InscripcionmateriaController;
use App\Http\Controllers\MateriaController;


Route::middleware(['auth'])->group(function () {
    Route::get('/matriculacion', [AdmissionController::class, 'create'])->name('admissions.create');
    Route::post('/matriculacion', [AdmissionController::class, 'store'])->name('admissions.store');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admissions/create', [AdmissionController::class, 'create'])->name('admissions.create');
    Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');
    Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
    Route::get('/admissions/{id}', [AdmissionController::class, 'show'])->name('admissions.show');
});


Route::get('/complete-profile', [AdmissionController::class, 'create'])->name('complete-profile');
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');


Route::middleware(['auth'])->group(function () {
    // Página principal de inscripción
    Route::get('/inscripciones', [InscripcionMateriaController::class, 'index'])->name('inscripcionmateria.index');

    // Guardar inscripción
    Route::post('/inscripciones', [InscripcionMateriaController::class, 'store'])->name('inscripcionmateria.store');

    // Ver materias inscriptas
    Route::get('/mis-materias', [InscripcionMateriaController::class, 'misMaterias'])->name('inscripcionmateria.misMaterias');

    // Darse de baja
    Route::delete('/baja/{materiaId}', [InscripcionMateriaController::class, 'baja'])->name('inscripcionmateria.baja');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('materias', MateriaController::class);

    Route::get('/inscripcion-materias', [InscripcionmateriaController::class, 'index'])->name('inscripcionmateria.index');
    Route::post('/inscripcion-materias', [InscripcionmateriaController::class, 'store'])->name('inscripcionmateria.store');
    Route::get('/mis-materias', [InscripcionmateriaController::class, 'misMaterias'])->name('inscripcion.misMaterias');
    Route::delete('/inscripcion-materias/{materia}', [InscripcionmateriaController::class, 'baja'])->name('inscripcionmateria.baja');
});

Route::resource('materias', MateriaController::class)->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/inscripcionmateria', [InscripcionmateriaController::class, 'index'])->name('inscripcionmateria.index');
    Route::post('/inscripcionmateria/store', [InscripcionmateriaController::class, 'store'])->name('inscripcionmateria.store');
    Route::get('/mis-materias', [InscripcionmateriaController::class, 'misMaterias'])->name('mis.materias');
    Route::delete('/baja-materia/{materiaId}', [InscripcionmateriaController::class, 'baja'])->name('baja.materia');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inscripcionmateria', [InscripcionmateriaController::class, 'index'])->name('inscripcionmateria.index');
    Route::post('/inscripcionmateria/store', [InscripcionmateriaController::class, 'store'])->name('inscripcionmateria.store');
    Route::get('/mis-materias', [InscripcionmateriaController::class, 'misMaterias'])->name('inscripcionmateria.misMaterias');
    Route::delete('/baja-materia/{materiaId}', [InscripcionmateriaController::class, 'baja'])->name('inscripcionmateria.baja');
});


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
Route::get('/home', function () {
    return view('dashboard');
})->name('home');


Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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
