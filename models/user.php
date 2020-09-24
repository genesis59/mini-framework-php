<?php

require_once MODEL_PATH . "pdo.php";

function authenticate($login, $pass): bool
{
    $pdo = getPDO();



    $sql = "SELECT * FROM users WHERE user_email= ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$login]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && count($user) > 0 && password_verify($pass, $user["user_password"])) {
        session_regenerate_id(true);
        // Enregistrement de l'utilisateur dans la session
        $_SESSION["user"] = $user;
        $isAuthenticated = true;
    } else {
        $isAuthenticated = false;
    }

    return $isAuthenticated;
}

function register(array $userData)
{
    $pdo = getPDO();

    $userData["user_password"] = password_hash($userData["user_password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user_name, user_email, user_password) 
    VALUES (:user_name, :user_email, :user_password)";
    $statement = $pdo->prepare($sql);
    $affectedRow = $statement->execute($userData);

    return $affectedRow > 0;
}
