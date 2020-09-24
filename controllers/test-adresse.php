<?php
require "../classes/Adresse.php";
$adresse = new Adresse(["street" => "8 rue de la Paix","zipCode" => 75000,"city" => "Paris"]);

echo $adresse;
var_dump($adresse);