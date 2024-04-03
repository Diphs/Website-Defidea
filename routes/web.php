<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('admin/form_artikel');
});

Route::get('/home', [IndexController::class, 'index']);
Route::get('/home/{id_artikel}', [IndexController::class, 'show'])->name('home.detail');
Route::post('home/{id_artikel}/comment', [IndexController::class, 'storeComment'])->name('home.store_comment');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
Route::delete('/artikel/{id_artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/form-artikel/edit/{id_artikel}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/form-artikel/edit/{id_artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
