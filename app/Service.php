<?php

namespace App;



class Service extends GMS
{
    protected $attributes = [
        'logo' => '/img/default.png',
        'parent_company_id' => 1
    ];
    const AR_TAGLINE = "خدماتنا في الاستثمار فى تكنولوجيا المعلومات , الانتاج , و تطبيقات الهاتف و المحتوى الرقمى بالإضافة إلى التجارة الإلكترونية";
    const EN_TAGLINE = "";

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_service');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
}
