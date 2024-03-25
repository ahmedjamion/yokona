<?php

declare(strict_types=1);

//LOG IN VIEW




// SHOWS LOG IN ERRORS
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


// SHOWS SUCCESS MESSAGE FOR SUCCESSFUL LOG IN
function loginSuccess()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        echo '<p>You are logged in as ' . ucfirst($_SESSION["username"]) . '</p>';
    }
}
