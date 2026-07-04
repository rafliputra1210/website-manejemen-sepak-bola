<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AthleteController;

// Rute Modul Landing Page (Publik)
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landing.home');
    Route::get('/profil-coach', 'coaches')->name('landing.coaches');
    Route::get('/jadwal-latihan', 'schedule')->name('landing.schedule');
    Route::get('/prestasi', 'achievements')->name('landing.achievements');
    Route::get('/galeri', 'gallery')->name('landing.gallery');
    Route::get('/pendaftaran', 'registration')->name('landing.registration');
});
// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTE MODUL 3: PANEL ADMIN (Backend) ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Sementara kita arahkan ke file view sederhana
    })->name('dashboard');
});

// --- RUTE MODUL 4: PORTAL WALI MURID (Frontend User) ---
Route::middleware(['auth', 'role:wali_murid'])->prefix('portal-wali')->name('wali.')->group(function () {
    Route::get('/dashboard', function () {
        return view('wali.dashboard'); // Sementara kita arahkan ke file view sederhana
    })->name('dashboard');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route CRUD Data Atlet (Murid)
    Route::resource('/athletes', AthleteController::class);
});