<?php

declare(strict_types=1);

//LOG IN VIEW




// SHOWS LOG IN ERRORS
function logInErrors()
{
    if (isset($_SESSION["logInErrors"])) {
        $errors = $_SESSION["logInErrors"];

        if ($errors) {
            foreach ($errors as $error) {
                echo $error;
                echo '</br>';
            }
        } else {
            echo "";
        }

        unset($_SESSION["logInErrors"]);
    }
}

function getErrors()
{
    if (isset($_SESSION["logInErrors"])) {
        $errors = $_SESSION["logInErrors"];

        if ($errors) {
            echo json_encode($errors);
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
