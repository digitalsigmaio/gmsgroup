<?php

namespace App\Http\Controllers\ParentCompany;

use App\Http\Requests\StoreParentCompanyRequest;
use App\ParentCompany;
use App\Transformers\ParentCompanyTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentCompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parentCompany = ParentCompany::all()->first();

        if($request->wantsJson()){
            return  fractal()
                ->item($parentCompany)
                ->parseIncludes(['children', 'services', 'products', 'projects', 'clients', 'socials', 'galleries'])
                ->transformWith(new ParentCompanyTransformer)
                ->toArray();
        }

        return view('index', compact('parentCompany'));
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
    public function store(StoreParentCompanyRequest $request)
    {
        $parentCompany = new ParentCompany;

        $parentCompany->ar_name = $request->ar_name;
        $parentCompany->en_name = $request->en_name;
        $parentCompany->ar_about = $request->ar_about;
        $parentCompany->en_about = $request->en_about;
        $parentCompany->ar_address = $request->ar_address;
        $parentCompany->en_address = $request->en_address;
        $parentCompany->email = $request->email;
        $parentCompany->tel = $request->tel;
        $parentCompany->gmap = $request->gmap;
        /*
         * Here stands logo upload function
         * */

        $parentCompany->save();

        if($request->wantsJson()){
            return  fractal()
                    ->item($parentCompany)
                    ->transformWith(new ParentCompanyTransformer)
                    ->toArray();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentCompany = ParentCompany::findOrFail($id);
        return view('editCompany', compact('parentCompany'));
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
        $parentCompany = ParentCompany::findOrFail($id);
        $parentCompany->ar_name = $request->ar_name;
        $parentCompany->en_name = $request->en_name;
        $parentCompany->ar_about = $request->ar_about;
        $parentCompany->en_about = $request->en_about;
        $parentCompany->ar_address = $request->ar_address;
        $parentCompany->en_address = $request->en_address;
        $parentCompany->email = $request->email;
        $parentCompany->tel = $request->tel;
        /*
         * Here stands logo upload function
         * */
        if($request->hasFile('logo')){
            $logo = $request->file('logo');

            $filename = 'logo' . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'img/company';
            $logo->move($destinationPath, $filename);
            $uri = ParentCompany::ROOT . '/' .$destinationPath . '/' . $filename;

            $parentCompany->logo = $uri;

        }

        $parentCompany->save();

        if($request->wantsJson()){
            return  fractal()
                ->item($parentCompany)
                ->transformWith(new ParentCompanyTransformer)
                ->toArray();
        }

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
