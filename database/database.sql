-- Suppression de la base de données si elle existe
DROP DATABASE IF EXISTS formation;
-- Création de la basse de données
CREATE DATABASE formation DEFAULT CHARACTER SET utf8;
-- ouverture de la base
USE formation;
-- création de la table des utilisateurs
-- user_name, user_email, user_password, id
CREATE TABLE users (
    id MEDIUMINT UNSIGNED AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_password VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);