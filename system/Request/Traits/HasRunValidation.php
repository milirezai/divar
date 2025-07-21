<?php

namespace System\Request\Traits;

trait HasRunValidation
{

    protected function errorRedirect()
    {

        if ($this->errorExist == false)
        {
            return $this->request;
        }
        return back();

    }

    private function checkFirstError($name)
    {

        if (!errorExist($name) and !in_array($name, $this->errorVariablesName))
        {
            return true;
        }
        return false;

    }

    private function checkFieldExist($name)
    {
        return (isset($this->request[$name]) and !empty($this->request[$name])) ? true : false;
    }

    private function checkFileExist($name)
    {

        if (isset($this->files[$name]['name']))
        {
            if (!empty($this->files[$name]['name']))
            {
                return true;
            }
        }
        return false;

    }

    private function setError($name, $errorMsg)
    {
        array_push($this->errorVariablesName, $name);
        error($name,$errorMsg);
        $this->errorExist = true;
    }

}