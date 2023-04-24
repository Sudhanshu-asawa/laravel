<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BookManager;

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

Route::middleware('Login')->group(function () {
    Route::get('/login', [AuthManager::class, 'login'])->name('login');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

    Route::get('/', [AuthManager::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthManager::class, 'signupPost'])->name('signup.post');
});

Route::middleware('secureBook')->group(function () {
    Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

    Route::get('/bookView', [BookManager::class, 'view'])->name('view');
    Route::post('/bookView',[BookManager::class,'search'])->name('search');

    Route::get('/bookCreate', [BookManager::class, 'create'])->name('create');
    Route::post('/bookCreate', [BookManager::class, 'createPost'])->name('createPost');

    Route::get('/bookUpdate/{book}', [BookManager::class, 'update'])->name('update');
    Route::put('/bookUpdate/{book}', [BookManager::class, 'updatePut'])->name('updatePut');

    Route::delete('/bookView/{book}', [BookManager::class, 'delete'])->name('BookDelete');
});
