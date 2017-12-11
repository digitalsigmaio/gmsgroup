<?php

namespace App;



class Service extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_service');
    }
}
