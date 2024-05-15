<?php

declare(strict_types=1);

//PRODUCT MODEL




// GET ALL PRODUCTS FROM THE DATABASE
function getAllProducts(object $pdo)
{
    try {
        $query = "SELECT * FROM product";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}




// GET A PRODUCT FROM THE DATABASE
function getProduct(object $pdo, int $id)
{
    try {
        $query = "SELECT * FROM product WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}




// INSERT A NEW PRODUCT TO THE DATABASE
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




// UPDATE A PRODUCT IN THE DATABASE
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




// DELETE A PRODUCT IN THE DATABASE
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







function getProduce(object $pdo, int $id)
{
    try {
        $query = "SELECT * FROM produce WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}


// LOG PRODUCE
function logProduce(object $pdo, int $id, string $date, int $quantity)
{
    try {
        $query = "INSERT INTO produce (product_id, produce_date, quantity) VALUES (:product_id, :produce_date, :quantity);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":product_id", $id);
        $stmt->bindParam(":produce_date", $date);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inserting product: " . $e->getMessage();
    }
}


// GET ALL PRODUCE
function getAllProduce(object $pdo)
{
    try {
        $query = "SELECT produce.id, product.name, product.size, product.type, product.tray_size, produce.produce_date, produce.quantity
        FROM produce INNER JOIN product ON produce.product_id = product.id;";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error deleting product: " . $e->getMessage();
    }
}



function deleteProduce(object $pdo, int $id)
{
    try {
        $query = "DELETE FROM produce WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting produce log: " . $e->getMessage();
    }
}




function getProductCount(object $pdo)
{
    try {
        $query = "SELECT COUNT(*) AS product_count FROM product;";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchColumn();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
