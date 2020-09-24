<?php

function classLoader($className)
{
    //Liste des dossiers dans lesquels on cherche le classe
    $folderList = ["classes", "models"];
    // La classe a-t-elle été trouvée
    $found = false;

    // boucle sur la liste des dossier
    foreach ($folderList as $item) {
        $classPath = "../$item/$className.php";
        // Test de l'existence du fichier
        if (file_exists($classPath)) {
            require_once $classPath;
            // Si vrai alors require et found = true
            $found = true;
            break;
        }
    }
    if(!$found){
        // Si found == false alors on lève une exception
        throw new Exception("Fichier $classPath non trouvé");
    }   
}

spl_autoload_register("classLoader");
