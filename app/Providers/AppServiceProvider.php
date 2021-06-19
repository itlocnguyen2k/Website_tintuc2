<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        //
       // $id_user = Auth::id();
       //  $user_login = "Nguyen van loc";
        //view()->share('user_login',$user);
        //$user_login = Auth::user();
        // View::share('user_login',$user_login);
    }
   
}
