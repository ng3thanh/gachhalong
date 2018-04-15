<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\EmailContact;
use App\Models\Feedback;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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

    public function mailRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
        ]);

        $email = $request->get('email');
        $check = EmailContact::where('email', $email)->first();
        if ($check) {
            $check->register = $check->register + 1;
            $check->save();
        } else {
            $newEmail = EmailContact::insertGetId(['email' => $email]);
        }
        return Redirect::back();

    }
}
