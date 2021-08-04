<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Pagination\Paginator;


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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        
        View::share('schoolname', 'FPT Polytechnic');
        View::composer(['admin.products.index', 'home.index'], function ($view) {
            $users = User::all();
            $view->with('system_users', $users);
        });

        view()->composer('admin.layouts.aside', function ($view) {
            
            $menu = [
                1 => 'dashboard',
                2 => 'sản phẩm',
                3 => 'danh mục'
            ];
            $view->with('menu', $menu);
        });
    }
}
