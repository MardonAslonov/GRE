<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

// Route::get('test1', function () {
//     return view('test');
// });

// Route::get('/gre', function () {
//     return view('gre');
// });

// Route::get('/gre1',[UserController::class,'create'])->name('gre1');

