<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\ParentCompany;
use League\Fractal\TransformerAbstract;

class ParentCompanyTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'children',
        'clients',
        'products',
        'services',
        'projects',
        'socials',
        'galleries',
    ];
    public function transform(ParentCompany $parentCompany)
    {
        return [
            'id'         => $parentCompany->id,
            'ar_name'    => $parentCompany->ar_name,
            'en_name'    => $parentCompany->en_name,
            'ar_about'   => $parentCompany->ar_about,
            'en_about'   => $parentCompany->en_about,
            'ar_address' => $parentCompany->ar_address,
            'en_address' => $parentCompany->en_address,
            'email'      => $parentCompany->email,
            'tel'        => $parentCompany->tel,
            'gmap'       => $parentCompany->gmap,
            'logo'       => $parentCompany->logo,
        ];
    }

    public function includeChildren (ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->children, new ChildTransformer);
    }

    public function includeClients (ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->clients, new ClientTransformer);
    }

    public function includeProducts (ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->products, new ProductTransformer);
    }

    public function includeServices(ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->services, new ServiceTransformer);
    }

    public function includeProjects (ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->projects, new ProjectTransformer);
    }

    public function includeSocials (ParentCompany $parentCompany)
    {
        return $this->collection($parentCompany->socials, new SocialTransformer);
    }

    public function includeGalleries(ParentCompany $parentCompany)

    {
        return $this->collection($parentCompany->galleries, new GalleryTransformer);
    }
}