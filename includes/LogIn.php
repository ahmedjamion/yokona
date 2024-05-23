<?php
// LOG IN & LOG OUT


header('Content-Type: application/json');

// LOG IN AND LOG OUT PROCESS
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // LOG IN PROCESS
    if (isset($_POST["action"]) && $_POST["action"] === "logIn") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            require_once '../config/Database.php';
            require_once '../models/LoginModel.php';
            require_once '../controllers/LogInController.php';


            // ERROR HANDLERS
            $errors = [];

            if (isEmpty($username, $password)) {
                $errors["emptyInput"] = "Fill in all fields.";
            }

            $result = getUser($pdo, $username);

            if (userNotFound($result)) {
                $errors["invalidCredential"] = "Wrong username or password.";
            }

            if (!userNotFound($result) && wrongPassword($password, $result["password"])) {
                $errors["invalidCredential"] = "Wrong username or password.";
            }

            require_once '../config/Session.php';

            if ($errors) {
                $_SESSION['logInErrors'] = $errors;
                header("Location: ../index.php");
                die();
            }


            //SESSION RELATED STUFF, SOMETHINGS WRONG HERE...
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . password_hash($result["username"], PASSWORD_BCRYPT);
            session_id($sessionId);

            $_SESSION["loggedIn"] = true;
            $_SESSION["userId"] = htmlspecialchars($result["id"]);
            $_SESSION["username"] = htmlspecialchars($result["username"]);
            $_SESSION["role"] = htmlspecialchars($result["role"]);
            $_SESSION["lastRegeneration"] = time();


            $pdo = null;
            $statement = null;

            header("Location: ../index.php");

            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    // END OF LOG IN PROCESS...




    // LOG OUT PROCESS
    else if (isset($_POST["action"]) && $_POST["action"] === "logOut") {
        session_start();
        session_unset();
        session_destroy();

        $response = [];
        $response['success'] = true;
        $response['message'] = 'log out successful';


        echo json_encode($response);
        die();
    }
    // END OF LOG OUT PROCESS...


} else {
    header("Location: ../index.php");
    die();
}
