<?php

class Cow extends Animal
{

    public function graze()
    {
        echo "<p>Je broute de l'herbe</p>";
    }
    public function move(){
        echo "<p>Je marche tranquillement</p>";
    }
}
