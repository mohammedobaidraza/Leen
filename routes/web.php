<?php

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

//Route::get('/', function () {
//    return view('index');
//})->name('index_p');
Route::get('/', [App\Http\Controllers\beforeLogInController::class, 'index'])->name('index_p');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile',[App\Http\Controllers\UserProfileController::class,'profile_home'])->name('profile');
Route::get('/profile_update',[App\Http\Controllers\UserProfileController::class,'edit_get'])->name('profile_update');
Route::post('/profile',[App\Http\Controllers\UserProfileController::class,'update'])->name('user_update');
Route::get('/post_add',[App\Http\Controllers\PostController::class,'post_page'])->name('add_post');
Route::post('/post_create',[App\Http\Controllers\PostController::class,'create_post'])->name('create_post');
Route::get('/view_post/{id}',[App\Http\Controllers\PostController::class,'view_post'])->name('view_post')->middleware('auth');
//Route::get('/show_post/{id}', [PostController::class, 'show'])->name('showPost');
Route::post('/posts/{post}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments_store');


Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'post_by_category'])->name('category_id');

Route::post('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'likePost'])->name('likes.like');
Route::delete('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'unlikePost'])->name('likes.unlike');


Route::middleware(['preventRoleAccess'])->group(function () {
    // Place the routes that need protection here
    Route::get('/home2',[App\Http\Controllers\HomeController::class,'getPopularPosts'])->name('home2');

});
