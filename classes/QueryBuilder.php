<?php

class QueryBuilder {
    protected $commandValue;
    protected $fromValue;
    protected $whereValues = [];
    /**
     * @return QueryBuilder
     */
    public function select(string $value){
        $this->commandValue = "SELECT $value";
        return $this;
    }
    /**
     * @return QueryBuilder
     */
    public function from(string $value){
        $this->fromValue = "FROM $value";
        return $this;
    }
    public function where(array $values){
        foreach($values as $key => $item){
            if($key == 0){
                $this->whereValues .= " WHERE " . $item;
            } else {
                $this->whereValues .= " AND " . $item;
            }
        }
        return $this;
    }
    public function getSQL(){
        
        return $this->commandValue . " " . $this->fromValue . $this->whereValues;
        
        
    }
}