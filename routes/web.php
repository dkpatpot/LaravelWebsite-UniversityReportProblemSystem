<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImageController;

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
    return redirect()->route('posts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/posts/{post}/comments/store', [\App\Http\Controllers\PostController::class, 'storeComment'])
    ->name('posts.comments.store');

Route::post('/posts/{post}/reports/store', [\App\Http\Controllers\PostController::class, 'storeReport'])
    ->name('posts.reports.store');

Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::resource('/tags', \App\Http\Controllers\TagController::class);

Route::get('/sorted', [\App\Http\Controllers\PostController::class, 'sorted'])
    ->name('posts.sorted');

Route::get('/incognito', [\App\Http\Controllers\PostController::class, 'incognito'])
    ->name('posts.incognito');

Route::post('/gueststore', [\App\Http\Controllers\PostController::class, 'gueststore'])
    ->name('posts.gueststore');

Route::get('/summarize', [\App\Http\Controllers\PostController::class, 'summarize'])
    ->name('posts.summarize');

Route::get('/piesummarize', [\App\Http\Controllers\PostController::class, 'piesummarize'])
    ->name('posts.piesummarize');

Route::get('upload-image', [\App\Http\Controllers\UploadImageController::class, 'index']);
Route::post('save', [\App\Http\Controllers\UploadImageController::class, 'save']);

Route::post('/posts/{post}', [\App\Http\Controllers\PostController::class, 'likePost'])
    ->name('like.post');

Route::get('/search', [\App\Http\Controllers\PostController::class, 'search'])
    ->name('posts.search');
