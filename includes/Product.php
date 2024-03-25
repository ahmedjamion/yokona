<?php
// PRODUCT PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD PRODUCT PROCESS
    if (isset($_POST['addProduct']) && $_POST['addProduct'] == 1) {
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


                //header("Location: ../index.php");
                die();
            }

            addProduct($pdo, $productName, $size, $type, $traySize, $price);

            //header("Location: ../index.php");
            echo showAllProducts($pdo);


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD PRODUCT PROCESS...


} else {
    header("Location: ../index.php");
    die();
}
