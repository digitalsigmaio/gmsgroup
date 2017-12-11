<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GMS extends Model
{

    public function uploadLogo(Request $request)
    {
        if($request->hasFile('logo')){
        $logo = $request->file('logo');

        $filename = strtolower(class_basename($this)) . '_' . $this->id . '.' . $logo->getClientOriginalExtension();
        $path = 'img/' . strtolower(class_basename($this));
        $logo->move($path, $filename);
        $uri = $path . '/' . $filename;

        $this->logo = $uri;
        $this->save();
        }
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');

            $filename = strtolower(class_basename($this)) . '_' . $this->id . '.' . $image->getClientOriginalExtension();
            $path = 'img/' . strtolower(class_basename($this));
            $image->move($path, $filename);
            $uri = $path . '/' . $filename;

            $this->image = $uri;
            $this->save();
        }
    }
}
