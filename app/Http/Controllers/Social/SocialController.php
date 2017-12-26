<?php

namespace App\Http\Controllers\Social;

use App\Http\Requests\StoreSocialRequest;
use App\Project;
use App\Social;
use App\Transformers\SocialTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $socials = Social::all();
        if($request->wantsJson()){
            return  fractal()
                ->collection($socials)
                ->parseIncludes(['clients'])
                ->transformWith(new SocialTransformer)
                ->toArray();
        }

        return view('socials', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newSocial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialRequest $request)
    {
        $social = new Social;

        $social->name = $request->name;
        $social->url     = $request->url;
        $social->save();
        /*
         * Here stands logo upload function
         * */
        $social->uploadLogo($request);




        if($request->wantsJson()){
            return  fractal()
                    ->item($social)
                    ->transformWith(new SocialTransformer)
                    ->toArray();
        }

        return redirect()->route('socials');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($social)
                ->parseIncludes(['clients'])
                ->transformWith(new SocialTransformer)
                ->toArray();
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        return view('editSocial', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $social->name = $request->name;
        $social->url  = $request->url;
        $social->save();
        /*
         * Here stands logo upload function
         * */
        $social->uploadLogo($request);




        if($request->wantsJson()){
            return  fractal()
                ->item($social)
                ->transformWith(new SocialTransformer)
                ->toArray();
        }

        return redirect()->route('socials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
       File::delete($social->logo);
        $social->delete();


        return redirect()->route('socials');
    }
}
