<?php

require_once 'config/SessionConfig.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="app.css">

    <title>WebSystem</title>
</head>

<body>
    <?php
    //CHECKING IF USER IS LOGGED IN OR NOT
    //LOADS A SPECIFIC PAGE FOR EACH CASE
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        include 'components/MainPage.php';
    } else {
        include 'components/LogInPage.php';
    }
    ?>

    <script src="app.js"></script>
</body>

</html>