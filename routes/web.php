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
    Route::get('/dashboard','DashboardController@index');
    Route::get('/Shop/add','ProductController@createImage')->name('products.add');
    Route::post('/Shop/storeImage','ProductController@storeImage')->name('products.storeImage');

    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
        'products' => ProductController::class,
        'images' => ImageController::class,
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


Route::get('/','HomeController@index')->name('home'); 

Route::prefix('')->namespace('Frontend')
                ->group(function() {
    Route::get('shop','ProductController@index')->name('frontend.product.shop');
    Route::get('/{slug}.html','ProductController@show')->name('frontend.product.show');
    Route::get('/carts','CartController@index')->name('frontend.carts.index');
    Route::get('/carts/add/{id}','CartController@add')->name('frontend.carts.add');
    Route::get('/carts/delete/{id}','CartController@delete')->name('frontend.carts.delete');
    Route::post('/carts/update','CartController@update')->name('frontend.carts.update');
    Route::get('checkout','CheckOutController@index')->name('frontend.checkout.index');
    Route::get('/destroy','CartController@destroy')->name('frontend.carts.destroy');
    Route::get('/blog','ProductController@blog')->name('frontend.posts.index');
    Route::get('blog/detail/{id}','ProductController@detail')->name('frontend.blogs.index');

});





