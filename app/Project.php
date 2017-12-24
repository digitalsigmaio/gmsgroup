<?php

namespace App;



class Project extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];
    const AR_TAGLINE = "";
    const EN_TAGLINE = "";

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }
}
