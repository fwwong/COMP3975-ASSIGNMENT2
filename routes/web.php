<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileHandlerController;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', [TransactionsController::class, 'index'])->name('client.index');
Route::get('client/create', [TransactionsController::class, 'create'])->name('client.create');
Route::post('transactions/store', [TransactionsController::class, 'store'])->name('client.store');
Route::get('client/show/{id}', [TransactionsController::class, 'show'])->name('client.show');
Route::get('client/edit/{id}', [TransactionsController::class, 'edit'])->name('client.edit');
Route::put('client/update', [TransactionsController::class, 'update'])->name('client.update');
Route::get('client/destroy/{id}', [TransactionsController::class, 'destroy'])->name('client.destroy');

Route::post('/client', [FileHandlerController::class, 'handleFileUpload'])->name('handle.file.upload');
