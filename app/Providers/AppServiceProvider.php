<?php

namespace App\Providers;

use App\Article;
use App\GameCategory;
use App\Subject;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        view()->share('subjects', Subject::all());
        view()->share('gameCategories', GameCategory::all());

    }
}
