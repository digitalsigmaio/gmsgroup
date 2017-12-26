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
    /*
     * Order fetched data by creation time ascending
     *
     * @param array $query
     * @return array
     * */
    public function scopeOldestFirst($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    /*
     * Order fetched data by creation time descending
     *
     * @param array $query
     * @return array
     * */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}