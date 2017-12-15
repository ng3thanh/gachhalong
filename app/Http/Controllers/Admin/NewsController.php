<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as RequestParameter;
use Exception;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = News::LIMIT;
        $type = config('news');
        $title = RequestParameter::get('news_title', null);
        $select = RequestParameter::get('news_menu', null);
        $publishTime = RequestParameter::get('news_publish_time', null);

        $query = News::orderBy('publish_start', 'desc');
        
        if (! empty($title)) {
            $query->where('title', 'like', "%$title%");
        }
        
        if (! empty($select)) {
            $query->where('type', $select);
        }
        
        if (! empty($publishTime)) {
            $startTime = date('Y-m-d 00:00:00', strtotime(substr($publishTime, 0, 10)));
            $endTime = date('Y-m-d 23:59:59', strtotime(substr($publishTime, - 10)));
            
            $query->where('publish_start', '>=', $startTime)->where('publish_end', '<=', $endTime);
        }
        
        $news = $query->paginate($limit);
        
        $number = (RequestParameter::get('page', '1') - 1) * $limit + 1;
        
        return view('admin.pages.news.index', [
            'news' => $news,
            'number' => $number,
            'type' => $type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = config('news');
        
        return view('admin.pages.news.create', [
            'type' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $mainImage = $request->file('news_main_img');
            $mainName = time() . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('upload/images/news/'), $mainName);
            
            $news = new News();
            $news->title = $request->news_title;
            $news->slug = str_slug($request->news_title);
            $news->type = $request->news_menu;
            $news->image = $mainName;
            $news->description = $request->news_description;
            $news->content = $request->news_content;
            $news->publish_start = date('Y-m-d 00:00:00', strtotime(substr($request->news_publish_time, 0, 10)));
            $news->publish_end = date('Y-m-d 00:00:00', strtotime(substr($request->news_publish_time, 0, 10)));
            // $news->tag = 'avc'
            $news->save();
            
            DB::commit();
            return Redirect::route('news.index')->with('success', 'Tạo mới menu thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('news.index')->with('error', 'Đã xảy ra lỗi khi thêm mới: ' . $e->getMessage());
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
        return view('admin.pages.contact.detail');
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
