<?php

class Farm
{
    /**
     * @var array
     */
    private $inhabitants = [];

    public function addInhabitant(Animal $animal){
        array_push($this->inhabitants,$animal);
        return $this;
    }
    /**
     * @return Farm
     */
    public function move(){
        foreach($this->inhabitants as $member){
            $member->move();
        }
    }
}
