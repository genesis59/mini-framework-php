<?php

$pageTitle = "Liste des livres";
$page = "view-liste-livres";

$BookDAO = new BookDAO(DatabaseConnection::getInstances());
$listBook = $BookDAO->findAll();

include VIEW_PATH . "layout.php";