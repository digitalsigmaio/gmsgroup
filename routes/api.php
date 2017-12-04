<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', 'UserController@store');

Route::group(['prefix' => 'parents'], function (){
        Route::post('/', 'ParentCompany\ParentCompanyController@store')->middleware('auth:api');
        Route::get('/', 'ParentCompany\ParentCompanyController@index');
});

Route::group(['prefix' => 'children'], function (){
    Route::get('/', 'Child\ChildController@index');
    Route::get('/{child}', 'Child\ChildController@show');
});

Route::group(['prefix' => 'products'], function (){
    Route::get('/', 'Product\ProductController@index');
    Route::get('/{product}', 'Product\ProductController@show');
});

Route::group(['prefix' => 'services'], function (){
    Route::get('/', 'Service\ServiceController@index');
    Route::get('/{service}', 'Service\ServiceController@show');
});

Route::group(['prefix' => 'projects'], function (){
    Route::get('/', 'Project\ProjectController@index');
    Route::get('/{project}', 'Project\ProjectController@show');
});

Route::group(['prefix' => 'clients'], function (){
    Route::get('/', 'Client\ClientController@index');
    Route::get('/{client}', 'Client\ClientController@show');
});

Route::group(['prefix' => 'news'], function (){
    Route::get('/', 'News\NewsController@index');
    Route::get('/{news}', 'News\NewsController@show');
});

Route::group(['prefix' => 'socials'], function (){
    Route::get('/', 'Social\SocialController@index');
    Route::get('/{social}', 'Social\SocialController@show');
});

Route::group(['prefix' => 'galleries'], function (){
    Route::get('/', 'Gallery\GalleryController@index');
    Route::get('/{gallery}', 'Gallery\GalleryController@show');
});

