<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 1/18/2018
 * Time: 2:22 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploader
{
    private $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];

    private $subdomain = '/gmsgroup/';
    /*
     * Upload image and save it on server with unique name
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     * */
    public function uploadImage(Request $request)
    {
        if($request->file('image')->isValid()){
            $image = $request->file('image');

            if(in_array($image->getClientMimeType(), $this->allowedMimeTypes)) {

                if ($image->getClientSize() <= 1000000) {
                    $classname = strtolower(class_basename($this));
                    $filename = $classname . '_' . $this->id . '.' . $image->getClientOriginalExtension();
                    $path = 'img/' . $classname;
                    $image->move($path, $filename);
                    $uri = $this->subdomain . $path . '/' . $filename;

                    $this->image = $uri;
                    $this->save();
                } else {
                    return redirect()->back()->withErrors(['Image is too large']);
                }
            } else {
                return redirect()->back()->withErrors(['Invalid image type']);
            }
        }

        return redirect()->back()->withErrors(['File is not valid']);
    }
}