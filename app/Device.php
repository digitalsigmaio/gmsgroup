<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected static function tokens()
    {
        $devices = Device::all();
        $tokens = [];
        foreach ($devices as $device) {
            $tokens[] = $device->token;
        }


        return $tokens;
    }
}
