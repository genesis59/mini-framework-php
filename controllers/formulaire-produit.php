<?php
// Inclusion du modèle de gestion des produits  
require MODEL_PATH . "product.php";

// Récupération des données si elles ont été postées
$rules = [
    "product_name"  => FILTER_SANITIZE_STRING,
    "price"         => [
        "filter" => FILTER_SANITIZE_NUMBER_FLOAT,
        "flags" => FILTER_FLAG_ALLOW_FRACTION
    ],
    "category"      => FILTER_SANITIZE_STRING
];

$product = filter_input_array(INPUT_POST, $rules);
// Validation des données
$isPosted = count($_POST) > 0;
$errors = [];

if ($isPosted) {
    if (empty($product["product_name"])) {
        array_push($errors, "Le nom du produit ne peut être vide");
    }
    if (empty($product["price"])) {
        array_push($errors, "Le prix ne peut être vide");
    }
    if (empty($product["category"])) {
        array_push($errors, "La catégorie ne peut être vide");
    }

    var_dump($product);

    // Si les données sont valides on appelle une fonction
    // insertProduct en passant les données du produit à insérer
    // Si ok alors redirection vers la liste des produits
    // Sinon définition d'une erreur qui sera affichée dans la vue
    if (count($errors) == 0) {

        try {
            if (insertProduct($product)) {
                header("location:index.php?c=liste-produits");
            } else {
                array_push($errors, "Impossible d'insérer vos données dans la base");
            }
        } catch (PDOException $ex) {
            array_push($errors, "Une erreur de la base de données empêche le traitement");
            // Todo : Enregistrer le message d'erreur dans un fichier error.log à la racine du site
            $fileName = "../error.log";
            $content = date("Y-m-d H:i:s") . "\t" . $ex->getMessage() . "\n";
            file_put_contents($fileName, $content, FILE_APPEND | LOCK_EX);
        }
    }
}
$pageTitle = "Nouveau produit";
$page = "view-formulaire-produit";
include VIEW_PATH . "layout.php";