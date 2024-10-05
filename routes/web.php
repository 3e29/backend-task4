<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('authors', AuthorController::class);
Route::post('authors/{id}/restore', [AuthorController::class, 'restore'])->name('authors.restore');
Route::delete('authors/{id}/forceDelete', [AuthorController::class, 'forceDelete'])->name('authors.forceDelete');


Route::resource('categories', CategoryController::class);
Route::post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('categories/{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');


Route::resource('books', BookController::class);
Route::post('books/{id}/restore', [BookController::class, 'restore'])->name('books.restore');
Route::delete('books/{id}/forceDelete', [BookController::class, 'forceDelete'])->name('books.forceDelete');
