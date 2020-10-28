<?php

namespace App\Providers;

use App\ProfileImages;
use Illuminate\Support\ServiceProvider;
use View;
use Session;


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
        View::composer('*',function ($view){
            $customerSessionId=Session::get('customerId');
            $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
            $view->with('profileImage',$profileImage);
        });

    }
}
