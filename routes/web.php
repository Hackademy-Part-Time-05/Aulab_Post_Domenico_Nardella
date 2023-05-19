<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicController;                                                                                                                                              npm;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [App\Http\Controllers\ArticleController::class, 'byCategory'])->name('article.byCategory');


// CREAZIONE DEGLI ARTICOLI DA FARE.....