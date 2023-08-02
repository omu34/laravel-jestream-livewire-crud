<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Livewire\Posts\Index;
use App\Http\Livewire\Posts\Create;
use App\Http\Livewire\Posts\Edit;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/posts', function () {return view('posts.index');})->name('index');
    Route::get('/posts', Index::class)->name('posts.index');
    Route::get('/posts/create', Create::class)->name('posts.create');
    Route::get('/posts/{post}/edit', Edit::class)->name('posts.edit');
});
