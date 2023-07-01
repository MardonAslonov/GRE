<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/registrPage', [UserController::class, 'registrPage'])->name('registrPage');

Route::get('/home', [VariantController::class, 'home'])->name('home');

// Admin
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');

Route::get('/testCreatePage', [VariantController::class, 'testCreatePage'])->name('testCreatePage');
Route::get('/testDeletePage', [VariantController::class, 'testDeletePage'])->name('testDeletePage');
Route::get('/testGet', [VariantController::class, 'testGet'])->name('testGet');
Route::get('/testDelete', [VariantController::class, 'testDelete'])->name('testDelete');
Route::post('/variantCreate', [VariantController::class, 'variantCreate'])->name('variantCreate');
Route::get('/variantDeletePage', [VariantController::class, 'variantDeletePage'])->name('variantDeletePage');
Route::get('/variantDelete', [VariantController::class, 'variantDelete'])->name('variantDelete');




Route::get('/variantCreatePage', function () {
    return view('admin.variantCreatePage');
})->name('variantCreatePage');
Route::post('/testCreate', [VariantController::class, 'testCreate'])->name('testCreate');
//

// User
Route::get('/start', [TestController::class, 'start'])->name('start');
Route::get('/startSelect', [TestController::class, 'startSelect'])->name('startSelect');
Route::get('/nextQuestion', [TestController::class, 'nextQuestion'])->name('nextQuestion');
Route::get('/previousQuestion', [TestController::class, 'previousQuestion'])->name('previousQuestion');
Route::get('/answerUser', [ResultController::class, 'answerUser'])->name('answerUser');
Route::get('/finishTest/{number}', [ResultController::class, 'finishTest'])->name('finishTest');




Route::post('/userCreate', [UserController::class, 'userCreate'])->name('userCreate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/ratingPage/{number}', [TotalController::class, 'ratingPage'])->name('ratingPage');
Route::get('/ratingEndPage/{number}', [TotalController::class, 'ratingEndPage'])->name('ratingEndPage');


Route::get('/numberIncorrect', [NumberController::class, 'numberIncorrect'])->name('numberIncorrect');



Route::get('/ratingAll', [TotalController::class, 'ratingAll'])->name('ratingAll');

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
