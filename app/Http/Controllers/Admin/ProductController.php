<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestParameter;
use App\Models\Menu;

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
    public function store(Request $request)
    {
        dd($request->all());
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
        $product = Product::findOrFail($id);

        return view('admin.pages.product.edit', [
            'product' => $product,
        ]);
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
