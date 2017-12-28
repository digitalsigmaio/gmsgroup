<?php

namespace App;



class Product extends GMS
{
    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    /*
     * Constant value for Arabic tagline
     *
     * @var string
     * */
    const AR_TAGLINE = "منتجاتنا تعتمد على بناء وتوفير مستوى عال من خدمات المحتوى الرقمى";

    /*
     * Constant value for English tagline
     *
     * @var string
     * */
    const EN_TAGLINE = "Our products are a variety of phone applications and value added services and digital marketing all of this in GMS Group relies on building and providing a high level of technology";

    /*
     * Assign a relation with Client class
     *
     * @param void
     * @return collection App\Client
     * */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product');
    }

    /*
     * Assign a relation with ProductImage class
     *
     * @param void
     * @return collection App\ProductImage
     * */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
