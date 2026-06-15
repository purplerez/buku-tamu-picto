<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [GuestbookController::class, 'index'])->name('guestbook.index');
Route::post('/', [GuestbookController::class, 'store'])->name('guestbook.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/detail/{date}', [AdminController::class, 'detail'])->name('admin.detail');
    Route::get('/export-pdf/{date}', [AdminController::class, 'exportPdf'])->name('admin.exportPdf');
});
