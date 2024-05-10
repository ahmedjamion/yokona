<?php
// PRODUCT PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(trim(file_get_contents("php://input")));



    if (isset($data->action) && $data->action === 'addOrder') {
        $userId = $data->user_id;
        $customerId = $data->customer_id;

        $items = $data->items;

        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';


            // ERROR HANDLERS

            $errors = [];
            $success = [];


            if (empty($userId) || empty($customerId)) {
                $errors["message"] = "Fill in all fields.";
            }


            if ($errors) {

                $_SESSION["emptyInput"] = $errors;
                echo json_encode($errors);
                exit;
            } else {

                setOrder($pdo, $userId, $customerId, $items);
                $success["success"] = true;
                $success["message"] = "New order data added successfully";
                echo json_encode($success);
                exit;
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }


        //
    } else if (isset($data->action) && $data->action === 'getAllOrders') {
        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';

            $result = getAllOrders($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../index.php");
    die();
}
