<?php
// PRODUCT PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    if (isset($_POST['action']) && $_POST['action'] === 'addOrder') {
        $userId = $_POST['user_id'];
        $customerId = $_POST['customer_id'];

        $items = $_POST['items'];

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
    }


    //

    else if (isset($_POST['action']) && $_POST['action'] === 'getAllOrders') {
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

    //


    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {

        $id = $_POST['id'];

        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';


            // ERROR HANDLERS
            $errors = [];
            $success = [];

            $result = getOrder($pdo, $id);

            if (!$result) {
                $errors["message"] = "Product not found.";
            }

            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {
                deleteOrder($pdo, $id);
                $success["success"] = true;
                $success["message"] = "Product data deleted successfully";
                echo json_encode($success);
                exit;
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($_POST['action']) && $_POST['action'] === 'getTodaysOrderQuantity') {
        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';

            $result = getTodaysOrderQuantity($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($_POST['action']) && $_POST['action'] === 'getTodaysOrderTotal') {
        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';

            $result = getTodaysOrderTotal($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($_POST['action']) && $_POST['action'] === 'getSalesByDate') {
        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';

            $result = getSalesByDate($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }



    //

    else if (isset($_POST['action']) && $_POST['action'] === 'getSalesBySize') {
        try {
            require_once '../config/Database.php';
            require_once '../models/OrderModel.php';
            require_once '../views/OrderView.php';
            require_once '../controllers/OrderController.php';

            $result = getSalesBySize($pdo);

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
