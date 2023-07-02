<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;

// User
Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/registrPage', [UserController::class, 'registrPage'])->name('registrPage');
Route::post('/userCreate', [UserController::class, 'userCreate'])->name('userCreate');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/home', [VariantController::class, 'home'])->name('home');
Route::get('/ratingAll', [TotalController::class, 'ratingAll'])->name('ratingAll');
Route::get('/ratingPage/{number}', [TotalController::class, 'ratingPage'])->name('ratingPage');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User doing test
Route::get('/start', [TestController::class, 'start'])->name('start');
Route::get('/startSelect', [TestController::class, 'startSelect'])->name('startSelect');
Route::get('/nextQuestion', [TestController::class, 'nextQuestion'])->name('nextQuestion');
Route::get('/previousQuestion', [TestController::class, 'previousQuestion'])->name('previousQuestion');
Route::get('/answerUser', [ResultController::class, 'answerUser'])->name('answerUser');
Route::get('/finishTest/{number}', [ResultController::class, 'finishTest'])->name('finishTest');
Route::get('/numberIncorrect', [NumberController::class, 'numberIncorrect'])->name('numberIncorrect');
Route::get('/ratingEndPage/{number}', [TotalController::class, 'ratingEndPage'])->name('ratingEndPage');

// Admin
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');
Route::get('/variantCreatePage', function () {
    return view('admin.variantCreatePage');
})->name('variantCreatePage');
Route::post('/variantCreate', [VariantController::class, 'variantCreate'])->name('variantCreate');
Route::get('/variantDeletePage', [VariantController::class, 'variantDeletePage'])->name('variantDeletePage');
Route::get('/variantDelete', [VariantController::class, 'variantDelete'])->name('variantDelete');
Route::get('/testCreatePage', [VariantController::class, 'testCreatePage'])->name('testCreatePage');
Route::post('/testCreate', [VariantController::class, 'testCreate'])->name('testCreate');
Route::get('/testDeletePage', [VariantController::class, 'testDeletePage'])->name('testDeletePage');
Route::get('/testGet', [VariantController::class, 'testGet'])->name('testGet');
Route::get('/testDelete', [VariantController::class, 'testDelete'])->name('testDelete');
Route::get('/userList', [UserController::class, 'userList'])->name('userList');
Route::get('/answerListPage', [TimeController::class, 'answerListPage'])->name('answerListPage');
Route::get('/answerList', [TimeController::class, 'answerList'])->name('answerList');
