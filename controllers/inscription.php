<?php
require MODEL_PATH . "user.php";
// Récupération des données
$rules = [
    "user_name" => FILTER_SANITIZE_STRING,
    "user_email" => FILTER_VALIDATE_EMAIL,
    "user_email_confirm" => FILTER_VALIDATE_EMAIL,
    "user_password" => FILTER_DEFAULT,
    "user_password_confirm" => FILTER_DEFAULT
];

$userData = filter_input_array(INPUT_POST, $rules);

// Validation des données
$isPosted = count($_POST) > 0;
$errors = [];

if ($isPosted) {

    // Les tests de validation
    if (empty($userData["user_name"])) {
        array_push($errors, "Le nom ne peut être vide");
    }
    if (empty($userData["user_email"])) {
        array_push($errors, "L'adresse email' ne peut être vide");
    }
    if (empty($userData["user_password"])) {
        array_push($errors, "Le mot de passe ne peut être vide");
    }

    if (mb_strlen($userData["user_password"]) < 4) {
        array_push($errors, "Le mot de passe doit comporter au moins 4 caractères");
    }

    if ($userData["user_password"] != $userData["user_password_confirm"]) {
        array_push($errors, "Le mot de passe et la confirmation doivent être identiques");
    }

    if ($userData["user_email"] != $userData["user_email_confirm"]) {
        array_push($errors, "L'adresse email et la confirmation doivent être identiques");
    }

    // Le traitement du formulaire si les données sont valides
    if (count($errors) == 0) {
        // Suppression des champs de confirmation de userData
        unset($userData["user_email_confirm"]);
        unset($userData["user_password_confirm"]);

        if (register($userData)) {
            header("location:index.php?c=home");
        } else {
            array_push($errors, "Impossible d'insérer vos données dans la base");
        }
    }
}

// Affichage du formulaire
$pageTitle = "Inscription des utilisateurs";
$page = "view-inscription";

include VIEW_PATH . "layout.php";
