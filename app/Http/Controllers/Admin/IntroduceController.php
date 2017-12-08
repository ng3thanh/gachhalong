<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as RequestParameter;
use App\Models\News;

class IntroduceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = News::LIMIT;
        $name = RequestParameter::get('name', null);
        $publishTime = RequestParameter::get('publish_time', null);
        $startPrice = RequestParameter::get('start_price', null);
        $endPrice = RequestParameter::get('end_price', null);
        $status = RequestParameter::get('status', []);
        
        $query = News::withTrashed()->where('type', News::TYPE_INTRODUCE);
        
//         if (! empty($status)) {
            
//             if (! in_array(News::DELETED, $status)) {
//                 $query->where('status', '<>', News::DELETED);
//             }
            
//             if (! in_array(News::END_TIME, $status)) {
//                 $query->where('status', '<>', News::NOT_SHOW);
//             }
            
//             if (! in_array(News::NOT_SHOW, $status)) {
//                 $query->where('status', '<>', News::NOT_SHOW);
//             }
            
//             if (! in_array(News::SHOWING, $status)) {
//                 $query->where('status', '<>', News::SHOWING);
//             }
//         }
        
//         if (! empty($name)) {
//             $query->where('name', $name);
//         }
        
//         if (! empty($publishTime)) {
//             $startTime = date('Y-m-d 00:00:00', strtotime(substr($publishTime, 0, 10)));
//             $endTime = date('Y-m-d 23:59:59', strtotime(substr($publishTime, - 10)));
            
//             $query->where('publish_start', '>=', $startTime)->where('publish_end', '<=', $endTime);
//         }
        
//         if (! empty($startPrice)) {
//             $query->where('price', '>=', $startPrice);
//         }
        
//         if (! empty($endPrice)) {
//             $query->where('price', '<=', $endPrice);
//         }
        
        $news = $query->orderBy('publish_start', 'desc')->paginate($limit);
        
        $number = (RequestParameter::get('page', '1') - 1) * $limit + 1;
        
        return view('admin.pages.introduce.index', [
            'news' => $news,
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
        return view('admin.pages.introduce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('admin.pages.introduce.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.introduce.edit');
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
        return view('admin.pages.introduce.index');
    }
}
