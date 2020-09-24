<?php


$bookDAO = new BookDAO(DatabaseConnection::getInstances());

$book = new BookModel();
$book->setTitre("La Princesse Kaguya")->setDateParution("2011-04-01")->setAuteur("Murata Kaeko")->setNbPages(134);
$book2 = new BookModel();
$book2->setTitre("En route pour Symfony 5")->setDateParution("2020-02-06")->setAuteur("Fabien Potencier")->setNbPages(320);
$book3 = new BookModel();
$book3->setTitre("TOUT JavaScript")->setDateParution("2019-11-14")->setAuteur("Hondermarck Olivier")->setNbPages(384);
$book4 = new BookModel();
$book4->setTitre("Réalisez votre site web avec HTML5 et CSS3")->setDateParution("2017-09-07")->setAuteur("Nebra Mathieu")->setNbPages(344);
$book5 = new BookModel();
$book5->setTitre("Concevez votre site web avec PHP et MySQL")->setDateParution("2017-11-02")->setAuteur("Nebra Mathieu")->setNbPages(392);

//$book->setId(1)->setTitre("Kaguya")->setDateParution("2011-04-01")->setAuteur("Kaeko")->setNbPages(54);

//var_dump($book);
$bookDAO->save($book5);
//$bookDAO->deleteOneById(1);

var_dump($bookDAO->findAll());