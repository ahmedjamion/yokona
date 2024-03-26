<?php
require_once 'config/SessionConfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- JAVASCRIPT LINKS -->
    <!-- echo time(); auto reloads the css file -->
    <link rel="stylesheet" type="text/css" href="assets/css/index.css?v=<?php echo time(); ?>">

    <title>Eggcellent</title>
</head>

<body>

    <?php

    // CHECKING IF USER IS LOGGED IN OR NOT

    // IF USER IS LOGGED IN
    if (isset($_SESSION["userId"])) {
        include 'components/MainPage.php';
    }

    // IF USER IS NOT LOGGED IN
    else {
        include 'components/LoginPage.php';
    }
    ?>

    <!-- JAVASCRIPT LINKS -->
    <!--<script src="assets/js/jquery-3.7.1.min.js"></script>-->
    <script src="assets/js/index.js"></script>
</body>

</html>