<?php

abstract class Animal
{

    public function breathe()
    {
        echo "<p>Je respire</p>";
    }
    public abstract function move();

}
