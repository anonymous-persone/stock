<?php 

use Intervention\Image\Facades\Image;

function arrayToModels($model, $data)
{
    foreach($data as $key => $value) {
    	$data[$key] = new $model($value);
    }
    return $data;
}


function uploadImageBase64($image, $directory)
{
    // get extension
    $pos  = strpos($image, ';');
    $extension = explode('/', substr($image, 0, $pos))[1];
    // path
    $pngTitle = time().'-'.str_random(10).'.'.$extension;
    $path = $directory.$pngTitle;
    // save image content in file
    Image::make(file_get_contents($image))->save(public_path().$path);
    return $path;
}