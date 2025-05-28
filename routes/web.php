<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    // Route::get('/posts', function () {
    //     return view('admin.posts.index');
    // })->name('admin.posts.index');

    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    //  Route::resources([
    //     'posts' => PostController::class,
    // ]);
    
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\HomeController::class, 'post'])->name('home.post');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');