<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 10:58 AM
 */
namespace App\Traits;


trait Orderable
{
    public function scopeOldestFirst($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}