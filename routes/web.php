<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/auth',[AuthController::class,'auth'])->name('auth');
Route::get('/registrPage',[UserController::class,'registrPage'])->name('registrPage');


Route::get('/a', function () {return view('a');});
Route::get('/b',[TestController::class,'b'])->name('b');


Route::get('/test', function () {return view('test');});

// Admin
Route::get('/admin', function () {return view('admin.admin');})->name('admin');
Route::get('/testCreatePage',[TestController::class,'testCreatePage'])->name('testCreatePage');
Route::get('/variantCreatePage', function () {return view('admin.variantCreatePage');})->name('variantCreatePage');
Route::post('/testCreate',[TestController::class,'testCreate'])->name('testCreate');
Route::post('/variantCreate',[VariantController::class,'variantCreate'])->name('variantCreate');
//

// User
Route::get('/start',[TestController::class,'start'])->name('start');
Route::get('/startSelect/{a}',[TestController::class,'startSelect'])->name('startSelect');
Route::get('/nextQuestion',[TestController::class,'nextQuestion'])->name('nextQuestion');
Route::get('/previousQuestion',[TestController::class,'previousQuestion'])->name('previousQuestion');

Route::post('/userCreate',[UserController::class,'userCreate'])->name('userCreate');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');


// Route::group(['middleware' => ["auth:web"]], function () {
//     Route::get('/', function () { return view('layouts.welcome'); })->name('welcome');
//     Route::get('list',[ProjectController::class,'list'])->name('list');
//     Route::get('create',[ProjectController::class,'createPage'])->name('createPage')->middleware('isAdmin:web');
//     Route::post('create',[ProjectController::class,'create'])->name('create')->middleware('isAdmin:web');
//     Route::get('delete/{id}',[ProjectController::class,'delete'])->name('delete')->middleware('isAdmin:web');

//     Route::post('answer',[AnswerController::class,'answer'])->name('answer');
//     Route::get('result',[AnswerController::class,'result'])->name('result');
//     Route::get('score',[AnswerController::class,'score'])->name('score');


//     Route::get('/logout',[AuthController::class,'logout'])->name('logout');
//  });


