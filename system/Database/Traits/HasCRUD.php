<?php
namespace System\Database\Traits;
use System\Database\DBConnection\DBConnection;
trait HasCRUD
{
    # allMethod
    protected function all()
    {
        $this->setSql("SELECT * FROM ".$this->getTableName());
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToAttribute($data);
            return $this->collection;
        }
        return [];
    }
    # deleteMethod
    protected function delete($id = null)
    {
        $object= $this;
        $this->resetQuery();
        if ($id)
        {
            $object=$this->find($id);
            $this->resetQuery();
        }
        $object->setSql("DELETE FORM ".$object->getTableName());
        $object->setWhere("AND",$this->getAttributeName($this->primaryKey)."= ?");
        $object->addValue($object->primaryKey,$object->{$object->primaryKey});
        return $object->executeQuery();
    }
    # saveMethod
    protected function save()
    {
        $fileString= $this->fill();
        if (!isset($this->{$this->primaryKey}))
        {
            $this->setSql("INSERT INTO ".$this->getTableName()." SET  $fileString, ".$this->getAttributeName($this->createdAT)."= NOW()");
        }
        else
        {
            $this->setSql("UPDATE ".$this->getTableName()." SET  $fileString, ".$this->getAttributeName($this->updatedAT)."= NOW()");
            $this->setWhere("AND",$this->getAttributeName($this->primaryKey)."= ?");
            $this->addValue($this->primaryKey,$this->{$this->primaryKey});
        }
        $this->executeQuery();
        $this->resetQuery();
        if (!isset($this->{$this->primaryKey}))
        {
            $object = $this->find(DBConnection::newInsertId());
            $defaultVars = get_class_vars(get_called_class());
            $allVars = get_object_vars($object);
            $differentVars = array_diff(array_keys($allVars), array_keys($defaultVars));
            foreach ($differentVars as $attribute)
            {
                $this->inCastsAttributes($attribute) == true ?$this->registerAttribute($this,$attribute,$this->castEncodeValue($attribute,$object->$attribute)):$this->registerAttribute($this,$attribute,$object->$attribute);
            }
        }
        $this->resetQuery();
        $this->setAllowedMethods(["update","delete","find"]);
        return $this;
    }
    # fill
    protected function fill()
    {
        $fileArray= [];
        foreach ($this->fillable as $attribute)
        {
            if (isset($this->$attribute))
            {
                array_push($fileArray,$this->getAttributeName($attribute)."= ?");
                $this->inCastsAttributes($attribute) == true ? $this->addValue($attribute,$this->castEncodeValue($attribute,$this->$attribute)) : $this->addValue($attribute,$this->$attribute);
            }
        }
        $fileString=implode(",",$fileArray);
        return $fileString;
    }
}