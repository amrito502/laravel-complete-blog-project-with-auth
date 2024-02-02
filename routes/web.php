<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

// ==============================================frontend-user=============================================================
// ========================================================================================================================

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendController::class,'frontend_index'])->name('frontend.home');
Route::get('category/{category_slug}',[FrontendController::class,'view_category_post'])->name('view.category.post');
Route::get('postnewitem/{category_slug}/{post_slug}',[FrontendController::class,'view_post'])->name('view.post');


// ==============================================admin=====================================================================
// ========================================================================================================================
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // category
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/add/category',[CategoryController::class,'add_category'])->name('add.category');
    Route::post('/store/category',[CategoryController::class,'store_category'])->name('store.category');
    Route::get('/edit/category/{id}',[CategoryController::class,'edit_category'])->name('edit.category');
    Route::post('/update/category{id}',[CategoryController::class,'update_category'])->name('update.category');
    Route::get('/delete/category{id}',[CategoryController::class,'delete_category'])->name('delete.category');


    // posts
    Route::get('/posts',[PostController::class,'posts'])->name('posts');
    Route::get('/add/posts',[PostController::class,'add_posts'])->name('add.posts');
    Route::post('/store/posts',[PostController::class,'store_posts'])->name('store.posts');
    Route::get('/edit/posts/{id}',[PostController::class,'edit_posts'])->name('edit.posts');
    Route::post('/update/posts/{id}',[PostController::class,'update_posts'])->name('update.posts');
    Route::get('/delete/posts/{id}',[PostController::class,'delete_posts'])->name('delete.posts');


    // user-fetch
    Route::get('/users',[UserController::class,'fetch_users_date'])->name('fetch.user');
    Route::get('/edit/users/{id}',[UserController::class,'edit_fetch_users_date'])->name('edit.fetch.user');
    Route::post('/update/users/{id}',[UserController::class,'update_fetch_users_data'])->name('update.fetch.user');




});



