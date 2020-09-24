<?php

class Person {

    const COLOR_BLUE = "#00ffff";
    const COLOR_GREEN = "#00ff00";

    public static $numberOfIntances = 0;

    private $name;
    private $gender;
    private $eyeColor;
    /**
     * @var Adresse
     */
    private $adresse;

    public function __construct(array $data = [],Adresse $adresse = null){
        if(count($data) > 0 && isset($data['name']) && isset($data['gender'])){
            $this->setName($data['name']);
            $this->setGender($data['gender']);
        }
        $this->adresse = $adresse;
        self::$numberOfIntances++;
        
    }

    /*************  GETTERS ****************/

    public function getName(){
        return $this->name;
    }
    public function getGender(){
        return $this->gender;
    }

    /*************  SETTERS ****************/

    public function setName($value){
        if(trim($value) == ""){
            throw new InvalidArgumentException("Le nom ne peut être vide"); 
        }
        $this->name = $value;
        return $this;
    }
    public function setGender($value){
        //if(! in_array($value,["m","f"])) autre façcon de l'ecrire
        if($value != "m" && $value != "f"){
            throw new InvalidArgumentException("Le genre doit être m ou f");
        }
        $this->gender = $value;
        return $this;   
    }
    /**
     * @param Adresse $adresse
     * @return Person
     */
    public function adresse(Adresse $adresse){
        $this->adresse = $adresse;
        return $this;
    }

    /*************  AUTRES METHODES ****************/

    public function greet(){
        $greeting = $this->gender=="m"? "Monsieur ":"Madame ";
        $greeting .= $this->name;
        if($this->adresse){
            $greeting .= " " . $this->adresse;
        }
        return "<p>Bonjour " . $greeting . "</p>";
    }

    public function setEyeColor($value){
        $this->eyeColor = $value;
    }
}