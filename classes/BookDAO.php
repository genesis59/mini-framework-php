<?php

class BookDAO implements BookInterface
{
    /**
     * @var PDO $db
     */
    private $db;

    /**
     * Constructeur avec injection de la classe PDO
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    /**
     * Sélectionner toute la liste des livres de la BD
     * Possibilité d' utiliser un ORDER BY dans la requête
     * @param string $orderBy
     * @return BookModel[]
     */
    public function findAll(string $orderBy = ""): array
    {
        $sql = "SELECT * FROM bookslist";
        if (!empty($orderBy)) {
            $sql .= " ORDER BY $orderBy";
        }
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "BookModel");
        $bookList = [];
        while($book  = $statement->fetch()){
            $dateTransform = $this->transformDate($book->getDateParution());
            $book->setDateParution($dateTransform); 
            array_push($bookList,$book);
        }
        return $bookList;
    }
    /**
     * Selectionnez un livre par son id
     * @param int $id
     * @return (BookModel || false)
     */
    public function findOneById(int $id)
    {
        $sql = "SELECT * FROM bookslist WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "BookModel");
        $book = $statement->fetch();

        $dateTransform = $this->transformDate($book->getDateParution());
        $book->setDateParution($dateTransform); 

        return $book;
    }

    /**
     * Insérer un livre dans la BD
     * @param BookModel $book
     * @return void
     */
    public function insertOne(BookModel $book): void
    {
        $sql = "INSERT INTO bookslist(titre,dateParution,auteur,nbPages)
                VALUES (:titre,:dateParution,:auteur,:nbPages)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":titre", $book->getTitre());
        $statement->bindValue(":dateParution", $book->getDateParution());
        $statement->bindValue(":auteur", $book->getAuteur());
        $statement->bindValue(":nbPages", $book->getNbPages());
        $statement->execute();
    }

    /**
     * Effacer un livre de la BD par son id
     * @param int $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
        $sql = "DELETE FROM bookslist WHERE id = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$id]);
    }

    /**
     * Modifier un livre de la BD
     * @param BookModel
     * @return void
     */
    private function updateOne(BookModel $book)
    {
        $sql = "UPDATE bookslist 
                SET titre = :titre, dateParution = :dateParution, auteur = :auteur, nbPages = :nbPages
                WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":titre", $book->getTitre());
        $statement->bindValue(":dateParution", $book->getDateParution());
        $statement->bindValue(":auteur", $book->getAuteur());
        $statement->bindValue(":nbPages", $book->getNbPages());
        $statement->bindValue(":id", $book->getId());
        $statement->execute();
    }
    /**
     * si le livre n'as pas d' id on l'insère dans la BD
     * sinon on l'update
     * @param BookModel $book
     * @return void
     */
    public function save(BookModel $book): void
    {
        if (empty($book->getId())) {
            $this->insertOne($book);
        } else {
            $this->updateOne($book);
        }
    }
    /**
     * Transforme la date de la BD du type (2020-09-02)
     * en date française du type (02/09/2020)
     * @param string $string
     * @return string $ dateString
     */
    private function transformDate(string $string): string{
        $dateTab = explode("-",$string);
        $temp = $dateTab[0];
        $dateTab[0] = $dateTab[2];
        $dateTab[2] = $temp;
        $dateString = implode("/",$dateTab);
        return  $dateString;
    }
}
