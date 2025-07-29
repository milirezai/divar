<?php

namespace System\Request\Traits;

trait HasFileValidationRules
{

    protected function fileValidation($name , $ruleArray)
    {

        foreach ($ruleArray as $rule)
        {
            if ($rule == "required")
            {
                $this->fileRequired($name);
            }
            elseif (strpos($rule, "mimes:")===0)
            {
                $rule= str_replace("mimes:", "", $rule);
                $rule= explode(",", $rule);
                $this->fileType($name, $rule);
            }
            elseif (strpos($rule, "max:")===0)
            {
                $rule= str_replace("max:", "", $rule);
                $this->maxFile($name, $rule);
            }
            elseif (strpos($rule, "min:")===0)
            {
                $rule= str_replace("min:", "", $rule);
                $this->minFile($name, $rule);
            }
        }

    }

    protected function fileRequired($name)
    {

        if (!isset($this->files[$name]['name']) or empty($this->files[$name]['name']) and $this->checkFirstError($name))
        {
            $this->setError($name, "The {$name} field should be required!");
        }

    }

    protected function fileType($name, $typesArray)
    {

        if ($this->checkFirstError($name) and $this->checkFileExist($name))
        {
            $currentFileType=explode('/',$this->files[$name]['type'][1]);
            if (!in_array($currentFileType, $typesArray))
            {
                $this->setError($name, "The {$name} format can only be ".implode(',',$typesArray)." img!");
            }
        }

    }

    protected function maxFile($name, $size)
    {

        $size= $size * 1024;
        if ($this->checkFirstError($name) and $this->checkFileExist($name))
        {
           if ($this->files[$name]['size'] > $size)
           {
               $this->setError($name, "The {$name} size should not exceed ".($size / 1024)."KB.");
           }
        }

    }

    protected function minFile($name, $size)
    {

        $size= $size * 1024;
        if ($this->checkFirstError($name) and $this->checkFileExist($name))
        {
            if ($this->files[$name]['size'] < $size)
            {
                $this->setError($name, "The {$name} size must not be less than ".($size / 1024)."KB.");
            }
        }

    }

}