<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Requests\StoreClientRequest;
use App\Product;
use App\Service;
use App\Transformers\ClientTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::all();


        if($request->wantsJson()){
            return  fractal()
                ->collection($clients)
                ->parseIncludes(['products', 'services'])
                ->addMeta([
                    'ar_tagline' => Client::AR_TAGLINE,
                    'en_tagline' => Client::EN_TAGLINE
                ])
                ->transformWith(new ClientTransformer)
                ->toArray();
        }

        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $services = Service::all();
        return view('newClient', compact(['products', 'services']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client;

        $client->ar_name = $request->ar_name;
        $client->en_name = $request->en_name;
        $client->save();
        /**
         * Upload client logo to server
         *
         * @param  \App\Http\Requests\StoreClientRequest $request
         * @return void
         */
        $client->uploadLogo($request);



        /* Attach products or services to client */
        if(!empty($request->products)){
            foreach($request->products as $product){
                $client->products()->attach($product);
            }

        }

        if(!empty($request->services)){
            foreach($request->services as $service){
                $client->services()->attach($service);
            }

        }



        if($request->wantsJson()){
            return  fractal()
                ->item($client)
                ->parseIncludes(['products', 'services'])
                ->transformWith(new ClientTransformer)
                ->toArray();
        }

        return redirect()->route('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($client)
                ->parseIncludes(['products', 'services'])
                ->transformWith(new ClientTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $products = Product::all();
        $services = Service::all();
        return view('editClient', compact(['client', 'products', 'services']));
    }


    /* Client Gallery */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->ar_name = $request->ar_name;
        $client->en_name = $request->en_name;
        $client->save();

        /**
         * Upload client logo to server
         *
         * @param  \App\Http\Requests\StoreClientRequest $request
         * @return void
         */
        $client->uploadLogo($request);



        /* Attach products or services to client */
        if(count($request->products)){
            $client->products()->detach();
            foreach($request->products as $product){
                $client->products()->attach($product);
            }

        }

        if(count($request->services)){
            $client->services()->detach();
            foreach($request->services as $service){
                $client->services()->attach($service);
            }

        }



        if($request->wantsJson()){
            return  fractal()
                ->item($client)
                ->parseIncludes(['products', 'services'])
                ->transformWith(new ClientTransformer)
                ->toArray();
        }

        return redirect()->route('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->products()->detach();
        $client->services()->detach();
        File::delete($client->logo);
        $client->delete();


        return redirect()->route('clients');
    }
}
