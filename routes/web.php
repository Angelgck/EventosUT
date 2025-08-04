<?php
 
use App\Livewire\MisRegistros;
use App\Livewire\PerfilEstudiante;
use App\Livewire\Dashboard;
use App\Models\Evento;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/mis-registros', MisRegistros::class)->middleware(['auth', 'verified'])->name('mis-registros');

Route::get('/mi-perfil', PerfilEstudiante::class)->middleware(['auth', 'verified'])->name('mi-perfil');

Route::get('/dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ↓↓↓ AÑADE ESTA RUTA ↓↓↓
Route::get('/historial-estudiantes', [App\Http\Controllers\AdminController::class, 'historialEstudiantes'])
    ->middleware(['auth', 'admin']) // Usaremos un middleware 'admin' que crearemos después
    ->name('admin.historial');

// RUTA AÑADIDA PARA GESTIONAR EVENTOS
Route::get('gestionar-eventos', \App\Livewire\GestionarEventos::class)
    ->middleware(['auth', 'verified','can:isAdmin'])
    ->name('gestionar.eventos');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';