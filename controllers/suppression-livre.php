<?php


$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

$bookDAO = new BookDAO(DatabaseConnection::getInstances());

$bookDAO->deleteOneById($id);

header("location: index.php?c=liste-livres");