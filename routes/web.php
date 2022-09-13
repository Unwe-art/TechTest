<?php

use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'getAllPostsAction'])->name('dashboard');


    Route::get('/createPost', function () {
        return view('createPost');
    })->name('createPost');
    Route::post('/addPost', [PostController::class, 'addPostAction'])->name('addPost');

    Route::post('/editPost', function () {
        return view('editPost');
    })->name('editPost');
    Route::get('/post/{post_id}', [PostController::class, 'getPostByIdAction'])->name('getPostById');

    Route::post('/updatePost', [PostController::class, 'updatePostAction'])->name('updatePost');
    Route::delete('/deletePost', [PostController::class, 'deletePostAction'])->name('deletePost');
});
