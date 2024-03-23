<?php

declare(strict_types=1);

function logInErrors()
{
    if (isset($_SESSION["logInErrors"])) {
        $errors = $_SESSION["logInErrors"];

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION["logInErrors"]);
    }
}

function loginSuccess()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        echo 'Login Success ';
        echo ucfirst($_SESSION["username"]);
    }
}
