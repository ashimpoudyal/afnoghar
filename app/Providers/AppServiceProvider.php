<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
use App\Models\Theme;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Global varibale declaration
       View::composer(['admin.*'],function($view){
            $view->with('theme',Theme::first());


        });


        //Global varibale declaration
       View::composer(['front.*'],function($view){
            $view->with('theme',Theme::first());


        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
