<?php

namespace App\Providers;

use App\MenuItem;
use Illuminate\Support\ServiceProvider;

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
    {//creating menu automatically
        $menuItems = MenuItem::where('status', 'Enabled')->get();
        view()->share('menuItems', $menuItems);
    }
}
