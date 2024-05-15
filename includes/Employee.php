<?php
// CUSTOMER PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(trim(file_get_contents("php://input")));

    // ADD EMPLOYEE PROCESS
    if (isset($data->action) && $data->action === 'addEmployee') {
        $firstName = $data->firstName;
        $lastName = $data->lastName;
        $gender = $data->gender;
        $address = $data->address;
        $contactNumber = $data->contactNumber;
        $typeId = $data->employeeType;

        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../views/EmployeeView.php';
            require_once '../controllers/EmployeeController.php';


            // ERROR HANDLERS

            $errors = [];
            $success = [];


            if (isEmpty($firstName, $lastName, $gender, $address, $contactNumber, $typeId)) {
                $errors["message"] = "Fill in all fields.";
            }


            if ($errors) {
                $_SESSION["emptyInput"] = $errors;

                echo json_encode($errors);
                exit;
            } else {

                addEmployee($pdo, $firstName, $lastName, $gender, $address, $contactNumber, $typeId);

                $success['success'] = true;
                $success["message"] = "New employee data added successfully";
                echo json_encode($success);
            }


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD EMPLOYEE PROCESS...



    else if (isset($data->action) && $data->action === 'getAllEmployees') {
        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../views/EmployeeView.php';
            require_once '../controllers/EmployeeController.php';

            $result = getAllEmployees($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }




    // DELETE EMPLOYEE PROCESS
    else if (isset($data->action) && $data->action === 'delete') {

        $id = $data->id;

        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../controllers/EmployeeController.php';


            // ERROR HANDLERS
            $errors = [];
            $success = [];

            $result = getEmployee($pdo, $id);

            if (!$result) {
                $errors["employeetNotFound"] = "Employee not found.";
            }

            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {
                removeEmployee($pdo, $id);
                $success['success'] = true;
                $success['message'] = 'Employee data deleted successfully';
                echo json_encode($success);
                exit;
            }



            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE EMPLOYEE PROCESS


    else if (isset($data->action) && $data->action === 'getEmployeeCount') {
        try {
            require_once '../config/Database.php';
            require_once '../models/EmployeeModel.php';
            require_once '../views/EmployeeView.php';
            require_once '../controllers/EmployeeController.php';

            $result = getEmployeeCount($pdo);

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
