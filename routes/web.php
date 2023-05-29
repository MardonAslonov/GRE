<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/gre',[UserController::class,'create'])->name('gre');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/test', function () {
    return view('test');
});
