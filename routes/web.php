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
            return view('categories/create');
        }) ->name('categories.create');
        Route::get('store', function () {
            return redirect()->route('admin.categories.list');
        }) ->name('categories.store');
        Route::post('save', function () {
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
        Route::put('update/{id}', function ($id) {
            return redirect()->route('admin.categories.list');
        }) ->name('categories.update');
        Route::get('delete/{id}', function ($id) {
            return redirect()->route('admin.categories.list');
        }) ->name('categories.delete');
        Route::get('show/{id}', function ($id) {
            return redirect()->route('admin.categories.list');
        }) ->name('categories.show');
    });
    
    
});

