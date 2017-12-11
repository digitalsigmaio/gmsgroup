<?php

namespace App\Http\Controllers;

use App\Device;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        return view('notification');
    }

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
            $link = null;
        }

        $message = [
            'title' => $title,
            'body' => $body,
            'link' => $link,
        ];

        $notification = new Notification;
        $notification->notification($message);

        session()->flash('report', $notification->report);

        return redirect()->back();
    }
}
