<?php
// USER PROCESSES




if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // ADD USER PROCESS
    if (isset($_POST['addUser']) && $_POST['addUser'] === 'addUser') {
        $employeeId = $_POST["employeeId"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../controllers/UsersController.php';


            // ERROR HANDLERS

            $errors = [];


            if (isEmpty($employeeId, $username, $password, $role)) {
                $errors["emptyInput"] = "Fill in all fields.";
            }


            if ($errors) {
                $_SESSION["emptyInput"] = $errors;


                header("Location: ../index.php");
                die();
            }

            addUser($pdo, $employeeId, $username, $password, $role);

            header("Location: ../index.php");


            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF ADD USER PROCESS...




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
