<?php
namespace App\Http\Services;

use Intervention\Image\ImageManager;

class Upload
{
    public static function image($file, $path, $name, $width, $height)
    {
        $path = trim($path, "\/")."/";
        $name = trim($name,"\/").".".pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!is_dir($path)) # check directory exists yes or no
        {
            if (!mkdir($path, 0777, true)) # create a directory
            {
                die("Could not create photo path!!!");
            }
        }
        is_writable($path);  # برسی اینگه این مسیر قابل نوشتن هستن یا ن
        $manager = new ImageManager(['driver' => 'GD']);
        $image = $manager->make($file['tmp_name'])->fit($width,$height);
        $image->save($path.$name);
        return "/".$path.$name;
    }
}