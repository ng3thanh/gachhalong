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

        $day = date('d', strtotime("now"));
        $month = 6324*(30-$day)/30;
        $hour = date('H', strtotime("now"));
        $min = date('i', strtotime("now"));
        $today = ($month/30)*($hour/24) + $min*($month/(30*24*60));
        $diffMonth = 12*(date('Y', strtotime("now")) - 2018) + date('m', strtotime("now")) - 1;
        $total = 5743*$diffMonth + $month;

        $visitor = [
            'now' => rand(1,3),
            'today' => number_format($today),
            'month' => number_format($month),
            'total' => number_format($total)
        ];
        View::share('meta', isset($meta) ? $meta->meta : 'ngthanh2093@gmail.com');
        View::share('menus', $menus);
        View::share('introduces', $introduces);
        View::share('footerProduct', $footerProduct);
        View::share('visitor', $visitor);
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
