<?php
namespace System\Database\Traits;
use System\Database\DBConnection\DBConnection;
trait HasCRUD
{
    # createMethod
    protected  function createMethod($values)
    {
        $values= $this->arrayToCastEncodeValue($values);
        $this->arrayToAttributes($values,$this);
        return $this->saveMethod();
    }
    # updateMethod
    protected function updateMethod($values)
    {
        $values= $this->arrayToCastEncodeValue($values);
        $this->arrayToAttributes($values,$this);
        return $this->saveMethod();
    }
    # whereMethod
    protected function whereMethod($attribute,$firestValue,$secondValue = null)
    {
        if ($secondValue === null)
        {
            $condition= $this->getAttributeName($attribute)."= ?";
            $this->addValue($attribute,$firestValue);
        }
        else
        {
            $condition= $this->getAttributeName($attribute)." ".$firestValue." ?";
            $this->addValue($attribute,$secondValue);
        }
        $operator= "AND";
        $this->setWhere($operator,$condition);
        $this->setAllowedMethods(["wher","wherOr","wherIn","wherNull","wherNotNull","limit","orderBy","get","paginate"]);
        return $this;
    }
    # whereOrMethod
    protected function whereOrMethod($attribute,$firestValue,$secondValue = null)
    {
        if ($secondValue === null)
        {
            $condition= $this->getAttributeName($attribute)."= ?";
            $this->addValue($attribute,$firestValue);
        }
        else
        {
            $condition= $this->getAttributeName($attribute)." ".$firestValue." ?";
            $this->addValue($attribute,$secondValue);
        }
        $operator= "OR";
        $this->setWhere($operator,$condition);
        $this->setAllowedMethods(["wher","wherOr","wherIn","wherNull","wherNotNull","limit","orderBy","get","paginate"]);
        return $this;
    }
    # whereNullMethod
    protected function whereNullMethod($attribute)
    {
        $condition= $this->getAttributeName($attribute)."IS NULL";
        $operator= "AND";
        $this->setWhere($operator,$condition);
        $this->setAllowedMethods(["wher","wherOr","wherIn","wherNull","wherNotNull","limit","orderBy","get","paginate"]);
        return $this;
    }
    # whereNotNullMethod
    protected function whereNotNullMethod($attribute)
    {
        $condition= $this->getAttributeName($attribute)." IS NOT NULL";
        $operator= "AND";
        $this->setWhere($operator,$condition);
        $this->setAllowedMethods(["wher","wherOr","wherIn","wherNull","wherNotNull","limit","orderBy","get","paginate"]);
        return $this;
    }
    # whereInMethod
    protected function whereINMethod($attribute,$values)
    {
        if (is_array($values))
        {
            $valuesArray= [];
            foreach ($values as $value)
            {
                $this->addValue($attribute,$value);
                array_push($valuesArray,"?");
            }
            $condition= $this->getAttributeName($attribute)." IN (".implode(" , ",$valuesArray).")";
            $operator= "AND";
            $this->setWhere($operator,$condition);
            $this->setAllowedMethods(["wher","wherOr","wherIn","wherNull","wherNotNull","limit","orderBy","get","paginate"]);
            return $this;
        }
    }
    # orderByMethod
    protected function orderByMethod($attribute,$expression)
    {
        $this->setOrderBy($attribute,$expression);
        $this->setAllowedMethods(["limit","orderBy","get","paginate"]);
        return $this;
    }
    # limitMethod
    protected function limitMethod($from,$number)
    {
        $this->setLimit($from,$number);
        $this->setAllowedMethods(["limit","get","paginate"]);
        return $this;
    }
    # getMethod
    protected function getMethod($array = [])
    {
        if ($this->sql == '')
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
            $this->setSql("SELECT $fields FROM ".$this->getTableName());
        }
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToObjects($data);
            return $this->collection;
        }
        return [];
    }
    # paginateMethod
    protected function paginateMethod($perPage)
    {
        $totalRows = $this->getCount();
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalPages = ceil($totalRows / $perPage);
        $currentPage = min($currentPage, $totalPages);
        $currentPage = max($currentPage, 1);
        $currentRow = ($currentPage - 1) * $perPage;
        $this->setLimit($currentRow, $perPage);
        if($this->sql == ''){
            $this->setSql("SELECT ".$this->getTableName().".* FROM ".$this->getTableName());
        }
        $statement = $this->executeQuery();
        $data = $statement->fetchAll();
        if ($data){
           $this->arrayToObjects($data);
           return $this->collection;
        }
        return [];
    }
    # findMethod
    protected function findMethod($id)
    {
        $this->setSql("SELECT * FROM ".$this->getTableName());
        $this->setWhere("AND",$this->getAttributeName($this->primaryKey)."= ?");
        $this->addValue($this->primaryKey,$id);
        $statement=$this->executeQuery();
        $data=$statement->fetch();
        $this->setAllowedMethods(["update","delete","find"]);
        if ($data)
        {
            return $this->arrayToAttributes($data);
        }
        return null;
    }
    # allMethod
    protected function allMethod()
    {
        $this->setSql("SELECT * FROM ".$this->getTableName());
        $statement=$this->executeQuery();
        $data=$statement->fetchAll();
        if ($data)
        {
            $this->arrayToObjects($data);
            return $this->collection;
        }
        return [];
    }
    # deleteMethod
    protected function deleteMethod($id = null)
    {
        $object= $this;
        $this->resetQuery();
        if ($id)
        {
            $object=$this->findMethod($id);
            $this->resetQuery();
        }
        $object->setSql("DELETE FROM ".$object->getTableName());
        $object->setWhere("AND",$this->getAttributeName($object->primaryKey)."= ?");
        $object->addValue($object->primaryKey,$object->{$object->primaryKey});
        return $object->executeQuery();
    }
    # saveMethod
    protected function saveMethod()
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
            $object = $this->findMethod(DBConnection::newInsertId());
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
                if ($this->$attribute === ''){
                    $this->$attribute = null;
                }
                array_push($fileArray,$this->getAttributeName($attribute)."= ?");
                $this->inCastsAttributes($attribute) == true ? $this->addValue($attribute,$this->castEncodeValue($attribute,$this->$attribute)) : $this->addValue($attribute,$this->$attribute);
            }
        }
        $fileString=implode(",",$fileArray);
        return $fileString;
    }
}