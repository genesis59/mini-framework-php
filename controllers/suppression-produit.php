<?php
// inclusion du modèle
require MODEL_PATH . "product.php";

// Récupération de l'id du produit à supprimer
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// Suppression du produit
deleteOneProductById($id);

// Redirection vers la liste des produits
header("location: index.php?c=liste-produits");