<?php

declare(strict_types=1);

// USER MODEL




// GET ALL USER FROM DATABASE
function getAllUsers(object $pdo)
{
    $query = "SELECT * FROM user";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}




// INSERT A NEW USER TO THE DATABASE
function setUser(object $pdo, int $employeeId, string $username, string $password, string $role)
{
    try {
        $query = "INSERT INTO product (employee_id, username, password, role) VALUES (:employee_id, :username, :password, :role);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":employee_id", $employeeId);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inserting product: " . $e->getMessage();
    }
}




// UPDATE AN EXISTING USER IN THE DATABASE
function updateUser(object $pdo, int $id, string $firstName, string $lastName, string $gender, string $address, string $contactNumber)
{
    try {
        $query = "UPDATE employee SET first_name = :first_name, last_name = :last_name, gender = :gender, address = :address, contact_number = :contact_number WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_number", $contactNumber);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating employee: " . $e->getMessage();
    }
}




// DELETE A USER FROM THE DATABASE
function deleteUser(object $pdo, int $id)
{
    try {
        $query = "DELETE FROM user WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting employee: " . $e->getMessage();
    }
}
