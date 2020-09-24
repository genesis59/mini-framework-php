<?php

class DatabaseConnection {
    // Variable statique chargée de stocker l' instance de PDO
    private static $instance = null;
    public static $numberOfIntances = 0;

    // Pour éviter d'instancier plusieurs fois
    // Le constructeur est rendu privé
    private function __construct(){
    }

    public static function getInstances(){
        if(self::$instance == null){
            $dsn = "mysql:host=localhost;dbname=formation;charset=utf8";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            self::$instance = new PDO ($dsn,"root","",$options);
            self::$numberOfIntances++;
        }
        
        return self::$instance;
    }

}