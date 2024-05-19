<?php
require_once 'config/Session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- JAVASCRIPT LINKS -->
    <!-- echo time(); auto reloads the css file -->
    <link rel="stylesheet" type="text/css" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.min.css?v=<?php echo time(); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png?v=<?php echo time(); ?>">
    <link rel="manifest" href="favicon/site.webmanifest?v=<?php echo time(); ?>">

    <title>Eggcellent</title>
</head>

<body style="background-image: url(assets/bg/egg.jpg);">
    <div class="overlay"></div>


    <?php

    // CHECKING IF USER IS LOGGED IN OR NOT

    // IF USER IS LOGGED IN
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        $userId = $_SESSION["userId"];
        include 'components/Loader.php';
        include 'components/MainPage.php';
    }

    // IF USER IS NOT LOGGED IN
    else {
        include 'components/Loader.php';
        include 'components/LoginPage.php';
    }
    ?>


    <!-- JAVASCRIPT LINKS -->
    <?php
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    ?>

        <script src="assets/js/chart.js?v=<?php echo time(); ?>"></script>
        <script src="index.js?v=<?php echo time(); ?>"></script>

    <?php
    }
    ?>
</body>

</html>