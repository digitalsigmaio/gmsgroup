<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:13 AM
 */
namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'email' => $user->email
        ];
    }
}