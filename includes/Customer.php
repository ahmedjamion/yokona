<?php
// CUSTOMER PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(trim(file_get_contents("php://input")));


    // ADD CUSTOMER PROCESS
    if (isset($data->action) && $data->action === 'addCustomer') {
        $firstName = $data->firstName;
        $lastName = $data->lastName;
        $gender = $data->gender;
        $address = $data->address;
        $contactNumber = $data->contactNumber;

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';


            // ERROR HANDLERS

            $success = [];
            $errors = [];


            if (isEmpty($firstName, $lastName, $gender, $address, $contactNumber)) {
                $errors["emptyInput"] = "Fill in all fields.";
            }


            if ($errors) {

                $_SESSION["emptyInput"] = $errors;
                echo json_encode($errors);
                exit;
            } else {

                addCustomer($pdo, $firstName, $lastName, $gender, $address, $contactNumber);

                $success["success"] = "New customer data added successfully";
                echo json_encode($success);


                $pdo = null;
                $stmt = null;
                exit;
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD CUSTOMER PROCESS...




    else if (isset($data->action) && $data->action === 'getAllCustomers') {
        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';

            $result = getAllCustomers($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }




    // DELETE CUSTOMER PROCESS
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


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE CUSTOMER PROCESS


} else {
    header("Location: ../index.php");
    die();
}
