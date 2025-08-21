<?php

namespace System\Service\Support\Upload;

use Intervention\Image\ImageManager;

class Upload
{
    private static $imageDriver = ['driver' => 'GD'];

    protected static function managingImageUploads($file, $name, $path, $width = null, $height = null)
    {
        $managing = new ImageManager(self::$imageDriver);
        $image = $managing->make($file['tmp_name']);
        if ($width != null and $height != null)
        {
            $image->fit($width,$height);
        }
        $image->save($path.$name);
        return $path.$name;
    }
}
