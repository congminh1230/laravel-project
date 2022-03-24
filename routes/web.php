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
Route::get('/', function () {
    return view('frontend.home.index');
}) ->name('home.index');
Route::prefix('/')->name('/')->namespace('')->middleware([])->group(function() {
    Route::get('home', function () {
        return view('frontend.home.index');
}) ->name('frontend.home.index');
});
// Route::get('/','HomeController@index');
Route::prefix('backend')->name('backend.')->namespace('Backend')->middleware('auth','role:admin,admod')->group(function() {
    Route::get('dashboard','DashboardController@index');
    // Route::get('home',HomeController::class , 'index' );
    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
    ]);
    // post
    // Route::put('post/{post}', 'UserController@update')
    // ->middleware('can:update,post')
    // ->name('posts.update');
    Route::resource('posts',PostController::class)
    ->except([
        'update'
    ]);
    Route::resource('categories',CategoryControler::class);
});
Route::prefix('frontend')->name('frontend.')->namespace('frontend')->middleware([])->group(function() {
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






