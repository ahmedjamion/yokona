<?php

//PROCESS LOG IN

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once '../config/Database.php';
        require_once '../models/LoginModel.php';
        require_once '../controllers/LogInController.php';

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

        require_once '../config/SessionConfig.php';

        if ($errors) {
            $_SESSION['logInErrors'] = $errors;
            header("Location: ../index.php");
            die();
        }


        //SESSION RELATED STUFF, SOMETHINGS WRONG HERE...
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["loggedIn"] = true;
        $_SESSION["userId"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);
        $_SESSION["userRole"] = $result["role"];
        $_SESSION["lastRegeneration"] = time();

        $pdo = null;
        $statement = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
