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
    # allMethod
    protected function allMethod()
    {
        $this->setSql("SELECT ".$this->getTableName().".* FROM ".$this->getTableName());
        $this->setWhere("AND",$this->getAttributeName($this->deletedAT)."= IS NULL");
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToAttributes($data);
            return $this->collection;
        }
        return [];
    }
    # findMethod
    protected function findMethod($id)
    {
        $this->resetQuery();
        $this->setSql("SELECT ".$this->getTableName().".* FROM ".$this->getTableName());
        $this->setWhere("AND",$this->getAttributeName($this->primaryKey)."= ?");
        $this->addValue($this->primaryKey,$id);
        $this->setWhere("AND",$this->getAttributeName($this->deletedAT)."= IS NULL");
        $statement=$this->executeQuery();
        $data=$statement->fetch();
        $this->setAllowedMethods(["update","delete","find"]);
        if ($data)
        {
            return $this->arrayToAttributes($data);
        }
        return null;
    }
    # getMethod
    protected function getMethod($array = [])
    {
        if ($this->sql)
        {
            if (empty($array))
            {
                $fields=$this->getTableName().".*";
            }
            else
            {
                foreach ($array as $key => $fields)
                {
                    $array[$key] = $this->getAttributeName($fields);
                }
                $fields=implode(",",$array);
            }
            $this->setSql("SELECT $fields".$this->getTableName());
        }
        $this->setWhere("AND",$this->getAttributeName($this->deletedAT)."= IS NULL");
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToAttributes($data);
            return $this->collection;
        }
        return [];
    }
    # paginateMethod
    protected function paginate($perPage)
    {
        $this->setWhere("AND",$this->getAttributeName($this->deletedAT)."= IS NULL");
        $totalRows= $this->getCount();
        $currentPage= isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalPages=ceil($totalRows / $perPage);
        $currentPage= min($currentPage , $totalPages);
        $currentPage= max($currentPage , 1);
        $currentRow= ($currentPage - 1) * $perPage;
        $this->setLimit($currentRow , $perPage);
        if ($this->sql == "")
        {
            $this->setSql("SELECT ".$this->getTableName().".* ".$this->getTableName());
        }
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToAttributes($data);
            return $this->collection;
        }
        return [];
    }
}
