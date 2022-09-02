<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    public function index()
    {
        $messages =  Message::where("user_id", Auth::guard("web")->user()->id);
        return view("chat.index", compact("messages"));

        // return  view("chat.index");
    }



    public function sendMessage(Request $request)


    {

        // return $request->message;

        if ($request->message != null && auth::guard("web")->user() != null) {



            $user = Auth::guard("web")->user();

            $message = new Message;
            $message->message =  $request->input('message');
            $message->user_id = Auth::guard("web")->user()->id;
            $message->save();
            return "işlem başarılı";
        } else {

            return "işlem başarısız";
        }

        // return ['status' => 'Message Sent!'];
    }
}
