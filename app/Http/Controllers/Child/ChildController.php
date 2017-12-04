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
     * Display a listing of the resource.
     *
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
        /*
         * Here stands logo upload function
         * */
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $last_record = Child::orderBy('id', 'desc')->first();
            if(count($last_record)){
                $new_id = $last_record->id + 1;
            } else {
                $new_id = 1;
            }

            $filename = 'subsidiary_' . $new_id . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'img/subsidiary';
            $logo->move($destinationPath, $filename);
            $uri = Child::ROOT . '/' .$destinationPath . '/' . $filename;

            $child->logo = $uri;
        }

        $child->save();

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
        /*
         * Here stands logo upload function
         * */
        if($request->hasFile('logo')){
            $logo = $request->file('logo');

            $filename = 'subsidiary_' . $child->id . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'img/subsidiary';
            $logo->move($destinationPath, $filename);
            $uri = Child::ROOT . '/' .$destinationPath . '/' . $filename;

            $child->logo = $uri;

        }


        $child->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $root = Child::ROOT . '/';
        $file = str_replace($root, '', $child->logo);


        if(File::delete($file)){
            $child->delete();
        }

        return redirect()->route('subsidiaries');
    }
}
