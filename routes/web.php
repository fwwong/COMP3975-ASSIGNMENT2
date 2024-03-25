<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileHandlerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', function () {
    return view('client.client');
});

Route::post('/', [FileHandlerController::class, 'handleFileUpload'])->name('handle.file.upload');
