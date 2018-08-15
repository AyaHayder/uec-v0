<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\SoftDeletes;

class MessageController extends Controller
{
    use softDeletes;
    //1.
    public function getMessages()
    {
        $messages = Message::all()->pluck('content');
        return $messages;
    }
    
    //2.
    public function showMessages(Request $request)
    {
        $message = new Message;
        $content = $request->message;
        $message->content = $content;
        $message->save();
        return $content;
    }
}
