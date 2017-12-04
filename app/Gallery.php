<?php

namespace App;



class Gallery extends GMS
{
    protected $attributes = [
        'image' => self::ROOT . '/img/default.png',
        'parent_company_id' => 1
    ];
}
