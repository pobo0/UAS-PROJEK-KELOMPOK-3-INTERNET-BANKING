<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\MutationController;

Route::get('/customer-service', function () {
    return view('customerService');
});

Route::get('/', [MainController::class, 'index'])->name('main');
Route::post('/login', [MainController::class, 'login_proses'])->name('login');

// Memperbaiki penulisan route yang tidak benar
Route::get('/create-account', [CreateAccountController::class, 'index'])->name('accounts');
Route::post('/create-account', [CreateAccountController::class, 'store'])->name('accounts.store');

Route::get('/syarat-ketentuan', function () {
    return view('syaratKetentuan');
});

Route::get('/{id}/home', [HomeController::class, 'index'])->name('home');

Route::get('/{id}/transfer', [TransferController::class, 'index'])->name('transfer');

Route::get('/{id}/mutation', [MutationController::class, 'index'])->name('mutation');



