<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $products = Product::all();

        if($request->wantsJson()){
            return  fractal()
                    ->collection($products)
                    ->parseIncludes(['clients'])
                    ->transformWith(new ProductTransformer)
                    ->toArray();
        }

        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->ar_name = $request->ar_name;
        $product->en_name = $request->en_name;
        $product->ar_description = $request->ar_description;
        $product->en_description = $request->en_description;
        /*
         * Here stands logo upload function
         * */
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $last_record = Product::orderBy('id', 'desc')->first();
            if(count($last_record)){
                $new_id = $last_record->id + 1;
            } else {
                $new_id = 1;
            }


            $filename = 'product_' . $new_id . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'img/product';
            $logo->move($destinationPath, $filename);
            $uri = Product::ROOT . '/' .$destinationPath . '/' . $filename;

            $product->logo = $uri;
        }

        $product->save();

        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->parseIncludes(['clients'])
                ->transformWith(new ProductTransformer)
                ->toArray();
        }

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->parseIncludes(['clients'])
                ->transformWith(new ProductTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->ar_name = $request->ar_name;
        $product->en_name = $request->en_name;
        $product->ar_description = $request->ar_description;
        $product->en_description = $request->en_description;
        /*
         * Here stands logo upload function
         * */
        if($request->hasFile('logo')){
            $logo = $request->file('logo');

            $filename = 'product_' . $product->id . '.' . $logo->getClientOriginalExtension();
            $destinationPath = 'img/product';
            $logo->move($destinationPath, $filename);
            $uri = Product::ROOT . '/' .$destinationPath . '/' . $filename;

            $product->logo = $uri;

        }


        $product->save();

        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->transformWith(new ProductTransformer)
                ->toArray();
        }

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->clients()->detach();
        $root = Product::ROOT . '/';
        $file = str_replace($root, '', $product->logo);


        if(File::delete($file)){
            $product->delete();
        }

        return redirect()->route('products');
    }
}
