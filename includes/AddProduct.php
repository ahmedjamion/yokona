<?php

//PROCESSING ADD PRODUCT FORM

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $productName = $_POST["productName"];
    $size = $_POST["size"];
    $type = $_POST["type"];
    $traySize = $_POST["traySize"];
    $price = $_POST["price"];

    try {
        require_once '../config/Database.php';
        require_once '../models/ProductModel.php';
        require_once '../controllers/ProductController.php';


        //ERROR HANDLERS

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

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
