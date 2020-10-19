<?php


namespace App\library;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadImage
{
    public function saveImage($request, $fileName) {
        $image = $request->file($fileName);
        $name = str::slug($request->input('title')) . '_' . time();
        $filePath =  '/' . $name . '.' . $image->getClientOriginalExtension();
        $request->$fileName->move(public_path('images'), $filePath);
        $imageSize = getimagesize(public_path('images' . $filePath));
        $imageCompress = Image::make(public_path('images' . $filePath))->fit(round($imageSize[0] / 1.6), round($imageSize[1] / 1.6));;
        $imageCompress->save();
        return $filePath;
    }
}
