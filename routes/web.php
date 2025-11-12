<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal (redirect ke login)
Route::get('/', function () {
    return redirect('/login');
});

// 🔹 Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Admin Routes
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // CRUD Buku, Kategori, dan Peminjaman
    Route::resource('/books', BookController::class);
    Route::resource('/categories', CategoryController::class)->except(['show']);
    Route::resource('/borrows', BorrowController::class)->only(['index', 'destroy']);
});

// 🔹 Siswa Routes
Route::middleware(['siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');

    // Aksi siswa
    Route::get('/books', [BookController::class, 'studentIndex'])->name('books.index');
    Route::post('/borrow/{book}', [BorrowController::class, 'borrow'])->name('borrow');
    Route::post('/return/{borrow}', [BorrowController::class, 'returnBook'])->name('return');
    Route::get('/borrows', [BorrowController::class, 'myBorrows'])->name('borrows');
});
