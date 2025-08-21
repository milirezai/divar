<?php
namespace System\Console\Factory\Templates;
class Make
{
    public static function move($path, $template, $search, $replace)
    {
        $file = file_put_contents($path,self::template($template, $search, $replace));
        return true;
    }
    private static function template($path, $search, $replace)
    {
        $arrayPath = explode(".",$path);
        $directory=$arrayPath[0];
        $file=$arrayPath[1].'.php';
        $template = dirname(__DIR__)."/Templates/".$directory.'/'.$file;
        $template = file_get_contents($template);
        return self::replace($template, $search, $replace);
    }
    private static function replace($template, $serch, $replace)
    {
        return $replace = str_replace($serch, $replace, $template);
    }
}
