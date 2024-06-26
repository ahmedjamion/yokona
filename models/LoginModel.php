<?php

declare(strict_types=1);

// LOG IN MODEL




// GET A USER FROM THE DATABASE
function getUser(object $pdo, string $username)
{
    $query = "SELECT * FROM user WHERE username = :username;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
