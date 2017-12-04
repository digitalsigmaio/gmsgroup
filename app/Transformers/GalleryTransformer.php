<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Gallery;
use League\Fractal\TransformerAbstract;

class GalleryTransformer extends TransformerAbstract
{

    public function transform(Gallery $gallery)
    {
        return [
            'id'             => $gallery->id,
            'ar_title'       => $gallery->ar_title,
            'en_title'       => $gallery->en_title,
            'ar_description' => $gallery->ar_description,
            'en_description' => $gallery->en_description,
            'image'          => $gallery->image,
        ];
    }

}