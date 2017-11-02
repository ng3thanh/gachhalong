<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::whereColumn('parent_id', 'id')->get()->pluck('name', 'id');

        $products = Product::join('menus', 'menus.id', '=', 'products.menu_id')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select(
                'products.id', 
                'products.name', 
                'menus.id as menu_id', 
                'menus.parent_id as menu_parent_id',
                'images.name as image_name',
                'images.alt')
            ->where('is_main_image', Image::IS_MAIN_IMAGE)
            ->get();

        $data = $products->mapToGroups(function ($item, $key) {
            return [$item['menu_parent_id'] => $item];
        });

        return view('web.main', ['menu' => $menu, 'data' => $data]);
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
    public function show($id)
    {
        //
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
