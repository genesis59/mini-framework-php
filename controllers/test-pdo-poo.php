<?php
require "../classes/DatabaseConnection.php";

$pdo = DatabaseConnection::getInstances();

echo "<p>" .  DatabaseConnection::$numberOfIntances . "</p>";

$pdo = DatabaseConnection::getInstances();

echo "<p>" .  DatabaseConnection::$numberOfIntances . "</p>";