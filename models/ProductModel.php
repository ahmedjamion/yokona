<?php

declare(strict_types=1);

//PRODUCT MODEL




//GET ALL PRODUCTS FROM THE DATABASE
function getAllProducts(object $pdo)
{
    $query = "SELECT * FROM product";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//INSERT A NEW PRODUCT TO THE DATABASE
function setProduct(object $pdo, string $productName, string $size, string $type, string $traySize, float $price)
{
    try {
        $query = "INSERT INTO product (name, size, type, tray_size, price) VALUES (:name, :size, :type, :tray_size, :price);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":name", $productName);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":tray_size", $traySize);
        $stmt->bindParam(":price", $price);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inserting product: " . $e->getMessage();
    }
}

//DELETE A PRODUCT IN THE DATABASE
function deleteProduct(object $pdo, int $id)
{
    try {
        $query = "DELETE FROM product WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting product: " . $e->getMessage();
    }
}

//UPDATE A PRODUCT IN THE DATABASE
function updateProduct(object $pdo, int $id, string $productName, string $size, string $type, string $traySize, float $price)
{
    try {
        $query = "UPDATE product SET name = :name, size = :size, type = :type, tray_size = :tray_size, price = :price WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $productName);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":tray_size", $traySize);
        $stmt->bindParam(":price", $price);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating product: " . $e->getMessage();
    }
}
