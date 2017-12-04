<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Child;
use League\Fractal\TransformerAbstract;

class ChildTransformer extends TransformerAbstract
{

    public function transform(Child $child)
    {
        return [
            'id'             => $child->id,
            'ar_name'        => $child->ar_name,
            'en_name'        => $child->en_name,
            'ar_description' => $child->ar_description,
            'en_description' => $child->en_description,
            'logo'           => $child->logo,
        ];
    }


}