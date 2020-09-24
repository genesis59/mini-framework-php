<?php

/**
 * Classe d'accès au données de la table users
 */
class UserDAO implements IDAO
{
    /**
     * Une instance de PDO pour se connecter à la base de données
     * @var PDO
     */
    private $connection;
    /**
     * Constructeur de la classe
     * avec une injection de la classe PDO
     * 
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->connection = $db;
    }
    /**
     * Sélection de toutes les données de la table users
     * @param string $orderBy
     * @return UserModel[]
     */
    public function findAll(string $orderBy = ""): array
    {
        // La requete SQL
        $sql = "SELECT id, user_name as name, user_email as email, user_password as password 
        FROM users ";
        if (!empty($orderBy)) {
            $sql .= "ORDER BY $orderBy";
        }
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);
        //Execution de la requete préparée
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "UserModel");
        // Retourne le résultat sous la forme d'un tableau
        return $statement->fetchAll();
    }
    /**
     * Sélection d'un utilisateur en fonction de son id
     * 
     * @param integer $id
     * @return UserModel
     */
    public function findOneById(int $id): UserModel
    {
        // La requete SQL
        $sql = "SELECT id, user_name as name, user_email as email, user_password as password FROM users WHERE id=?";
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);
        //Execution de la requete préparée
        $statement->execute([$id]);
        // Retourne le résultat sous la forme d'un tableau
        $statement->setFetchMode(PDO::FETCH_CLASS, "UserModel");
        return $statement->fetch();
    }
    /**
     * Insère un nouvel utilisateur dans la base
     * et retourne l'id généré par cette insertion
     * 
     * @param UserModel $user
     * @return void
     */
    private function insertOne(UserModel $user): void
    {
        // La requete SQL
        $sql = "INSERT INTO users(user_name,user_email,user_password) VALUES (:user_name,:user_email,:user_password)";
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);

        // Définition des valeurs passée à le requete préparée
        $statement->bindValue(":user_name", $user->getName());
        $statement->bindValue(":user_email", $user->getEmail());
        $statement->bindValue(":user_password", $user->getPassword());

        //Execution de la requete préparée
        $statement->execute();
        // Affecte l id generé par l insertion à l objet
        $generatedId = $this->connection->lastInsertId();
        $user->setId($generatedId);
    }
    /**
     * Supprime un utilisateur en fonction de son id
     * et retourne un booléen indiquant que la suppression est effective
     * 
     * @param integer $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
        // La requete SQL
        $sql = "DELETE FROM users WHERE id=?";
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);
        //Execution de la requete préparée
        return $statement->execute([$id]);
    }
    /**
     * Met a jour un utilisateur en fonction d'un tableau $data
     * ce tableau doit imperativament avoir une clef id
     * si ce tableau n'a pas de clef id on renvoie une exception
     * La fonction retourne un booléen
     * 
     * @param UserModel $user
     * @return void
     */
    private function updateOne(UserModel $user): void
    {
        // La requete SQL
        $sql = "UPDATE users 
                SET user_name=:user_name, user_email=:user_email, user_password=:user_password
                WHERE id=:id";
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);
        // Définition des valeurs passée à le requete préparée
        $statement->bindValue(":id", $user->getId());
        $statement->bindValue(":user_name", $user->getName());
        $statement->bindValue(":user_email", $user->getEmail());
        $statement->bindValue(":user_password", $user->getPassword());
        //Execution de la requete préparée
        $statement->execute();
    }
    /**
     * @param UserModel $user
     * @return void
     */
    public function save(UserModel $user): void
    {
        if (empty($user->getId())) {
            $this->insertOne($user);
        } else {
            $this->updateOne($user);
        }
    }
    /**
     * @param array $search
     * @param string $orderBy
     * @return array
     */
    public function find(array $search = [], $orderBy = ""): array
    {
        // La requete SQL
        $sql = "SELECT id, user_name as name, user_email as email, user_password as password 
        FROM users ";
        if(count($search) > 0){
            $sql .= " WHERE ";
            $fields = array_keys($search);
            $fields = array_map(function($item){
                return "$item = :$item";
            }, $fields);
            $sql .= implode(" AND ", $fields);
        }
        if (!empty($orderBy)) {
            $sql .= "ORDER BY $orderBy";
        }
        //Préparation de la requete sur la base de donnees
        $statement = $this->connection->prepare($sql);
        //Execution de la requete préparée
        $statement->execute($search);
        $statement->setFetchMode(PDO::FETCH_CLASS, "UserModel");
        // Retourne le résultat sous la forme d'un tableau
        return $statement->fetchAll();
    }
}
