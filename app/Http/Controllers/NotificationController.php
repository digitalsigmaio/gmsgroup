<?php

namespace App\Http\Controllers;

use App\Device;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /*
     * Display a form for push notification
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        return view('notification');
    }

    /*
     * Handling sending notification process
     * and giving a report about it
     *
     * @param Illuminate\Http\Request
     * @return string
     **/
    public function send(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $title = $request->title;
        $body  = $request->body;

        if($request->link != ''){
            $link = $request->link;
        } else {
            $link = '';
        }

        $message = [
            'title' => $title,
            'body'  => $body,
            'link'  => $link,
			'type'  => Notification::TYPE
        ];

        $notification = new Notification;
        $notification->notification($message);

        session()->flash('report', $notification->report);

        return redirect()->back();
    }
}
