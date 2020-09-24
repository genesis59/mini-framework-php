<?php

function getPDO()
{
    // Connexion au serveur de base de données
    $dsn = "mysql:host=localhost;dbname=formation;charset=utf8";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = new PDO($dsn, "root", "", $options);

    return $pdo;
}