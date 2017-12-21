<?php

namespace App\Http\Controllers\ServiceImage;

use App\Service;
use App\ServiceImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Service $service, Request $request)
    {
        $image = new ServiceImage;
        $image->service_id = $service->id;
        $image->save();

        $image->uploadImage($request);

        return redirect()->route('serviceImages', compact('service'));
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
    public function edit(Service $service, ServiceImage $serviceImage)
    {
        return view('editServiceImage', compact(['service', 'serviceImage']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, ServiceImage $serviceImage)
    {
        $serviceImage->uploadImage($request);

        return redirect()->route('serviceImages', compact('service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, ServiceImage $serviceImage)
    {
        File::delete($serviceImage->image);
        $serviceImage->delete();



        return redirect()->route('serviceImages', compact('service'));
    }
}
