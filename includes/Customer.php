<?php
// CUSTOMER PROCESSES


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['action']) && $_POST['action'] === 'addCustomer') {


        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contactNumber'];
        $image = $_FILES['image'];

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';


            $imagePath = null;
            $success = [];
            $errors = [];

            if ($image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/customer/';
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




            // ERROR HANDLERS


            if (isEmpty($firstName, $lastName, $gender, $address, $contactNumber)) {
                $errors["message"] = "Fill in all fields.";
            }


            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {

                addCustomer($pdo, $firstName, $lastName, $gender, $address, $contactNumber, $imagePath);

                $success["success"] = true;
                $success["message"] = "New customer data added successfully";
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




    else if (isset($_POST['action']) && $_POST['action'] === 'getAllCustomers') {
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




    ///
    else if (isset($_POST['action']) && $_POST['action'] === 'getCustomer') {

        $id = $_POST['id'];

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';

            $result = getCustomer($pdo, $id);

            echo json_encode($result);
            exit;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }




    // DELETE CUSTOMER PROCESS
    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {

        $id = $_POST['id'];

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../controllers/CustomerController.php';


            // ERROR HANDLERS
            $errors = [];
            $success = [];

            $result = getCustomer($pdo, $id);

            if (!$result) {
                $errors["customertNotFound"] = "Customer not found.";
            }

            if ($errors) {
                echo json_encode($errors);
                exit;
            } else {
                removeCustomer($pdo, $id);
                $success["success"] = true;
                $success["message"] = "Customer data deleted successfully";
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
    // END OF DELETE CUSTOMER PROCESS



    ///
    else if (isset($_POST['action']) && $_POST['action'] === 'getCustomerCount') {

        try {
            require_once '../config/Database.php';
            require_once '../models/CustomerModel.php';
            require_once '../views/CustomerView.php';
            require_once '../controllers/CustomerController.php';

            $result = getCustomerCount($pdo);

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
