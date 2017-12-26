<?php

namespace App\Http\Controllers\Child;

use App\Child;
use App\Http\Requests\StoreChildRequest;
use App\Transformers\ChildTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ChildController extends Controller
{
    /**
     * Display a list of resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $children = Child::all();

        if($request->wantsJson()){
            return  fractal()
                ->collection($children)
                ->transformWith(new ChildTransformer)
                ->toArray();
        }

        return view('subsidiaries', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newSubsidiary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildRequest $request)
    {
        $child = new Child;
        $child->ar_name = $request->ar_name;
        $child->en_name = $request->en_name;
        $child->ar_description = $request->ar_description;
        $child->en_description = $request->en_description;
        $child->save();
        /*
         * Upload subsidiary logo
         *
         * @param App\Http\Requests\StoreChildRequest $request
         * @return void
         * */
        $child->uploadLogo($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($child)
                ->transformWith(new ChildTransformer)
                ->toArray();
        }

        return redirect()->route('subsidiaries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($child)
                ->transformWith(new ChildTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        return view('editSubsidiary', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        $child->ar_name = $request->ar_name;
        $child->en_name = $request->en_name;
        $child->ar_description = $request->ar_description;
        $child->en_description = $request->en_description;
        $child->save();

        /*
         * Upload subsidiary logo
         *
         * @param \Illuminate\Http\Request  $request
         * @return void
         * */
        $child->uploadLogo($request);




        if($request->wantsJson()){
            return  fractal()
                ->item($child)
                ->transformWith(new ChildTransformer)
                ->toArray();
        }

        return redirect()->route('subsidiaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Child $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        File::delete($child->logo);
        $child->delete();


        return redirect()->route('subsidiaries');
    }
}
