<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileHandlerController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\BucketsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/register', function () {
    return view('newaccount');
})->name('register');

Route::get('/login', function () {
    return view('welcome');
})->name('login');


Route::get('/dashboard', [AuthController::class, 'index'])->name('auth.dashboard');

//chenge user verification request 
Route::post('/update-verification/{userId}', [AuthController::class, 'updateVerification'])->name('updateVerification');


// this is the start of client routes
Route::get('/client', [TransactionsController::class, 'index'])->name('client.index');
Route::get('client/create', [TransactionsController::class, 'create'])->name('client.create');
Route::post('client/store', [TransactionsController::class, 'store'])->name('client.store');
Route::get('client/show/{id}', [TransactionsController::class, 'show'])->name('client.show');
Route::get('client/edit/{id}', [TransactionsController::class, 'edit'])->name('client.edit');
Route::put('client/update/{id}', [TransactionsController::class, 'update'])->name('client.update');
Route::get('client/destroy/{id}', [TransactionsController::class, 'destroy'])->name('client.destroy');
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::get('/auth/controls', [AuthController::class, 'index'])->name('auth.controls');
Route::post('/controls', [FileHandlerController::class, 'handleFileUpload'])->name('handle.file.upload');





Route::post('/client', [FileHandlerController::class, 'handleFileUpload'])->name('handle.file.upload');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// this is the start of the buckets routes for admin user
Route::get('/buckets', [BucketsController::class, 'index'])->name('buckets.index');
Route::get('/buckets/create', [BucketsController::class, 'create'])->name('buckets.create');
Route::post('/buckets', [BucketsController::class, 'store'])->name('buckets.store');
Route::get('/buckets/{id}', [BucketsController::class, 'show'])->name('buckets.show');
Route::get('/buckets/edit/{id}', [BucketsController::class, 'edit'])->name('buckets.edit');
Route::put('/buckets/{id}', [BucketsController::class, 'update'])->name('buckets.update');
Route::delete('/buckets/{id}', [BucketsController::class, 'destroy'])->name('buckets.destroy');
