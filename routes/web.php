<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Laravel\Socialite\Facades\Socialite;
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
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/Shop/add','ProductController@createImage')->name('products.add');
    Route::post('/Shop/storeImage','ProductController@storeImage')->name('products.storeImage');
    Route::get('order','OrderController@index')->name('orders.index');
    Route::post('order/updateStatus/{id}','OrderController@updateStatus')->name('orders.updateStatus');
    Route::post('logo','LogoController@index')->name('logo.index');
    Route::put('user/info/{id}','UserController@updateAvatar')->name('users.updateAvatar');

    Route::get('home', function () {
        return view('home.index');
    }) ->name('home.index');
    Route::resources([
        'posts' => PostController::class,
        'users' => UserController::class,
        'categories' => CategoryControler::class,
        'products' => ProductController::class,
        'images' => ImageController::class,
        'logo' => LogoController::class,
    ]);
    Route::resource('posts',PostController::class)
    ->except([
        'update'
    ]);
    Route::resource('categories',CategoryControler::class);
});
// auth
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

Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);





// frontend
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::get('/','HomeController@index')->name('home'); 

Route::prefix('')->namespace('Frontend')
                ->group(function() {
    Route::get('shop','ProductController@index')->name('frontend.product.shop');
    Route::get('shop/list','ProductController@searchProduct')->name('frontend.product.search');
    Route::get('shop/{id}/{name}.hmtl','ProductController@searchCategory')->name('frontend.product.searchCategory');
    Route::get('/{slug}.html','ProductController@show')->name('frontend.product.show');
    Route::get('/carts','CartController@index')->name('frontend.carts.index');
    Route::get('/carts/add/{id}','CartController@add')->name('frontend.carts.add');
    Route::get('/carts/delete/{id}','CartController@delete')->name('frontend.carts.delete');
    Route::post('/carts/update','CartController@update')->name('frontend.carts.update');
    Route::get('checkout','OrderController@index')->name('frontend.checkout.index');
    Route::get('/destroy','CartController@destroy')->name('frontend.carts.destroy');
    Route::get('/blog','PostController@index')->name('frontend.posts.index');
    Route::get('blog/detail/{id}','PostController@show')->name('frontend.blogs.detail');
    // Route::post('order','OrderController@index')->name('frontend.order.index');
    Route::post('order/add','OrderController@add')->name('frontend.order.add');
    Route::get('order/listOrder','OrderController@listOrder')->name('frontend.order.index');
    Route::get('order/destroy/{id}','OrderController@destroy')->name('frontend.order.destroy');
    Route::get('blog/searchPosts','PostController@searchPosts')->name('frontend.blog.searchPosts');
    Route::get('info','InfoController@index')->name('frontend.info.index');
    


});





