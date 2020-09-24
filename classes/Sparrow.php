<?php

class Sparrow extends Animal implements ICanFly
{

    public function fly(){
        $this->move();
    }
    public function peck()
    {
        echo "<p>Je picore des graines</p>";
    }
    public function move(){
        echo "<p>Je vole en battant des ailes</p>";
    }
}
