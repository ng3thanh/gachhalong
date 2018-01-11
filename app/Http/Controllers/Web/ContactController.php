<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.pages.contact.detail');
    }

    /**
     * Action feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback(FeedbackRequest $request)
    {
        $dataFeedback = $request->all();

        DB::beginTransaction();
        try {
            $feedback = new Feedback();
            $feedback->name = $dataFeedback['name'];
            $feedback->mail = $dataFeedback['email'];
            $feedback->phone = $dataFeedback['phone'];
            $feedback->content = $dataFeedback['content'];
            $feedback->save();
            DB::commit();

            return Redirect::back();
        } catch (Exception $e) {
            DB::rollBack();
        }

    }
}
