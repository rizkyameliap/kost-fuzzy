<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

// Authentication Routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Kost Management
    Route::prefix('kosts')->name('kosts.')->group(function () {
        Route::get('/', [AdminController::class, 'kosts'])->name('index');
        Route::get('/create', [AdminController::class, 'createKost'])->name('create');
        Route::post('/', [AdminController::class, 'storeKost'])->name('store');
        Route::get('/{kost}/edit', [AdminController::class, 'editKost'])->name('edit');
        Route::put('/{kost}', [AdminController::class, 'updateKost'])->name('update');
        Route::delete('/{kost}', [AdminController::class, 'destroyKost'])->name('destroy');
    });

    // Criteria Management
    Route::prefix('criteria')->name('criteria.')->group(function () {
        Route::get('/', [AdminController::class, 'criteria'])->name('index');
        Route::put('/', [AdminController::class, 'updateCriteria'])->name('update');
    });

    // SAW Calculation
    Route::prefix('saw')->name('results.')->group(function () {
        Route::post('/calculate-saw', [AdminController::class, 'calculateSaw'])->name('calculate');
        Route::get('/results', [AdminController::class, 'results'])->name('index');
        Route::get('/graphic', [AdminController::class, 'graphic'])->name('graphic');
    });
});

// Mahasiswa Routes
Route::middleware(['auth', 'mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/recommendations', [MahasiswaController::class, 'recommendations'])->name('recommendations');
});
