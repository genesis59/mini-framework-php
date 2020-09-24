USE formation;

DROP TABLE IF EXISTS bookslist;
CREATE TABLE bookslist(
    id int UNSIGNED AUTO_INCREMENT NOT NULL,
    titre varchar(50) NOT NULL,
    dateParution date NOT NULL,
    auteur varchar(50) NOT NULL,
    nbPages int NOT NULL,
    PRIMARY KEY(id)
);