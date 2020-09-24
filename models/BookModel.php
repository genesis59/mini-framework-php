<?php

class BookModel {
    private $id;
    private $titre;
    private $dateParution;
    private $auteur;
    private $nbPages;

    // GETTERS 

    public function getId(){
        return $this->id;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getDateParution(){
        return $this->dateParution;
    }
    public function getAuteur(){
        return $this->auteur;
    }
    public function getNbPages(){
        return $this->nbPages;
    }

    // SETTERS

    public function setId($value){
        $this->id = $value;
        return $this;
    }
    public function setTitre($value){
        $this->titre = $value;
        return $this;
    }
    public function setDateParution($value){
        $this->dateParution = $value;
        return $this;
    }
    public function setAuteur($value){
        $this->auteur = $value;
        return $this;
    }
    public function setNbPages($value){
        $this->nbPages = $value;
        return $this;
    }
    
    
}