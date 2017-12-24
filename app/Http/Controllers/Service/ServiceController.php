<?php

namespace App\Http\Controllers\Service;

use App\Service;
use App\Transformers\ServiceTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::all();
        if($request->wantsJson()){
            return  fractal()
                    ->collection($services)
                    ->parseIncludes(['clients'])
                    ->addMeta([
                        'ar_tagline' => Service::AR_TAGLINE,
                        'en_tagline' => Service::EN_TAGLINE
                    ])
                    ->transformWith(new ServiceTransformer)
                    ->toArray();
        }

        return view('services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;
        $service->ar_name = $request->ar_name;
        $service->en_name = $request->en_name;
        $service->ar_description = $request->ar_description;
        $service->en_description = $request->en_description;
        $service->save();
        /*
         * Here stands logo upload function
         * */
        $service->uploadLogo($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($service)
                ->parseIncludes(['clients'])
                ->transformWith(new ServiceTransformer)
                ->toArray();
        }

        return redirect()->route('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($service)
                ->parseIncludes(['clients'])
                ->transformWith(new ServiceTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('editService', compact('service'));
    }

    /**
     * Show service gallery
     *
     * @param int $service
     * @return \Illuminate\Http\Response
     */
    public function gallery(Service $service)
    {
        $images = $service->images;

        return view('serviceImages', compact(['service', 'images']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->ar_name = $request->ar_name;
        $service->en_name = $request->en_name;
        $service->ar_description = $request->ar_description;
        $service->en_description = $request->en_description;
        $service->save();
        /*
         * Here stands logo upload function
         * */
        $service->uploadLogo($request);




        if($request->wantsJson()){
            return  fractal()
                ->item($service)
                ->transformWith(new ServiceTransformer)
                ->toArray();
        }

        return redirect()->route('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->clients()->detach();
        File::delete($service->logo);
        $service->delete();


        return redirect()->route('services');
    }
}
