<?php

declare(strict_types=1);

// EMPLOYEE MODEL




// GET ALL EMPLOYEES FROM DATABASE
function getAllCustomers(object $pdo)
{
    $query = "SELECT * FROM customer";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}




// INSERT A NEW EMPLOYEE TO THE DATABASE
function setCustomer(object $pdo, string $firstName, string $lastName, string $gender, string $address, string $contactNumber, string $typeId)
{
    try {
        $query = "INSERT INTO product (first_name, last_name, gender, address, contact_number, type_id) VALUES (:first_name, :last_name, :gender, :address, :contact_number, :type_id);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_number", $contactNumber);
        $stmt->bindParam(":type_id", $typeId);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inserting product: " . $e->getMessage();
    }
}




// UPDATE AN EXISTING EMPLOYEE IN THE DATABASE
function updateCustomer(object $pdo, int $id, string $firstName, string $lastName, string $gender, string $address, string $contactNumber, string $typeId)
{
    try {
        $query = "UPDATE employee SET first_name = :first_name, last_name = :last_name, gender = :gender, address = :address, contact_number = :contact_number, type_id = :type_id WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_number", $contactNumber);
        $stmt->bindParam(":type_id", $typeId);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating employee: " . $e->getMessage();
    }
}




// DELETE AN EMPLOYEE FROM THE DATABASE
function deleteCustomer(object $pdo, int $id)
{
    try {
        $query = "DELETE FROM employee WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting employee: " . $e->getMessage();
    }
}
