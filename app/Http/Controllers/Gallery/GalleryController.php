<?php

namespace App\Http\Controllers\Gallery;

use App\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Transformers\GalleryTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleries = Gallery::latest()->get();
        if($request->wantsJson()){
            return  fractal()
                ->collection($galleries)
                ->addMeta([
                    'ar_tagline' => Gallery::AR_TAGLINE,
                    'en_tagline' => Gallery::EN_TAGLINE
                ])
                ->transformWith(new GalleryTransformer)
                ->toArray();
        }

        return view('galleries', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newGallery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $gallery = new Gallery;

        $gallery->ar_title = $request->ar_title;
        $gallery->en_title = $request->en_title;
        $gallery->ar_description = $request->ar_description;
        $gallery->en_description = $request->en_description;
        $gallery->save();
        /*
         * Here stands image upload function
         * */
        $gallery->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                    ->item($gallery)
                    ->transformWith(new GalleryTransformer)
                    ->toArray();
        }

        return redirect()->route('galleries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($gallery)
                ->transformWith(new GalleryTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('editGallery', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->ar_title = $request->ar_title;
        $gallery->en_title = $request->en_title;
        $gallery->ar_description = $request->ar_description;
        $gallery->en_description = $request->en_description;
        $gallery->save();
        /*
         * Here stands image upload function
         * */
        $gallery->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($gallery)
                ->transformWith(new GalleryTransformer)
                ->toArray();
        }

        return redirect()->route('galleries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        File::delete($gallery->image);
        $gallery->delete();



        return redirect()->route('galleries');
    }
}
