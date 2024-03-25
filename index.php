<!-- INDEX PAGE -->


<?php
require_once 'config/SessionConfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/index.css?v=<?php echo time(); ?>">

    <title>WebSystem</title>
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
        include 'components/LogInPage.php';
    }
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>