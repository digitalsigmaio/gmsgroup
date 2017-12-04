<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    public function transform(News $news)
    {
        return [
            'id'          => $news->id,
            'ar_title' => $news->ar_title,
            'en_title' => $news->en_title,
            'ar_body'  => $news->ar_body,
            'en_body'  => $news->en_body,
            'image'    => $news->image,
            'created_at' => $news->created_at->toDateTimeString(),
            'created_at_humans' => $news->created_at->diffForHumans(),
        ];
    }


}