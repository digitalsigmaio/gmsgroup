<?php

namespace App;



class ParentCompany extends GMS
{
    /*
     * Table name related to ParentCompany model
     *
     * @var string
     * */
    protected $table = 'parents';

    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'logo' => '/img/default.png',
    ];

    /*
     * Assign relation with Child class
     *
     * @param void
     * @return collection App\Child
     * */
    public function children()
    {
        return $this->hasMany(Child::class);
    }

    /*
     * Assign relation with Product class
     *
     * @param void
     * @return collection App\Product
     * */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /*
     * Assign relation with Service class
     *
     * @param void
     * @return collection App\Service
     * */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /*
     * Assign relation with Project class
     *
     * @param void
     * @return collection App\Project
     * */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /*
     * Assign relation with Client class
     *
     * @param void
     * @return collection App\Client
     * */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /*
     * Assign relation with News class
     *
     * @param void
     * @return collection App\News
     * */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /*
     * Assign relation with Social class
     *
     * @param void
     * @return collection App\Social
     * */
    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    /*
     * Assign relation with Gallery class
     *
     * @param void
     * @return collection App\Gallery
     * */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
