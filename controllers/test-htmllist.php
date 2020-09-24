<?php
require "../classes/Htmllist.php";


$liste = new Htmllist(["type" => "ol","items" => ["bonjour","coucou","hello"]]);

echo $liste->render();

$liste->setType("ul");
$liste->addItem("world")->addItem("best");

echo $liste->render();