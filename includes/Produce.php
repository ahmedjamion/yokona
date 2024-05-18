<?php
// PRODUCT PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(trim(file_get_contents("php://input")));


    // DELETE PRODUCT PROCESS
    if (isset($data->action) && $data->action === 'delete') {

        $id = $data->id;

        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../controllers/ProductController.php';


            // ERROR HANDLERS
            $errors = [];
            $success = [];

            $result = getProduce($pdo, $id);

            if (!$result) {
                $errors["message"] = "Produce log not found.";
            }

            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {
                deleteProduce($pdo, $id);
                $success["success"] = true;
                $success["message"] = "Product data deleted successfully";
                echo json_encode($success);
                exit;
            }




            $pdo = null;
            $stmt = null;
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE PRODUCT PROCESS



    else if (isset($data->action) && $data->action === 'logProduce') {
        $id = $data->id;
        $date = $data->date;
        $quantity = $data->quantity;

        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';


            // ERROR HANDLERS

            $errors = [];
            $success = [];


            if (empty($id) || empty($date) || empty($quantity)) {
                $errors["id"] = "Fill in all fields.";
            }


            if ($errors) {

                $_SESSION["emptyInput"] = $errors;
                echo json_encode($errors);
                exit;
            } else {

                logProduce($pdo, $id, $date, $quantity);
                $success["success"] = true;
                $success["message"] = "New produce data added successfully";
                echo json_encode($success);
                exit;
            }



            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }


        //
    } else if (isset($data->action) && $data->action === 'getAllProduce') {
        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';

            $result = getAllProduce($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($data->action) && $data->action === 'getTodaysProduceQuantity') {
        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';

            $result = getTodaysProduceQuantity($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($data->action) && $data->action === 'getProduceByDate') {
        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';

            $result = getProduceByDate($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    //

    else if (isset($data->action) && $data->action === 'getProduceBySize') {
        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';

            $result = getProduceBySize($pdo);

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
