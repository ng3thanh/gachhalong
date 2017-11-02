<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('menus')->truncate();
        DB::table('images')->truncate();
 
        factory(Menu::class, 3)->create()->each(function($u) {
            $u->menuProduct()
            ->saveMany( factory(Product::class, 5)->make() )
            ->each(function($p){
                $p->productImage()->saveMany(factory(Image::class, 2)->make());
            });
        });
    }
}