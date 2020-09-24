<?php
$pageTitle = isset($_GET["id"]) ? "Modifier le livre" : "Nouveau livre";
$page = "view-formulaire-livre";

$bookDAO = new BookDAO(DatabaseConnection::getInstances());

// Récupération des données si elles ont été postées
$rules = [
    "titre"  => FILTER_SANITIZE_STRING,
    "dateParution" => FILTER_DEFAULT,
    "auteur" => FILTER_SANITIZE_STRING,
    'nbPages' => FILTER_SANITIZE_NUMBER_INT
];

$book = filter_input_array(INPUT_POST, $rules);
// Validation des données
$isPosted = count($_POST) > 0;
$errors = [];
$bookModel = new BookModel();

if ($isPosted) {

    if(isset($_GET["id"])){
        if (empty($_GET["id"])) {
            array_push($errors, "Impossible de modifier ce livre");
        } else {
            if ($bookDAO->findOneById($_GET["id"]) != false) {
                array_push($errors, "Désolé ce livre n'existe pas");
            } else {
                $bookModel->setId($_GET["id"]);
            }
        }
    }
    if (empty($book["titre"])) {
        array_push($errors, "Veuillez renseigner un titre");
    }
    if (empty($book["dateParution"])) {
        array_push($errors, "Veuillez renseigner une date de parution");
    }
    if (empty($book["auteur"])) {
        array_push($errors, "Veuillez renseigner un auteur");
    }
    if (empty($book["nbPages"])) {
        array_push($errors, "Veuillez renseigner un nombre de pages");
    }


    if (count($errors) == 0) {
        try {
            $bookModel->setTitre($book["titre"])->setDateParution($book["dateParution"])->setAuteur($book["auteur"])->setNbPages($book["nbPages"]);
            $bookDAO->save($bookModel);
            header("location:index.php?c=liste-livres");
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}


include VIEW_PATH . "layout.php";
