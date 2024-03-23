<div class="loginPage">
    <h3>Log In</h3>
    <form id="loginForm" action="./includes/LogIn.php" method="post">
        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        <input type="submit" value="Log In" id="login">
    </form>
</div>

<?php
require_once './views/LogInView.php';
logInErrors();
?>