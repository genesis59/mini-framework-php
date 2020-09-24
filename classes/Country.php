<?php

class Country {
    private $id;
    private $code;
    private $name;

    public function __construct($id,$code,$name){
        $this->setId($id);
        $this->setCode($code);
        $this->setName($name);
    }
    /*****  GETTERS ******/
    public function getId(){
        return $this->id;
    }
    public function getCode(){
        return $this->code;
    }
    public function getName(){
        return $this->name;
    }
    /*****  SETTERS ******/
    public function setId($value){
        if(!is_int($value)){
            throw new InvalidArgumentException("L' id doit être un entier"); 
        }
        $this->id = $value;
        return $this;
    }
    public function setCode($value){
        if(!is_int($value)){
            throw new InvalidArgumentException("Le code doit être un entier"); 
        }
        $this->code = $value;
        return $this;
    }
    public function setName($value){
        if(trim($value) == ""){
            throw new InvalidArgumentException("Le nom ne peut être vide"); 
        }
        $this->name = $value;
        return $this;
    }

    public function __toString(){
        return $this->name. " (" . $this->code . ")";
    }
}