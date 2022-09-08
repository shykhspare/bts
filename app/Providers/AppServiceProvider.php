<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $this->webStartup();
        $this->cart();
    }


    public function cart()
    {
        view()->composer(['front.components.aside','front.components.header'], function ($view) {
            if (Auth::check()) {
                $where = ['user_id' => Auth::User()->id];
            } else {
                $where = ['session_id' => session()->getId()];
            }
          
            $items = Orderitem::where($where)->where('status', 0)->with('book')->get();
            
            $view->with('cart', $items);
        });
    }
    public function webStartup()
    {
        $website = Setting::first();
        View::share('website', $website);
    }
}
