<?php
namespace System\Database\Traits;

trait HasSoftDelete
{
    # deleteMethod
    protected function deleteMethod($id = null)
    {
        $object= $this;
        if ($id)
        {
            $this->resetQuery();
            $object=$this->findMethod($id);
        }
        if ($object)
        {
            $object->resetQuery();
            $object->setSql("UPDATE ".$object->getTableName()." SET ".$object->getAttributeName($object->deletedAT)." = NOW()");
            $object->setWhere("AND",$this->getAttributeName($object->primaryKey)."= ?");
            $object->addValue($object->primaryKey,$object->{$object->primaryKey});
            return $object->executeQuery();
        }
    }
}
