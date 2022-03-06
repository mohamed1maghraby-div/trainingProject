<?php

namespace App\Providers;

use App\Models\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function($view){
            View::share('userNotifications', Friend::where('user_id_receiver', Auth::id())->whereApproved(0)->whereBlocked(0)->get());
        });
    }
}
