<?php

declare(strict_types=1);

// CUSTOMER MODEL




// GET ALL CUSTOMER FROM DATABASE
function getAllCustomers(object $pdo)
{
    try {
        $query = "SELECT * FROM customer";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error getting customers data: " . $e->getMessage();
    }
}




//GET A CUSTOMER FROM THE DATABASE
function getCustomer(object $pdo, int $id)
{
    try {
        $query = "SELECT * FROM customer WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error deleting customer data: " . $e->getMessage();
    }
}




// INSERT A NEW CUSTOMER TO THE DATABASE
function setCustomer(object $pdo, string $firstName, string $lastName, string $gender, string $address, string $contactNumber)
{
    try {
        $query = "INSERT INTO customer (first_name, last_name, gender, address, contact_number) VALUES (:first_name, :last_name, :gender, :address, :contact_number);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_number", $contactNumber);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inserting customer data: " . $e->getMessage();
    }
}




// UPDATE AN EXISTING CUSTOMER IN THE DATABASE
function updateCustomer(object $pdo, int $id, string $firstName, string $lastName, string $gender, string $address, string $contactNumber)
{
    try {
        $query = "UPDATE customer SET first_name = :first_name, last_name = :last_name, gender = :gender, address = :address, contact_number = :contact_number WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_number", $contactNumber);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating customer: " . $e->getMessage();
    }
}




// DELETE AN CUSTOMER FROM THE DATABASE
function deleteCustomer(object $pdo, int $id)
{
    try {
        $query = "DELETE FROM customer WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting customer: " . $e->getMessage();
    }
}
