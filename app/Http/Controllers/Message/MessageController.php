<?php

namespace App\Http\Controllers\Message;

use App\Http\Requests\StoreMessageRequest;
use App\Message;
use App\Transformers\MessageTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = Message::all();
        if($request->wantsJson()){
            return  fractal()
                ->collection($messages)
                ->transformWith(new MessageTransformer)
                ->toArray();
        }
        return view('messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $message = new Message;

        $message->title = $request->title;
        $message->body  = $request->body;
        $message->tel   = $request->tel;
        $message->email = $request->email;

        $message->save();
        if($request->wantsJson()){
            return  fractal()
                    ->item($message)
                    ->transformWith(new MessageTransformer)
                    ->toArray();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return  fractal()
            ->item($message)
            ->transformWith(new MessageTransformer)
            ->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages');
    }
}
