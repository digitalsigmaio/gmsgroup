<?php

namespace App;



class Product extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
