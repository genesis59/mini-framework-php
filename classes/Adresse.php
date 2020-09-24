<?php

class Adresse {
    private $street;
    private $zipCode;
    private $city;

    public function __construct(array $data){
        if(count($data) > 0 && isset($data['street']) && isset($data['zipCode']) && isset($data['city'])){
            $this->setStreet($data['street']);
            $this->setZipCode($data['zipCode']);
            $this->setCity($data['city']);
        }
    }

    public function getStreet(){
        return $this->street;
    }
    public function getZipCode(){
        return $this->zipCode;
    }
    public function getCity(){
        return $this->city;
    }
    public function setStreet($value){
        if(trim($value) != ""){
            $this->street = $value;
            return $this;
        }
        
    }
    public function setZipCode($value){
        if(trim($value) != ""){
            $this->zipCode = $value;
            return $this;
        }
        
    }
    public function setCity($value){
        if(trim($value) != ""){
            $this->city = $value;
            return $this;
        }
        
    }
    public function __toString(){
        return "<p>Vous habitez <strong>" . $this->street . "</strong> à <strong>" . 
        $this->city . "</strong>. Son code postal est le " . $this->zipCode . "</p>";
    }

}