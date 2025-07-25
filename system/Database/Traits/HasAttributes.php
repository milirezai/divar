<?php
namespace System\Database\Traits;

trait  HasAttributes
 {
    # registerAttribute
     private function registerAttribute($object , string $attribute , $value)
     {
         $this->inCastsAttributes($attribute) == true ? $object->$attribute = $this->castDecodeValue($attribute,$value) : $object->$attribute=$value;
     }
     # arrayToAttributes
     protected function arrayToAttributes(array $array , $object = null)
     {
         if (!$object)
         {
             $className=get_called_class();
             $object=new $className();
         }
         foreach ($array as $attribute => $value)
         {
             if ($this->inHiddenAttributes($attribute))
                 continue;
             $this->registerAttribute($object,$attribute,$value);
         }
         return $object;
     }
     # arrayToObjects
     protected function arrayToObjects(array $array)
     {
         $collection= [];
         foreach ($array as $value)
         {
             $object=$this->arrayToAttributes($value);
             array_push($collection,$object);
         }
         $this->collection=$collection;
     }
     # inHiddenAttributes
     private function inHiddenAttributes($attribute)
     {
         return in_array($attribute,$this->hidden);
     }
     # inCastsAttributes
     private function inCastsAttributes($attribute)
     {
         return in_array($attribute,array_keys($this->casts));
     }
     # castDecodeValue
     private function castDecodeValue($attributeKey , $value)
     {
         if ($this->casts[$attributeKey] == 'array' or $this->casts[$attributeKey] == 'object')
         {
             return unserialize($value);
         }
         return $value;
     }
     # castEncodeValue
     private function castEncodeValue($attributeKey , $value)
     {
         if ($this->casts[$attributeKey] == 'array' or $this->casts[$attributeKey] == 'object')
         {
             return serialize($value);
         }
         return $value;
     }
     # arrayToCastEncodeValue
     private function arrayToCastEncodeValue($values)
     {
         $newArray= [];
         foreach ($values as $attribute => $value)
         {
             $this->inCastsAttributes($attribute) == true ? $newArray[$attribute] = $this->castEncodeValue($attribute,$value) : $newArray[$attribute] = $value ;
         }
         return $newArray;
     }
 }