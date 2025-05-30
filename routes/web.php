<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

Route::controller(HomeController::class)->group(function(){

    Route::get('/', 'index')->name('home');
    Route::get('/post/{post:slug}', 'post')->name('home.post');
    Route::get('/about', 'about')->name('home.about');
    Route::get('/contact', 'contact')->name('home.contact');

});


