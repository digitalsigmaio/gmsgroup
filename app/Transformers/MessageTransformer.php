<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Message;
use League\Fractal\TransformerAbstract;

class MessageTransformer extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
            'id'    => $message->id,
            'title' => $message->title,
            'body'  => $message->body,
            'tel'   => $message->tel,
            'email' => $message->email,
            'created_at' => $message->created_at->toDateTimeString(),
            'created_at_humans' => $message->created_at->diffForHumans(),
        ];
    }


}