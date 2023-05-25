<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
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

Route::middleware('writer')->group(function(){
    Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
});

Route::get('/article/index', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [App\Http\Controllers\ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/editor/{editor}', [App\Http\Controllers\ArticleController::class, 'editor'])->name('article.editor');
Route::get('/careers', [App\Http\Controllers\PublicController::class, 'careers'])->name('careers');
Route::get('/careers/submit', [App\Http\Controllers\PublicController::class, 'careersSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
}); 
Route::middleware('admin')->group(function(){
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
}); 
Route::middleware('admin')->group(function(){
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
}); 
Route::middleware('admin')->group(function(){
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
}); 
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
}); 
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
}); 
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
}); 
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
}); 
Route::get('/article/search', [App\Http\Controllers\ArticleController::class, 'articleSearch'])->name('article.search');
Route::middleware('admin')->group(function(){
    Route::put('/admin/edit/{tag}/tag', [App\Http\Controllers\AdminController::class, 'editTag'])->name('admin.editTag');
});
Route::middleware('admin')->group(function(){
    Route::put('/admin/delete/{tag}/tag', [App\Http\Controllers\AdminController::class, 'deleteTag'])->name('admin.deleteTag');
});

// REVISOR DASHBOARD SONO QUI 