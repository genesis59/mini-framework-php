USE formation;
-- Suppression de la table si elle existe déjà
DROP TABLE IF EXISTS products;
-- Création de la table products
CREATE TABLE products (
    id MEDIUMINT UNSIGNED AUTO_INCREMENT,
    product_name VARCHAR(50) NOT NULL,
    price DECIMAL(5, 2) UNSIGNED NOT NULL,
    category VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);
-- Insertion
INSERT INTO products (product_name, price, category)
VALUES ('Clavier', 15, 'Informatique'),
    ('Aspirateur', 300, 'Electro ménager'),
    ('Disque dur', 80, 'Informatique');