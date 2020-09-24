<?php

class Student extends Person{
    protected $school;

    public function __construct(array $data = []){
        if(isset($data["school"])){
            $this->school = $data["school"];
        }
        parent::__construct($data);
    }

    public function getSchool(){
        return $this->school;
    }
    public function setSchool($value){
        $this->school = $value;
    }
    public function greet(){
        $greeting = parent::greet();
        $greeting .= "Vous étudiez à " . $this->school;
        return "<p>" . $greeting . "</p>";
    }
}