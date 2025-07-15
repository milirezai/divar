<?php

namespace System\Database\Traits;
trait HasRelation
{
    # hasOneMethod
    protected function hasOne($model, $foreignKey, $localKey)
    {

        if ($this->{$this->primaryKey})
        {
            $modelObject= new $model;
            return $modelObject->getHaseOneRelation($this->table, $foreignKey, $localKey, $this->$localKey);
        }

    }
    # getHaseOneRelationMethod
    public function getHaseOneRelation($table, $foreignKey, $otherKey, $otherKeyValue)
    {
        $this->setSql("SELECT `b`.* FROM `{$table}` AS `a` JOIN ".$this->getTableName()." AS `b` ON `a`.`{$otherKey}` = `b`.`{$foreignKey}` ");
        $this->setWhere("AND", " `a`.`{$otherKey}` = ? ");
        $this->table= 'b';
        $this->addValue($otherKey,$otherKeyValue);
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToAttributes($data);
        }
        return [];
    }
}
