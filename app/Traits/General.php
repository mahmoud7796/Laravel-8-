<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Image;
use PhpParser\Builder\Trait_;

Trait General
{
    function SaveImage($image, $path){
        $imagName = $image -> move($path,$image->hashName());
        return $imagName;
    }

    function SaveImageResize($image, $path,$w,$h){
        Image::make($image)->resize($w,$h)->save($path.$image-> hashName());
        return $path.$image-> hashName();
    }

    function DeleteImage($imageUrl,$searchAfter, $path){
        $strImage = Str::after($imageUrl, $searchAfter);
        $image = public_path($path.$strImage);
       return unlink($image);
    }
}


