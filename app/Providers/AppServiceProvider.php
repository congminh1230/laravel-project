<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $menu = ['phone','lol'];
        // View::share('menu',$menu);
        $menus =  Cache::remember('menus', 60*60*60, function () {
            return Menu::get();
        });
        View::share('menus', $menus);
        Paginator::useBootstrap();
    }
}
