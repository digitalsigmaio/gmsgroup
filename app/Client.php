<?php

namespace App;



class Client extends GMS
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
    const AR_TAGLINE = "عملائنا الكرام هم شركاء النجاح دوما و ابدا و نضع نصب أعيننا مصلحتهم و نسعى دائما لثقتهم";

    /*
     * Constant value for English tagline
     *
     * @var string
     * */
    const EN_TAGLINE = "Our honored customers are always the partners of success and start to keep in mind their interest and always seek their trust";

    /*
     * Assign a relation with Product class
     *
     * @param void
     * @return collection App\Product
     * */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'client_product');
    }

    /*
     * Assign a relation with Service class
     *
     * @param void
     * @return collection App\Service
     * */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'client_service');
    }

    /*
     * Check if the client has products assigned to him
     *
     * @param int $product_id
     * @return bool
     * */
    public function hasProduct($product_id)
    {
        foreach($this->products as $product){
            if($product->id == $product_id){
                return true;
            }
        }
        return false;
    }

    /*
     * Check if the client has services assigned to him
     *
     * @param int $service_id
     * @return bool
     * */
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
