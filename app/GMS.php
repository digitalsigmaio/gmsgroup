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
        $classname = strtolower(class_basename($this));
        $filename = $classname . '_' . $this->id . '.' . $logo->getClientOriginalExtension();
        $path = 'img/' . $classname;
        $logo->move($path, $filename);
        $uri = '/gmsgroup/' . $path . '/' . $filename;

        $this->logo = $uri;
        $this->save();
        }
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $classname = strtolower(class_basename($this));
            $filename = $classname . '_' . $this->id . '.' . $image->getClientOriginalExtension();
            $path = 'img/' . $classname;
            $image->move($path, $filename);
            $uri = '/gmsgroup/' . $path . '/' . $filename;

            $this->image = $uri;
            $this->save();
        }
    }
}
