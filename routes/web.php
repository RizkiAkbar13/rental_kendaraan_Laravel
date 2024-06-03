<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreorderController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'showLoginForm'])->middleware('guest');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register']);
Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('transaksi/detail', [TransaksiController::class, 'detailTransaction'])->name('transaksi.detail');
    Route::post('transaksi/process', [TransaksiController::class, 'processTransaction'])->name('transaksi.process');
    Route::get('transaksi/history', [TransaksiController::class, 'transactionHistory'])->name('transaksi.history');
    Route::get('payment', [TransaksiController::class, 'payment'])->name('payment');
    Route::post('payment/proses', [TransaksiController::class, 'processPayment'])->name('payment.proses');

    Route::get('/pre-order', [PreOrderController::class, 'index'])->name('pre-order');
    Route::get('/pre-order/create', [PreOrderController::class, 'create'])->name('pre-order.create');
    Route::post('/pre-order', [PreOrderController::class, 'store'])->name('pre-order.store');
    Route::get('/pre-order/{id}/edit', [PreOrderController::class, 'edit'])->name('pre-order.edit');
    Route::post('/pre-order/{id}', [PreOrderController::class, 'update'])->name('pre-order.update');
    Route::delete('/pre-order/{id}', [PreOrderController::class, 'destroy'])->name('pre-order.destroy');
    Route::get('/pre-order/export', [PreOrderController::class, 'export']);
});
