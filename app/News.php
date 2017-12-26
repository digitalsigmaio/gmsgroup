<?php

namespace App;


use App\Traits\Orderable;


class News extends GMS
{
    use Orderable;
    /*
     * Table related to the model
     *
     * @var string
     * */
    protected $table = 'news';

    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'image' => '/img/default.png',
        'parent_company_id' => 1
    ];
}
