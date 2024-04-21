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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Eggcellent</title>
</head>

<body>

    <?php

    // CHECKING IF USER IS LOGGED IN OR NOT

    // IF USER IS LOGGED IN
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        include 'components/MainPage.php';
    }

    // IF USER IS NOT LOGGED IN
    else {
        include 'components/LoginPage.php';
    }
    ?>

    <!-- JAVASCRIPT LINKS -->
    <script src="index.js?v=<?php echo time(); ?>"></script>
</body>

</html>