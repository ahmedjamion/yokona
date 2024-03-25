<?php

declare(strict_types=1);

// LOG IN MODEL




//GETS A SINGLE USER FROM THE DATABASE
function getUser(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
