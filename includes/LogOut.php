<?php

//LOG OUT PROCESS
//I'M NOT SURE IF THIS IS THE CORRECT WAY OF DOING THIS

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../index.php");
    die();
}
