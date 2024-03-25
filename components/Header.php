<?php
require_once 'views/LogInView.php';
?>
<!-- HEADER -->

<div class="main-header">

    <?php loginSuccess(); ?>

    <form action="includes/LogIn.php" method="post">
        <input type="hidden" name="logOut" value="1">
        <input type="submit" name="submit" id="log-out" value="Log Out">
    </form>

</div>