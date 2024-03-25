<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileHandlerController;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', [TransactionsController::class, 'index'])->name('transactions.index');

Route::post('/', [FileHandlerController::class, 'handleFileUpload'])->name('handle.file.upload');
