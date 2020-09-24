<?php
require MODEL_PATH . "product.php";

$productList = getAllProducts();
$page = "view-liste-produits";
$pageTitle = "Liste des produits";

include VIEW_PATH . "layout.php";