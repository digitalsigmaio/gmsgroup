<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'clients'
    ];
    public function transform(Product $product)
    {
        return [
            'id'             => $product->id,
            'ar_name'        => $product->ar_name,
            'en_name'        => $product->en_name,
            'ar_description' => $product->ar_description,
            'en_description' => $product->en_description,
            'logo'           => $product->logo,
			'images'         => $product->images
        ];
    }

    public function includeClients(Product $product)
    {
        return $this->collection($product->clients, new ClientTransformer);
    }
}