<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


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
Route::get('/startSelect/{a}',[TestController::class,'startSelect'])->name('startSelect');
Route::get('/nextQuestion',[TestController::class,'nextQuestion'])->name('nextQuestion');
Route::get('/previousQuestion',[TestController::class,'previousQuestion'])->name('previousQuestion');

Route::get('/registrPage',[UserController::class,'registrPage'])->name('registrPage');
Route::post('/userCreate',[UserController::class,'userCreate'])->name('userCreate');




