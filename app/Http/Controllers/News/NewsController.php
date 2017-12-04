<?php

namespace App\Http\Controllers\News;

use App\Http\Requests\StoreNewsRequest;
use App\News;
use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $news = News::latestFirst()->get();
        if($request->wantsJson()){
            return  fractal()
                ->collection($news)
                ->transformWith(new NewsTransformer)
                ->toArray();
        }

        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $news = new News;

        $news->ar_title = $request->ar_title;
        $news->en_title = $request->en_title;
        $news->ar_body  = $request->ar_body;
        $news->en_body  = $request->en_body;
        /*
         * Here stands image upload function
         * */
        if($request->hasFile('image')){
            $image = $request->file('image');
            $last_record = News::orderBy('id', 'desc')->first();
            if(count($last_record)){
                $new_id = $last_record->id + 1;
            } else {
                $new_id = 1;
            }


            $filename = 'news_' . $new_id . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'img/news';
            $image->move($destinationPath, $filename);
            $uri = News::ROOT . '/' .$destinationPath . '/' . $filename;

            $news->image = $uri;
        }

        $news->save();

        if($request->wantsJson()){
            return  fractal()
                    ->item($news)
                    ->transformWith(new NewsTransformer)
                    ->toArray();
        }

        return redirect()->route('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($news)
                ->transformWith(new NewsTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->ar_title = $request->ar_title;
        $news->en_title = $request->en_title;
        $news->ar_body  = $request->ar_body;
        $news->en_body  = $request->en_body;
        /*
         * Here stands image upload function
         * */
        if($request->hasFile('image')){
            $image = $request->file('image');


            $filename = 'news_' . $news->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'img/news';
            $image->move($destinationPath, $filename);
            $uri = News::ROOT . '/' .$destinationPath . '/' . $filename;

            $news->image = $uri;
        }

        $news->save();

        if($request->wantsJson()){
            return  fractal()
                ->item($news)
                ->transformWith(new NewsTransformer)
                ->toArray();
        }

        return redirect()->route('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $root = News::ROOT . '/';
        $file = str_replace($root, '', $news->image);


        if(File::delete($file)){
            $news->delete();
        }

        return redirect()->route('news');
    }
}
