<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdmissionController,
    ProfileController,
    ArchivoController,
    CategoriaController,
    RolController,
    TipoArchivoController,
    PermisoController,
    NotificacionController,
    DocumentoController,
    FirmaDigitalController,
    RolPermisoController,
    InscripcionController,
    UserController,
    InscripcionMateriaController,
    MateriaController,
    DashboardController,
    AdminController
};



Route::middleware(['auth'])->group(function () {
    Route::get('/admission/create', [AdmissionController::class, 'create'])->name('admission.create');
    Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
    Route::get('/admission/{id}/edit', [AdmissionController::class, 'edit'])->name('admission.edit');
    Route::put('/admission/{id}', [AdmissionController::class, 'update'])->name('admission.update');
});




Route::put('/admission/{id}', [AdmissionController::class, 'update'])->name('admission.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/admission/{id}/edit', [AdmissionController::class, 'edit'])->name('admission.edit');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Formulario de inscripción
    Route::get('/inscripcion/edit/{id}', [AdmissionController::class, 'edit'])->name('admission.edit');
    Route::get('/inscripcion', [AdmissionController::class, 'create'])->name('complete-profile');
});


// ------------------------------------------------------
// 🏠 PÁGINA DE INICIO
// ------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// ------------------------------------------------------
// 🔐 DASHBOARD PRINCIPAL (solo admin y usuarios comunes)
// ------------------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------------------------------------------
// 🧾 MATRÍCULA / INSCRIPCIÓN PRINCIPAL
// ------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [AdmissionController::class, 'create'])->name('complete-profile');
    Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');
    Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
    Route::get('/admissions/{id}', [AdmissionController::class, 'show'])->name('admissions.show');
});

// ------------------------------------------------------
// 📚 INSCRIPCIÓN A MATERIAS (usuario común)
// ------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/inscripcionmateria', [InscripcionMateriaController::class, 'index'])->name('inscripcionmateria.index');
    Route::post('/inscripcionmateria', [InscripcionMateriaController::class, 'store'])->name('inscripcionmateria.store');

    Route::get('/mis-materias', [InscripcionMateriaController::class, 'misMaterias'])->name('inscripcionmateria.misMaterias');
    Route::delete('/baja/{materia}', [InscripcionMateriaController::class, 'baja'])->name('inscripcionmateria.baja');
    Route::get('/certificado/{id}', [InscripcionMateriaController::class, 'certificado'])->name('inscripcionmateria.certificado');
});

// ------------------------------------------------------
// 🧑‍🏫 ADMINISTRACIÓN DE INSCRIPCIONES A MATERIAS
// ------------------------------------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/inscripciones', [InscripcionMateriaController::class, 'adminIndex'])->name('admin.inscripciones.index');
    Route::put('/admin/inscripciones/{id}/estado', [InscripcionMateriaController::class, 'updateEstado'])->name('admin.inscripciones.updateEstado');
});

// ------------------------------------------------------
// 📘 CRUD DE MATERIAS
// ------------------------------------------------------
Route::resource('materias', MateriaController::class)->middleware('auth');

// ------------------------------------------------------
// 🧑‍🏫 ADMINISTRACIÓN GENERAL (solo admin)
// ------------------------------------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
    Route::get('/inscripciones/{id}', [InscripcionController::class, 'show'])->name('inscripciones.show');

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

// ------------------------------------------------------
// 🔄 AUTOGUARDADO DE MATRÍCULA
// ------------------------------------------------------
Route::post('/matriculacion/autosave', [AdmissionController::class, 'autosave'])
    ->middleware('auth')
    ->name('matriculacion.autosave');

// ------------------------------------------------------
// 🔑 AUTH (LOGIN / REGISTER / PASSWORD RESET)
// ------------------------------------------------------
require __DIR__ . '/auth.php';
