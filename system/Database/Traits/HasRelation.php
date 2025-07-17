<?php

namespace System\Database\Traits;
trait HasRelation
{
    # hasOneMethod
    protected function hasOne($model, $foreignKey, $localKey)
    {

        if ($this->{$this->primaryKey})
        {
            $modelObject= new $model();
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
        return null;
    }
    # hasManyMethod
    protected function hasMany($model, $foreignKey, $otherKey)
    {

        if ($this->{$this->primaryKey})
        {
            $modelObject= new $model();
            return $modelObject->getHaseManyRelation($this->table, $foreignKey, $otherKey, $this->$otherKey);
        }

    }
    # getHaseManyRelationMethod
    public function getHaseManyRelation($table, $foreignKey, $otherKey, $otherKeyValue)
    {
        $this->setSql("SELECT `b`.* FROM `{$table}` AS `a` JOIN ".$this->getTableName()." AS `b` ON `a`.`{$otherKey}` = `b`.`{$foreignKey}` ");
        $this->setWhere("AND", " `a`.`{$otherKey}` = ? ");
        $this->table= 'b';
        $this->addValue($otherKey,$otherKeyValue);
        return $this;
    }
    # belongsToMethod
    protected function belongsTo($model, $foreignKey, $localKey)
    {
        if ($this->{$this->primaryKey})
        {
            $modelObject= new $model();
            return $modelObject->getBelongsToRelation($this->table, $foreignKey, $localKey, $this->$foreignKey);
        }
    }
    # getBelongsToRelationMethod
    public function getBelongsToRelation($table, $foreignKey, $otherKey, $foreignKeyValue)
    {
        $this->setSql("SELECT `b`.* FROM `{$table}` AS `a` JOIN ".$this->getTableName()." AS `b` ON `a`.`{$foreignKey}` = `b`.`{$otherKey}` ");
        $this->setWhere("AND", " `a`.`{$foreignKey}` = ? ");
        $this->table= 'b';
        $this->addValue($foreignKey,$foreignKeyValue);
        $statement=$this->executeQuery();
        $data=$statement->fetch();
        if ($data)
        {
             return $this->arrayToAttributes($data);
        }
        return null;
    }
    # belongsToManyMethod
    protected function belongsToMany($model, $commonTable, $localKey, $middleForeignKey, $middleRelation, $foreignKey )
    {        
        if($this->{$this->primaryKey})
        {
            $modelObject = new $model();
            return $modelObject->getBelongsToManyRelation($this->table, $commonTable , $localKey, $this->$localKey, $middleForeignKey, $middleRelation, $foreignKey);
        }
    }
    # getBelongsToManyRelationMethod
    protected function getBelongsToManyRelation($table, $commonTable, $localKey, $localKeyValue, $middleForeignKey, $middleRelation, $foreignKey)
    {
        $this->setSql("SELECT `c`.* FROM ( SELECT `b`.* FROM `{$table}` AS `a` JOIN `{$commonTable}` AS `b` on `a`.`{$localKey}` = `b`.`{$middleForeignKey}` WHERE  `a`.`{$localKey}` = ? ) AS `relation` JOIN ".$this->getTableName()." AS `c` ON `relation`.`{$middleRelation}` = `c`.`$foreignKey`");
        $this->addValue("{$table}_{$localKey}", $localKeyValue);
        $this->table = 'c';
        return $this;
    }
}
