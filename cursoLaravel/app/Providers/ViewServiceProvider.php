<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{ User, UserProfile, Profession, Skill };
use Illuminate\Support\Facades\{Schema, Blade, View};

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer(['users._fields', 'users.index'], function($view){

            $skills      = Skill::OrderBy('name','ASC')->get();
            $professions = Profession::OrderBy('title','ASC')->get();
            $roles       = trans('users.roles');
            $team        = trans('users.team');
            $active      = trans('users.active');
            
            $view->with([
               'skills'       => $skills,
               'professions'  => $professions,
               'team'         => $team,
               'roles'        => $roles,
               'checkedSkills'=> collect(request('skill')),
               'active'       => $active
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
