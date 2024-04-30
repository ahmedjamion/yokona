<?php
// USER PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(trim(file_get_contents("php://input")));

    // ADD USER PROCESS
    if (isset($data->action) && $data->action === 'addUser') {
        $employeeId = $data->employeeId;
        $username = $data->username;
        $password = $data->password;
        $role = $data->role;

        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../controllers/UserController.php';


            // ERROR HANDLERS

            $errors = [];
            $success = [];


            if (isEmpty($employeeId, $username, $password, $role)) {
                $errors["message"] = "Fill in all fields.";
            }


            if ($errors) {
                $_SESSION["emptyInput"] = $errors;

                echo json_encode($errors);
                exit;
            } else {

                addUser($pdo, $employeeId, $username, $password, $role);
                $success["success"] = true;
                $success["message"] = "New product data added successfully";
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
    // END OF ADD USER PROCESS...




    else if (isset($data->action) && $data->action === 'getAllUsers') {
        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../views/UserView.php';
            require_once '../controllers/UserController.php';

            $result = getAllUsers($pdo);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }




    // DELETE USER PROCESS
    else if (isset($_POST['deleteUser']) && $_POST['deleteUser'] === 'deleteUser') {

        $id = $_POST["id"];

        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../controllers/UsersController.php';


            // ERROR HANDLERS
            $errors = [];

            $result = getUser($pdo, $id);

            if (!$result) {
                $errors["usertNotFound"] = "User not found.";
            }

            if ($errors) {
                header("Location: ../index.php");
                die();
            }


            removeUser($pdo, $id);

            header("Location: ../index.php");


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF DELETE USER PROCESS


} else {
    header("Location: ../index.php");
    die();
}
