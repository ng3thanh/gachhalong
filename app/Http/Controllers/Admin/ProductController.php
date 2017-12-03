<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as RequestParameter;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = Product::LIMIT;
        $name = RequestParameter::get('name', null);
        $publishTime = RequestParameter::get('publish_time', null);
        $startPrice = RequestParameter::get('start_price', null);
        $endPrice = RequestParameter::get('end_price', null);
        $status = RequestParameter::get('status', []);
        
        $query = Product::withTrashed();

        if (! empty($status)) {
            
            if (! in_array(Product::DELETED, $status)) {
                $query->where('status', '<>', Product::DELETED);
            }
            
            if (! in_array(Product::END_TIME, $status)) {
                $query->where('status', '<>', Product::NOT_SHOW);
            }
            
            if (! in_array(Product::NOT_SHOW, $status)) {
                $query->where('status', '<>', Product::NOT_SHOW);
            }
            
            if (! in_array(Product::SHOWING, $status)) {
                $query->where('status', '<>', Product::SHOWING);
            }
            
        }
        
        if (! empty($name)) {
            $query->where('name', $name); 
        }
        
        if (! empty($publishTime)) {
            $startTime = date('Y-m-d 00:00:00', strtotime(substr($publishTime, 0, 10)));
            $endTime = date('Y-m-d 23:59:59', strtotime(substr($publishTime, - 10)));
            
            $query->where('publish_start', '>=', $startTime)->where('publish_end', '<=', $endTime);
        }
        
        if (! empty($startPrice)) {
            $query->where('price', '>=', $startPrice);
        }
        
        if (! empty($endPrice)) {
            $query->where('price', '<=', $endPrice);
        }

        $products = $query->orderBy('publish_start', 'desc')->paginate($limit);
        
        $number = (RequestParameter::get('page','1') - 1)* $limit + 1;
        
        return view('admin.pages.product.index', [
            'products' => $products,
            'number' => $number
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allMenu = Menu::all();
        $menus = $allMenu->mapToGroups(function ($item, $key) {
            return [
                $item['parent_id'] => $item
            ];
        });

        return view('admin.pages.product.create', ['menus' => $menus, 'allMenu' => $allMenu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $product = new Product();
            $product->menu_id = $request->menu;
            $product->name = $request->name;
            $product->slug = str_slug($request->name);
            $product->price = $request->price;
            $product->description = $request->description;
            $product->digital = $request->digital;
            $product->information = $request->information;
            $product->status = $request->status;
            $product->publish_start = date('Y-m-d 00:00:00', strtotime(substr($request->publish_time, 0, 10)));
            $product->publish_end = date('Y-m-d 23:59:59', strtotime(substr($request->publish_time, - 10)));
            $product->save();
            
            $mainImage = $request->file('main-img');
            $mainName = time().$mainImage->getClientOriginalName();
            $mainImage->move(public_path('upload/images'), $mainName);
            $mainImageData = new Image();
            $mainImageData->product_id = $product->id;
            $mainImageData->name = $mainName;
            $mainImageData->alt = $product->name;
            $mainImageData->is_main_image = Image::IS_MAIN_IMAGE;
            $mainImageData->save();
            
            $moreImages = $request->file('more-img');
            foreach ($moreImages as $key => $moreImage) {

                $moreName = time().$mainImage->getClientOriginalName();
                $moreImage->move(public_path('upload/images'), $moreName);
                $moreImageData = new Image();
                $moreImageData->product_id = $product->id;
                $moreImageData->name = $moreName;
                $moreImageData->alt = $product->name;
                $moreImageData->is_main_image = Image::IS_NOT_MAIN_IMAGE;
                $moreImageData->save();
            }
            
            DB::commit();
            return Redirect::route('product.index')->with('success', 'Tạo mới sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::route('product.index')->with('error', 'Đã xảy ra lỗi khi thêm mới: '. $e->getMessage());
        }
        
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
        $allMenu = Menu::all();
        $menus = $allMenu->mapToGroups(function ($item, $key) {
            return [
                $item['parent_id'] => $item
            ];
        });
        $product = Product::findOrFail($id);
        $images = Image::where('product_id', $id)->get();

        return view('admin.pages.product.edit', [
            'product' => $product,
            'menus'   => $menus, 
            'allMenu' => $allMenu,
            'images'  => $images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $product = Product::find($id);
            $product->menu_id = $request->menu;
            $product->name = $request->name;
            $product->slug = str_slug($request->name);
            $product->price = $request->price;
            $product->description = $request->description;
            $product->digital = $request->digital;
            $product->information = $request->information;
            $product->status = $request->status;
            $product->publish_start = date('Y-m-d 00:00:00', strtotime(substr($request->publish_time, 0, 10)));
            $product->publish_end = date('Y-m-d 23:59:59', strtotime(substr($request->publish_time, - 10)));
            $product->save();
            
            $mainImage = $request->file('main-img');
            if ($mainImage) {
                $deleteOld = Image::where('product_id', $id)->where('is_main_image', Image::IS_MAIN_IMAGE)->delete();
                
                $mainName = time().$mainImage->getClientOriginalName();
                $mainImage->move(public_path('upload/images'), $mainName);
                $mainImageData = new Image();
                $mainImageData->product_id = $id;
                $mainImageData->name = $mainName;
                $mainImageData->alt = $product->name;
                $mainImageData->is_main_image = Image::IS_MAIN_IMAGE;
                $mainImageData->save();
            }
            
            $moreImages = $request->file('more-img');
            if ($mainImage) {
                foreach ($moreImages as $key => $moreImage) {
                    
                    $moreName = time().$mainImage->getClientOriginalName();
                    $moreImage->move(public_path('upload/images'), $moreName);
                    $moreImageData = new Image();
                    $moreImageData->product_id = $id;
                    $moreImageData->name = $moreName;
                    $moreImageData->alt = $product->name;
                    $moreImageData->is_main_image = Image::IS_NOT_MAIN_IMAGE;
                    $moreImageData->save();
                }
            }
            
            DB::commit();
            return Redirect::route('product.index')->with('success', 'Sửa sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::route('product.index')->with('error', 'Đã xảy ra lỗi khi sửa sản phẩm: '. $e->getMessage());
        }
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
    
    public function listMenu()
    {
        $allMenu = Menu::all();
        $menus = $allMenu->mapToGroups(function ($item, $key) {
            return [
                $item['parent_id'] => $item
            ];
        });
        return view('admin.pages.menu.index', ['menus' => $menus, 'allMenu' => $allMenu]);
    }
    
    public function createMenu()
    {
        
    }
    
    public function storeMenu(Request $request)
    {
        
    }
    
    public function editMenu($id)
    {
        
    }
    
    public function updateMenu(Request $request)
    {
        
    }
    
    public function destroyMenu($id)
    {
        //
    }
}
