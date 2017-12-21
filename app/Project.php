<?php

namespace App;



class Project extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }
}
