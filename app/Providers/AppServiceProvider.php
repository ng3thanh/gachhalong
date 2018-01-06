<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use App\Models\Meta;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\News;

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
        $menus = Menu::all()->mapToGroups(function ($item, $key) {
            return [
                $item['parent_id'] => $item
            ];
        });
        
        $introduces = News::where('type', News::TYPE_INTRODUCE)->get();

        $footerProduct = Product::join('images', 'images.product_id', '=', 'products.id')
        ->select(
            'products.id',
            'products.name',
            'products.slug',
            'images.name as image_name',
            'images.alt')
        ->where('is_main_image', Image::IS_MAIN_IMAGE)
        ->whereNull('images.deleted_at')
        ->orderBy('products.star', 'desc')
        ->limit(9)
        ->get();

        View::share('meta', isset($meta) ? $meta->meta : 'ngthanh2093@gmail.com');
        View::share('menus', $menus);
        View::share('introduces', $introduces);
        View::share('footerProduct', $footerProduct);
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
