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
// Route::prefix('/')->name('/')->namespace('')->middleware([])->group(function() {
//     // return 'minh';
//     Route::get('frontend', function () {
//         return view('home');
//     }) ->name('frontend.home.index');
// });
// Route::get('/','HomeController@index');
Route::prefix('backend')->name('backend.')->namespace('Backend')->middleware('auth','role:admin,admod,writer')->group(function() {
    Route::get('dashboard','DashboardController@index');
    Route::get('Storage','StorageController@index')->name('Storage.index');
    Route::post('Storage/destroy','StorageController@destroy')->name('Storage.destroy');
    // Route::get('home',HomeController::class , 'index' );
    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
        // 'storage' => StorageController::class,
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
Route::prefix('/')->name('auth.')->namespace('Auth')->group(function() {
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
// Route::prefix('auth')->name('auth.')->namespace('Auth')->group(function(){
//     Route::get('/register', 'RegisterUserController@create' )->name('register')->middleware('guest');
//     Route::post('/register', 'RegisterUserController@store' )->middleware('guest');
//     Route::get('/login', 'LoginController@create' )->name('login')->middleware('guest');
//     Route::post('/login', 'LoginController@authenticate' )->name('login')->middleware('guest');
//     Route::post('/logout', 'LoginController@logout' )->name('logout');
//   });






