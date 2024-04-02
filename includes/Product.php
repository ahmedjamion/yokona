<?php
// PRODUCT PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD PRODUCT PROCESS
    if (isset($_POST['addProduct']) && $_POST['addProduct'] === 'addProduct') {
        $productName = $_POST["productName"];
        $size = $_POST["size"];
        $type = $_POST["type"];
        $traySize = $_POST["traySize"];
        $price = $_POST["price"];

        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../views/ProductView.php';
            require_once '../controllers/ProductController.php';


            // ERROR HANDLERS

            $errors = [];


            if (isEmpty($productName, $size, $type, $traySize, $price)) {
                $errors["emptyInput"] = "Fill in all fields.";
            }


            if ($errors) {
                //NEED TO ADD SOMETHING HERE
                /*$_SESSION["errorsSignUp"] = $errors;
    
                $signUpData = [
                    "username" => $username,
                    "email" => $email
                ];
    
                $_SESSION["signUpData"] = $signUpData;*/

                $_SESSION["emptyInput"] = $errors;


                header("Location: ../index.php");
                die();
            }

            addProduct($pdo, $productName, $size, $type, $traySize, $price);

            header("Location: ../index.php");
            //echo showAllProducts($pdo);


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD PRODUCT PROCESS...




    // DELETE PRODUCT PROCESS
    else if (isset($_POST['deleteProduct']) && $_POST['deleteProduct'] === 'deleteProduct') {

        $id = $_POST["id"];

        try {
            require_once '../config/Database.php';
            require_once '../models/ProductModel.php';
            require_once '../controllers/ProductController.php';


            // ERROR HANDLERS
            $errors = [];

            $result = getProduct($pdo, $id);

            if (!$result) {
                $errors["productNotFound"] = "Product not found.";
            }

            if ($errors) {
                header("Location: ../index.php");
                die();
            }


            removeProduct($pdo, $id);

            header("Location: ../index.php");
            //echo showAllProducts($pdo);


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE PRODUCT PROCESS


} else {
    header("Location: ../index.php");
    die();
}
