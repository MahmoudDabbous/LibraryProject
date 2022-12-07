<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
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

Route::middleware('lang')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    // Book
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/show/{id}', [BookController::class, 'read'])->name('books.book');

    // Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/show/{id}', [CategoryController::class, 'read'])->name('categories.category');

    //Guests Only
    Route::middleware('is.guest')->group(function () {
        Route::get('/register', [AuthController::class, 'register'])->name('Auth.register');
        Route::post('/handle/register',[AuthController::class,'handleRegister'])->name('Auth.register.handle');

        Route::get('/login', [AuthController::class, 'login'])->name('Auth.login');
        Route::post('/handle/login', [AuthController::class, 'handleLogin'])->name('Auth.login.handle');
    });

    //Admin Only
    Route::middleware('is.admin')->group(function () {

        Route::get('/logout', [AuthController::class, 'logout'])->name('Auth.logout');

        //Books
        Route::get('/books/add', [BookController::class, 'add'])->name('books.add');
        Route::post('/books/create', [BookController::class, 'create'])->name('books.create');

        Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
        Route::post('/books/update/{book}', [BookController::class, 'update'])->name('books.update');

        Route::get('/books/delete/{book}', [BookController::class, 'delete'])->name('books.delete');

        //Categories
        Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
        Route::post('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

        Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('categories.update');

        Route::get('/category/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');

    });
});

Route::get('/lang/en', [LangController::class, 'en'])->name('lang.en');
Route::get('/lang/ar', [LangController::class, 'ar'])->name('lang.ar');
