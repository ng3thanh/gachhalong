<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Meta;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $meta = Meta::orderBy('updated_at', 'DESC')->first();
        $menus = Menu::get();
        View::share('meta', isset($meta) ? $meta->meta : 'ngthanh2093@gmail.com');
        View::share('menus', $menus);
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
