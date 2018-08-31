<?php

namespace App\Http\Controllers;

use Edujugon\PushNotification\PushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PushNotificationController extends Controller
{

    /**
     * PushNotificationController constructor.
     */
    public function __construct()
    {
//        $this->middleware()
    }

    public function send(Request $request){
        $this->validate($request,['title' => 'required','message' => 'required']);

        $push = new PushNotification('fcm');
        $push->setMessage([
            'notification' => [
                'title'=>$request->title,
                'body'=>$request->message,
            ],
            'data' => [
                'post_url' => $request->has('post_url') ? $request->get('post_url') : null
            ]
        ])
            ->sendByTopic('news');

        
        $request->session()->flash('sent','Notification Sent Successfully');

        return redirect(route('home'));
    }
}
