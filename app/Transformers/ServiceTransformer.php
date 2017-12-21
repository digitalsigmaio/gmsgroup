<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Service;
use App\Transformers\ClientTransformer;
use League\Fractal\TransformerAbstract;

class ServiceTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'clients'
    ];
    public function transform(Service $service)
    {
        return [
            'id'             => $service->id,
            'ar_name'        => $service->ar_name,
            'en_name'        => $service->en_name,
            'ar_description' => $service->ar_description,
            'en_description' => $service->en_description,
            'logo'           => $service->logo,
			'images'         => $service->images
        ];
    }

    public function includeClients(Service $service)
    {
        return $this->collection($service->clients, new ClientTransformer);
    }
}