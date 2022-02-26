<?php

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

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', function () {
        return view('dashboard');
    }) ->name('dashboard.index');
    Route::get('categories', function () {
        return view('categories/list');
    }) ->name('categories.list');
    Route::prefix('categories')->group(function() {
        Route::get('create', function () {
            // return view('categories/create');
            \Illuminate\Support\Facades\Log::error('Test Error');
            \Illuminate\Support\Facades\Log::info('Test Info 3');
        }) ->name('categories.create');
        Route::post('store', function () {
            // return 'dkjskd';
            return redirect()->route('admin.categories.list');
        }) ->name('categories.store');
        Route::get('save', function () {
            return redirect()->route('admin.categories.list');
        }) ->name('categories.save');
        Route::get('edit/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.categories.list');
        }) ->name('categories.edit');
        Route::get('update/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.categories.list');
        }) ->name('categories.update');
        Route::get('delete/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.categories.list');
        }) ->name('categories.delete');
        Route::get('show/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.categories.list');
        }) ->name('categories.show');
    });
    Route::get('blog', function () {
        return view('blog/list');
    }) ->name('blog.list');
    Route::prefix('blog')->group(function() {
        Route::get('create', function () {
            return view('blog/create');
        }) ->name('blog.create');
        Route::get('store', function () {
            return redirect()->route('admin.blog.list');
        }) ->name('blog.store');
        Route::post('save', function () {
            return redirect()->route('admin.blog.list');
        }) ->name('blog.save');
        Route::get('edit/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.blog.list');
        }) ->name('blog.edit');
        Route::put('update/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.blog.list');
        }) ->name('blog.update');
        Route::get('delete/{id?}', function ($id = null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.blog.list');
        }) ->name('blog.delete');
        Route::get('show/{id?}', function ($id= null) {
            if($id == null) {
                return 'nhập id';
            }else {
                return 'id:' . $id ;
            };
            return redirect()->route('admin.blog.list');
        }) ->name('blog.show');
    });
    
});

