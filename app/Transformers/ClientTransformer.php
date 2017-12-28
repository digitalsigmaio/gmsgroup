<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'products',
        'services'
    ];
    public function transform(Client $client)
    {
        return [
            'id'      => $client->id,
            'ar_name' => $client->ar_name,
            'en_name' => $client->en_name,
            'logo'    => $client->logo
        ];
    }

    public function includeProducts(Client $client)
    {
        return $this->collection($client->products, new ProductTransformer);
    }

    public function includeServices(Client $client)
    {
        return $this->collection($client->services, new ServiceTransformer);
    }

}