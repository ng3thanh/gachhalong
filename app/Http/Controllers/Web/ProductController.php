<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $menu_id)
    {
        $menuId = $menu_id;
        $paginate = Request::get('paginate', 10);
        
        $menuNow = Menu::where('id', $menuId)->first();

        $products = Product::join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('images', 'images.product_id', '=', 'products.id')
        ->select(
            'products.id', 
            'products.name',
            'products.slug',
            'menus.id as menu_id', 
            'menus.parent_id as menu_parent_id', 
            'images.name as image_name', 
            'images.alt'
        )
        ->where(function ($query) use ($menuId) {
            $query->where('menus.id', $menuId)
                  ->orWhere('menus.parent_id', $menuId);
        })
        ->where('is_main_image', Image::IS_MAIN_IMAGE)
        ->where('publish_start', '<=', date('Y-m-d H:i:s'))
        ->where('publish_end', '>=', date('Y-m-d H:i:s'))
        ->paginate($paginate);

        $menuData = Menu::all();
        
        $parentMenu = Menu::whereColumn('parent_id', 'id')->get();
        
        $menuProduct = $menuData->mapToGroups(function ($item, $key) {
            return [
                $item['parent_id'] => $item
            ];
        });
        
        return view('web.pages.product.list', [
            'parentMenu' => $parentMenu,
            'menuProduct' => $menuProduct,
            'products' => $products,
            'menuNow' => $menuNow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {

        $product = Product::join('menus', 'menus.id', '=', 'products.menu_id')->select('products.id', 'products.name', 'products.price', 'products.description', 'products.star', 'products.digital', 'products.information', 'menus.name AS menu_name')
            ->where('publish_start', '<=', date('Y-m-d H:i:s'))
            ->where('publish_end', '>=', date('Y-m-d H:i:s'))
            ->findOrFail($id);

        $images = Image::where('product_id', $id)->get();

        return view('web.pages.product.detail', [
            'product' => $product,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
