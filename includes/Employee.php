<?php
// CUSTOMER PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD EMPLOYEE PROCESS
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
                $_SESSION["emptyInput"] = $errors;


                header("Location: ../index.php");
                die();
            }

            addEmployee($pdo, $firstName, $lastName, $gender, $address, $contactNumber, $typeId);

            header("Location: ../index.php");


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD EMPLOYEE PROCESS...




    // DELETE EMPLOYEE PROCESS
    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {

        $id = $_POST["id"];

        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../controllers/EmployeeController.php';


            // ERROR HANDLERS
            $errors = [];

            $result = getEmployee($pdo, $id);

            if (!$result) {
                $errors["employeetNotFound"] = "Employee not found.";
            }

            if ($errors) {
                header("Location: ../index.php");
                die();
            }


            removeEmployee($pdo, $id);

            header("Location: ../index.php");


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE EMPLOYEE PROCESS


} else {
    header("Location: ../index.php");
    die();
}
