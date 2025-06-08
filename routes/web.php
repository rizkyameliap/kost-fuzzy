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
    Route::get('/kosts', [AdminController::class, 'kosts'])->name('kosts');
    Route::get('/kosts/create', [AdminController::class, 'createKost'])->name('kosts.create');
    Route::post('/kosts', [AdminController::class, 'storeKost'])->name('kosts.store');
    Route::get('/kosts/{kost}/edit', [AdminController::class, 'editKost'])->name('kosts.edit');
    Route::put('/kosts/{kost}', [AdminController::class, 'updateKost'])->name('kosts.update');
    Route::delete('/kosts/{kost}', [AdminController::class, 'destroyKost'])->name('kosts.destroy');
    
    // Criteria Management
    Route::get('/criteria', [AdminController::class, 'criteria'])->name('criteria');
    Route::put('/criteria', [AdminController::class, 'updateCriteria'])->name('criteria.update');
    
    // SAW Calculation
    Route::post('/calculate-saw', [AdminController::class, 'calculateSaw'])->name('calculate.saw');
    Route::get('/results', [AdminController::class, 'results'])->name('results');
});

// Mahasiswa Routes
Route::middleware(['auth', 'mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/recommendations', [MahasiswaController::class, 'recommendations'])->name('recommendations');
});