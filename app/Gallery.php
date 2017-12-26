<?php

namespace App;



class Gallery extends GMS
{
    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'image' => '/img/default.png',
        'parent_company_id' => 1
    ];

    /*
     * Constant value for Arabic tagline
     *
     * @var string
     * */
    const AR_TAGLINE = "نمتلك أستديوهات على أعلى مستوى مجهزة بأحدث الأجهزة التصويرية و السمعية لننقل إليكم محتوى ذات دقة عالية لمشاهدة ممتعة فلدينا فريق متكامل من المصورين المونتيرين و مهندسي الصوت";

    /*
     * Constant value for English tagline
     *
     * @var string
     * */
    const EN_TAGLINE = "";
}
