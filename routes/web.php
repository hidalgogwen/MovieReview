<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ReviewController;

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

Auth::routes();

//visitor
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/all-movies', [App\Http\Controllers\Frontend\AllMoviesController::class, 'index']);
Route::get('/view-movie/{movie_id}', [App\Http\Controllers\Frontend\AllMoviesController::class, 'view']);
Route::get('/about-us', [App\Http\Controllers\Frontend\FrontendController::class, 'about']);

//visitor and user
Route::get('/search', [App\Http\Controllers\Frontend\AllMoviesController::class, 'search']);
Route::get('/fetch', [App\Http\Controllers\Frontend\AllMoviesController::class, 'fetch']);

//user
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index']);
Route::get('/user/all-movies', [App\Http\Controllers\User\UserMoviesController::class, 'index']);
Route::get('/user/view-movie/{movie_id}', [App\Http\Controllers\User\UserMoviesController::class, 'view']);
Route::resource('user/view-movie.review', ReviewController::class)->shallow();
Route::get('/user/about-us', [App\Http\Controllers\User\HomeController::class, 'about']);

//admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

	Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
	Route::get('/movie', [App\Http\Controllers\Admin\MovieController::class, 'index']);
	Route::get('/add-movie', [App\Http\Controllers\Admin\MovieController::class, 'create']);
	Route::post('/add-movie', [App\Http\Controllers\Admin\MovieController::class, 'store']);
	Route::get('/edit-movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'edit']);
	Route::put('/update-movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'update']);
	Route::get('/delete-movie/{movie_id}', [App\Http\Controllers\Admin\MovieController::class, 'destroy']);
	Route::get('/review', [App\Http\Controllers\Admin\AdReviewController::class, 'index']);
});