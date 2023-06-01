<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/gre',[UserController::class,'create'])->name('gre');

Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/create', function () {
    return view('admin.createSubject');
});

Route::post('/create',[TestController::class,'create'])->name('create');
Route::get('/start/{id}',[TestController::class,'start'])->name('start');

