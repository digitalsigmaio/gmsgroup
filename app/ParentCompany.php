<?php

namespace App;



class ParentCompany extends GMS
{
    protected $table = 'parents';
    protected $attributes = [
        'logo' => '/img/default.png',
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
