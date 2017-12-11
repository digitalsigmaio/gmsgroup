<?php

namespace App;


use App\Traits\Orderable;


class News extends GMS
{
    use Orderable;
    protected $table = 'news';
    protected $attributes = [
        'image' => '/img/default.png',
        'parent_company_id' => 1
    ];
}
