<?php
// USER PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ADD USER PROCESS
    if (isset($_POST['action']) && $_POST['action'] === 'addUser') {
        $employeeId = $_POST['employeeId'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $image = $_FILES['image'];

        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../controllers/UserController.php';


            // ERROR HANDLERS

            $imagePath = null;
            $errors = [];
            $success = [];



            if ($image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/user/';
                $imagePath = $uploadDir . basename($image['name']);
                $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                if (sizeOk($image['size']) && formatOk($fileExtension)) {
                    move_uploaded_file($image['tmp_name'], $imagePath);
                    $imagePath = 'uploads/customer/' . basename($image['name']);
                } else {
                    $errors['imageFormat'] = 'Image format not supported';
                    $errors['imageSize'] = 'Image should be less than 5mb';
                }
            }


            if (isEmpty($employeeId, $username, $password, $role)) {
                $errors["message"] = "Fill in all fields.";
            }


            if ($errors) {
                $_SESSION["emptyInput"] = $errors;

                echo json_encode($errors);
                exit;
            } else {

                addUser($pdo, $employeeId, $username, $password, $role, $imagePath);
                $success["success"] = true;
                $success["message"] = "New user data added successfully";
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




    else if (isset($_POST['action']) && $_POST['action'] === 'getAllUsers') {
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
    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {

        $id = $_POST['id'];

        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../controllers/UserController.php';


            // ERROR HANDLERS
            $errors = [];
            $success = [];

            $result = getUser($pdo, $id);

            if (!$result) {
                $errors["usertNotFound"] = "User not found.";
            }

            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {
                removeUser($pdo, $id);
                $success['success'] = true;
                $success['message'] = 'User data deleted successfully';
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
    // END OF DELETE USER PROCESS



    else if (isset($_POST['action']) && $_POST['action'] === 'getUserCount') {
        try {
            require_once '../config/Database.php';
            require_once '../models/UserModel.php';
            require_once '../views/UserView.php';
            require_once '../controllers/UserController.php';

            $result = getUserCount($pdo);

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
