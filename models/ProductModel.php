<?php

declare(strict_types=1);

function getAllProducts(object $pdo)
{
    $query = "SELECT * FROM product";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
