<?php
namespace System\View\Traits;

trait HasIncludeContent
{

    private function checkIncludeContent()
    {

        while (1)
        {
            $includeNameArray = $this->findIncludesNames();
            if (!empty($includeNameArray))
            {
                foreach ($includeNameArray as $IncludeName)
                {
                    $this->initialInclude($IncludeName);
                }
            }
            else
            {
                break;
            }
        }

    }

    private function findIncludesNames()
    {
        $includesNamesArray= [];
        preg_match("/s*@include+\('([^)]+)'\)/",$this->content, $includesNamesArray);
        return isset($includesNamesArray[1]) ? $includesNamesArray[1] : false ;
    }

    private function initialInclude($IncludeName)
    {
        return $this->content = str_replace("@include('$IncludeName')",$this->viewLoader($IncludeName),$this->content);
    }

}