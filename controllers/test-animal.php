<?php


echo "<p>un chat : </p>";
$yoko = new Cat();
$yoko->breathe();
$yoko->move();
$yoko->hunt();

echo "<p>une vache : </p>";
$margote = new Cow();
$margote->breathe();
$margote->move();
$margote->graze();

echo "<p>un moineau : </p>";
$moineau = new Sparrow();
$moineau->breathe();
$moineau->move();
$moineau->peck();

echo "<p>FERME : </p>";
$farm = new Farm();
$farm->addInhabitant(new Cat)->addInhabitant(new Cow)->addInhabitant(new Sparrow);
$farm->move();
