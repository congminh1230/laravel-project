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

Route::resource('customers','CustomerController');
Route::get('/datatables','DatatablesController@index');
Route::get('/datatables/data','DatatablesController@anyData')->name('datatables.data');

Route::prefix('backend')->name('backend.')->namespace('Backend')->middleware('auth','role:admin,admod,writer')->group(function() {
    // Route::get('dashboard','DashboardController@anyData');
    Route::get('/dashboard','DashboardController@index');
    // Route::get('Storage','StorageController@index')->name('Storage.index');
    // Route::post('Storage/destroy','StorageController@destroy')->name('Storage.destroy');
    // Route::get('home',HomeController::class , 'index' );
    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
    ]);
    Route::resource('posts',PostController::class)
    ->except([
        'update'
    ]);
    Route::resource('categories',CategoryControler::class);
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

// frontend
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::get('/','HomeController@index'); 

Route::name('frontend.')->namespace('Frontend')->middleware([])->group(function() {
    Route::get('home', function () {
        return view('frontend.home.index');
    }) ->name('home.index');
    Route::get('posts','PostController@index'); 
    Route::get('/{slug}.html','ProductController@show')->name('product.show'); 
   
});





