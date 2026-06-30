<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemainOlahragaController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/experience', function () {
    return view('experience');
})->name('experience');

Route::get('/projects', [PemainOlahragaController::class, 'publicIndex'])->name('projects');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Guest / Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected admin panel (CRUD) routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [PemainOlahragaController::class, 'index'])->name('index');
    Route::get('/create', [PemainOlahragaController::class, 'create'])->name('create');
    Route::post('/store', [PemainOlahragaController::class, 'store'])->name('store');
    Route::get('/{id_event}/edit', [PemainOlahragaController::class, 'edit'])->name('edit');
    Route::put('/{id_event}', [PemainOlahragaController::class, 'update'])->name('update');
    Route::delete('/{id_event}', [PemainOlahragaController::class, 'destroy'])->name('destroy');
});

// PDF route tanpa middleware agar tidak terjadi session lock blocking
// pada PHP built-in server (artisan serve) yang single-threaded
Route::get('/admin/pdf', [PemainOlahragaController::class, 'exportPdf'])->name('admin.pdf');

