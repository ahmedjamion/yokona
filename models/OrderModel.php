<?php

declare(strict_types=1);

// CUSTOMER MODEL




// GET ALL CUSTOMER FROM DATABASE
function getAllOrders(object $pdo)
{
    try {
        $query = "SELECT order.id, order.date_created, order.date_paid, customer.first_name AS cfn, customer.last_name AS cln, user.role, employee.first_name AS efn, employee.last_name AS eln
                    FROM `order`
                    INNER JOIN customer ON order.customer_id = customer.id
                    INNER JOIN user ON order.user_id = user.id
                    INNER JOIN employee ON user.employee_id = employee.id";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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
function setOrder(object $pdo, string $userId, string $customerId, array $items)
{
    try {
        $dateTime = date('Y-m-d H:i:s');
        $query = "INSERT INTO `order` (date_created, user_id, customer_id) VALUES (:date_created, :user_id, :customer_id);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":date_created", $dateTime);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":customer_id", $customerId);

        $stmt->execute();

        $orderId = $pdo->lastInsertId();

        foreach ($items as $item) {
            $query = "INSERT INTO order_item (order_id, product_id, quantity, unit_price, sub_total) VALUES (:order_id, :product_id, :quantity, :unit_price, :sub_total);";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":order_id", $orderId);
            $stmt->bindParam(":product_id", $item->prod_id);
            $stmt->bindParam(":quantity", $item->quantity);
            $stmt->bindParam(":unit_price", $item->price);
            $stmt->bindParam(":sub_total", $item->sub_total);

            $stmt->execute();
        }
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
