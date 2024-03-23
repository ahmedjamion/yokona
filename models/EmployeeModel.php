<?php

declare(strict_types=1);

function getAllEmployees(object $pdo)
{
    $query = "SELECT * FROM employee";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
