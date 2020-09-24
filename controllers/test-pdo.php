<?php

// Connexion au serveur de base de données
$dsn = "mysql:host=localhost;dbname=formation;charset=utf8";
$pdo = new PDO($dsn, "root", "");


$userInfo = [
    "user_name" => "Ada Lovelace",
    "user_email" => "ada@mail.com",
    "user_password" => "123"
];

$sql = "INSERT INTO users (user_name, user_email, user_password)
VALUES (:user_name, :user_email, :user_password)";

$statement = $pdo->prepare($sql);

$statement->execute($userInfo);

// Requête sur le serveur
$resultSet = $pdo->query("SELECT * FROM users");

// Parcours avec un curseur
while ($data = $resultSet->fetch(PDO::FETCH_ASSOC)) {
    echo $data["user_name"] . "<br>";
}

// Requête sur le serveur
$resultSet = $pdo->query("SELECT * FROM users");

// Récupération de toutes les données sous forme de tableau
$userList = $resultSet->fetchAll(PDO::FETCH_OBJ);

foreach ($userList as $user) {
    echo $user->user_name . "<br>";
}
