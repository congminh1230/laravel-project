<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

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
Route::get('/','HomeController@index');

Route::prefix('backend')->name('backend.')->namespace('Backend')->middleware('auth')->group(function() {
    Route::get('dashboard','DashboardController@index');
    // Route::get('home',HomeController::class , 'index' );
    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    // Route::get('login', function () {
    //     return view('backend.login.login');
    // }) ->name('login.login');
    // Route::get('register', function () {
    //     return view('backend.register.register');
    // }) ->name('register.register');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
    ]);
});
Route::prefix('frontend')->name('auth')->namespace('auth')->middleware([])->group(function() {
    Route::get('home', function () {
        return view('frontend.home.index');
}) ->name('home.index');
Route::get('posts', function () {
    return view('frontend.posts.index');
}) ->name('posts.index');
});
Route::prefix('/')->name('auth.')->namespace('auth')->group(function() {
    Route::get('/register', 'RegisteredUserController@create')
    ->middleware('guest')
    ->name('register');
    Route::post('/register', 'RegisteredUserController@store')
    ->middleware('guest')
    ->name('register');
    Route::get('/login', 'LoginController@create')
    ->middleware('guest')
    ->name('login');
    Route::post('/login', 'LoginController@authenticate')
    ->middleware('guest')
    ->name('login');
    Route::post('/logout', 'LoginController@logout')
    ->name('logout');


});




