<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

// Book
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BookController::class, 'read'])->name('books.book');

Route::get('/books/add', [BookController::class, 'add'])->name('books.add');
Route::post('/books/create', [BookController::class, 'create'])->name('books.create');

Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');

Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');

// Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show/{id}', [CategoryController::class, 'read'])->name('categories.category');

Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
Route::post('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');