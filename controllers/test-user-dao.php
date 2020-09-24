<?php
// Récupération d'une instance de PDO
$pdo = DatabaseConnection::getInstances();

// Instanciation de DAO

$userDAO = new UserDAO($pdo);

/*
$user = $userDAO->findOneById(6);

$user->setName("Polux");

$userDAO->save($user);
var_dump($user);
*/
var_dump($userDAO->find(["user_password" => "toto","user_name" => "toto"]));