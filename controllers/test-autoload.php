<?php

$marie = new Person(
    ["name" => "marie","gender" => "f"],
    new Adresse(["street" => "28 rue de l'abbaye","zipCode" => "59000","city" => "Lille"])
);

echo $marie->greet();