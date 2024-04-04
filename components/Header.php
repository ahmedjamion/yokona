<?php
require_once 'views/LogInView.php';
?>
<!-- HEADER -->




<div class="main-header">
    <h1>Eggcellent Poultry Farm Management System</h1>
    <div class="log-out">
        <form action="includes/LogIn.php" method="post">
            <button class="logout-button" type='submit' name='action' value='logOut' id="logOut">Log Out</button>
        </form>
    </div>
</div>