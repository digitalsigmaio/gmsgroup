<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Social;
use League\Fractal\TransformerAbstract;

class SocialTransformer extends TransformerAbstract
{

    public function transform(Social $social)
    {
        return [
            'id'      => $social->id,
            'name' => $social->name,
            'url'     => $social->url,
            'logo'    => $social->logo,
        ];
    }


}