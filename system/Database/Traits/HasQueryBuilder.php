<?php
namespace System\Database\Traits;
use System\Database\DBConnection\DBConnection;
 
trait HasQueryBuilder
{
    private $sql= '';
    protected $where= [];
    private $orderBy= [];
    private $limit= [];
    private $values= [];
    private $bindValues= [];
    # sql
    protected function setSql($query)
    {
        $this->sql = $query;
    }
    protected function getSql()
    {
        return $this->sql;
    }
    protected function resetSql()
    {
        $this->sql = '';
    }
    # where
    protected function setWhere($operator,$condition)
    {
        $array=['operator' => $operator ,'condition' => $condition];
        array_push($this->where,$array);
    }
    protected function resetWhere()
    {
        $this->where = [];
    }
    # order By
    protected function setOrderBy($name,$expression)
    {
         array_push($this->orderBy,$this->getAttributeName($name).' '.$expression);
    }
    protected function resetOrderBy()
    {
        $this->orderBy = [];
    }
    # limit
    protected function setLimit($form,$number)
    {
        $this->limit['from']= (int) $form;
        $this->limit['number']= (int) $number;
    }
    protected function resetLimit()
    {
        unset($this->limit['from']);
        unset($this->limit['number']);
    }
    # vlaues and bindValues
    protected function addValue($attribute,$value)
    {
        $this->values[$attribute]=$value;
        array_push($this->bindValues,$value);
    }
    protected function removeValues()
    {
        $this->values= [];
        $this->bindValues= [];
    }
    # reset query
    protected function resetQuery()
    {
        $this->resetSql();
        $this->resetWhere();
        $this->resetOrderBy();
        $this->resetLimit();
        $this->removeValues();
    }
    # executeQuery
    protected function executeQuery()
    {
        $query = '';
        $query .= $this->sql;

        if(!empty($this->where)){

            $whereString = '';
            foreach($this->where as $where){
                $whereString == '' ?  $whereString .= $where['condition'] : $whereString .= ' '.$where['operator'].' '.$where['condition'];
            }
            $query .= ' WHERE '.$whereString;
        }

        if(!empty($this->orderBy)){
            $query .= ' ORDER BY '. implode(', ',$this->orderBy);
        }
        if(!empty($this->limit)){
            $query .= ' limit '.$this->limit['from'] . ' , '. $this->limit['number'].' ';
        }
        $query .= ' ;';
        $pdoInstance = DBConnection::dbConnection();
        $statement = $pdoInstance->prepare($query);
       sizeof($this->bindValues) > 0 ? $statement->execute($this->bindValues) : $statement->execute();
        return $statement;
    }
    # getCount
    protected function getCount()
    {
        $this->resetSql();
        $query = '';
        $query .= "SELECT COUNT(*) FROM ".$this->getTableName();
        # where
        if(!empty($this->where))
        {
            $whereString = '';
            foreach ($this->where as $where) 
            {
                $whereString == '' ? $whereString=$where['condition'] : $whereString.' '.$where['operator'].' '.$where['condition'];
            }
            $query .= ' WHERE '.$whereString;
        }
        $query .= ' ;';
        $dbConnection=DBConnection::dbConnection();
        $statement=$dbConnection->prepare($query);
        # bindValues
        if(sizeof($this->bindValues) > sizeof($this->values))
        {
            sizeof($this->bindValues) > 0 ? $statement->execute($this->bindValues) : $statement->execute();
        }
        else
        {
            sizeof($this->values) > 0 ? $statement->execute(array_values($this->values)) : $statement->execute();
        }
        return $statement->fetchColumn();
    }
    protected function getTableName()
    {
        return '`'.$this->table.'`';
    }
    protected function getAttributeName($attribute)
    {
        return '`'.$this->table.'`.`'.$attribute.'` ';
    }
}