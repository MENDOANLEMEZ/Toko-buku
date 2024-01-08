<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/buku',[BukuController::class,'index']);
    Route::get('/buku/create',[BukuController::class,'create']);
    Route::post('/buku/store',[BukuController::class,'store']);
    Route::get('/buku/{id_buku}/edit',[BukuController::class,'edit']);
    Route::put('/buku/{id_buku}',[BukuController::class,'update']);
    Route::delete('/buku/{id_buku}',[BukuController::class,'destroy']);
    
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('store');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('destroy');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
