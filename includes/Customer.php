<?php
// CUSTOMER PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD CUSTOMER PROCESS
    if (isset($_POST['addCustomer']) && $_POST['addCustomer'] === 'addCustomer') {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $contactNumber = $_POST["contactNumber"];

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';


            // ERROR HANDLERS

            $errors = [];


            if (isEmpty($firstName, $lastName, $gender, $address, $contactNumber)) {
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

            addCustomer($pdo, $firstName, $lastName, $gender, $address, $contactNumber);

            header("Location: ../index.php");
            //echo showAllProducts($pdo);


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD CUSTOMER PROCESS...


    // DELETE PRODUCT PROCESS
    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {

        $id = $_POST["id"];

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../controllers/CustomerController.php';


            // ERROR HANDLERS
            $errors = [];

            $result = getCustomer($pdo, $id);

            if (!$result) {
                $errors["customertNotFound"] = "Customer not found.";
            }

            if ($errors) {
                header("Location: ../index.php");
                die();
            }


            removeCustomer($pdo, $id);

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
