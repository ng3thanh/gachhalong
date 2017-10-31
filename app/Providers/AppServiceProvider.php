<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Meta;
use Illuminate\Support\Facades\View;

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
        View::share('meta', isset($meta) ? $meta->meta : 'ngthanh2093@gmail.com');
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
