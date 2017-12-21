<?php

namespace App;



class Client extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'client_product');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'client_service');
    }

    public function hasProduct($product_id)
    {
        foreach($this->products as $product){
            if($product->id == $product_id){
                return true;
            }
        }
        return false;
    }


    public function hasService($service_id)
    {
        foreach($this->services as $service){
            if($service->id == $service_id){
                return true;
            }
        }
        return false;
    }
}
