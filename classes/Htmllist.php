<?php
/**
 * 
 * Modélise une liste html
 */

class Htmllist {
    private $type = "ul";
    private $items = [];

    public function __construct(array $data){
        if(isset($data["type"])){
            $this->setType($data["type"]);
        }
        if(isset($data["items"]) && is_array($data["items"])){
            $this->items = $data["items"];
        }
        
    }

    public function getType(){
        return $this->type;
    }
    public function getItems(){
        return $this->items;
    }
    public function setType($value){
        if(!in_array($value,["ul","ol"])){
            throw new InvalidArgumentException("Le type doit être ul ou ol");
        }
        $this->type = $value;
        return $this;
    }
    public function setItems(array $value){
        $this->items = $value;
        return $this;
    }
    /**
     *  ajout d'un nouvel element a la liste
     * si cette element n est pas deja présent dans la liste
     * 
     * @param [type] $value
     * @return Htmllist
     * 
     */
    public function addItem($value){
        if(!in_array($value,$this->items)){
            array_push($this->items,$value);
        } else {
            throw new InvalidArgumentException("Le mot existe déjà");
        }
        return $this;
    }

    public function render(){
        $html = "<" . $this->type . ">";
        foreach ($this->items as $item){
            $html .= "<li>" . $item . "</li>";
        }
        return $html .= "</" . $this->type . ">";
    }

}