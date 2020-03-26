<?php

namespace App\Providers;
use App\Models\{ User, UserProfile, Profession, Skill};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{Schema, Blade, View};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Blade::component('shared._card','card');

      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
