<?php

class Cat extends Animal
{

    public function hunt()
    {
        echo "<p>Je chasse des souris</p>";
    }
    public function move(){
        echo "<p>Je saute</p>";
    }
}
