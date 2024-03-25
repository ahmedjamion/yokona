<?php
require_once './views/LogInView.php';
logInErrors();
?>

<div class="login-page">
    <h3>Log In</h3>
    <form class="login-form" id="login-form" action="./includes/LogIn.php" method="post">
        <input type="hidden" name="logIn" value="1">
        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        <input type="submit" value="Log In" id="login">
    </form>
</div>