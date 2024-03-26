<?php
// CUSTOMER PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD CUSTOMER PROCESS
    if (isset($_POST['addEmployee']) && $_POST['addEmployee'] === 'addEmployee') {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $contactNumber = $_POST["contactNumber"];
        $typeId = $_POST["employeeType"];

        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../views/EmployeeView.php';
            require_once '../controllers/EmployeeController.php';


            // ERROR HANDLERS

            $errors = [];


            if (isEmpty($firstName, $lastName, $gender, $address, $contactNumber, $typeId)) {
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

            addEmployee($pdo, $firstName, $lastName, $gender, $address, $contactNumber, $typeId);

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


} else {
    header("Location: ../index.php");
    die();
}
