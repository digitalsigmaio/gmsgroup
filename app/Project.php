<?php

namespace App;



class Project extends GMS
{
    /*
     * Default values for attributes
     *
     * @val array
     * */
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];

    /*
     * Constant value for Arabic tagline
     *
     * @var string
     * */
    const AR_TAGLINE = "داخل GMS Group مشروعات باختلاف مجال كل شركة فمنهاالتعليمي و الترفيهي";

    /*
     * Constant value for English tagline
     *
     * @var string
     * */
    const EN_TAGLINE = "Within GMS Group projects with each company's domain Educational and recreational";

    /*
     * Assign a relation with ProjectImage class
     *
     * @param void
     * @return collection App\ProjectImage
     * */
    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }
}
