<?php

namespace App;



class Product extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];
    const AR_TAGLINE = "منتجاتنا تعتمد على بناء وتوفير مستوى عال من خدمات المحتوى الرقمى";
    const EN_TAGLINE = "";

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
