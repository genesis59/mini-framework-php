<?php
// Démarrage de la session
session_start();

require "../autoload.php"; // Permet de charger les require dans toutes les fichiers

// Récupération de l'utilisateur connecté
// S'il n'existe pas définition d'un utilisateur anonyme
if (isset($_SESSION["user"]) && $_SESSION["user"]) {
    $currentUser = $_SESSION["user"];
} else {
    $currentUser = ["user_name" => "Anonyme"];
}

// Définition des chemins de l'application
define("CONTROLLER_PATH", "../controllers/");
define("VIEW_PATH", "../views/");
define("MODEL_PATH", "../models/");

// Récupération du nom du contrôleur
$controller = filter_input(INPUT_GET, "c", FILTER_SANITIZE_URL);

if (!file_exists(CONTROLLER_PATH . $controller . ".php")) {
    $controller = "not-found";
}

// Inclusion du contrôleur
include CONTROLLER_PATH . $controller . ".php";