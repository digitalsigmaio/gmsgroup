<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /*
     * Fetch all device tokens from database
     *
     * @param void
     * @return array $tokens
     * */
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
