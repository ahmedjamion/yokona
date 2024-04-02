<?php require_once './views/LogInView.php' ?>

<!-- LOG IN PAGE -->

<div class="login-page">
    <h3>Log In</h3>
    <?php logInErrors() ?>

    <!-- LOG IN FORM -->
    <form class="login-form" id="login-form" action="./includes/LogIn.php" method="post">
        <input class="login-input" type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        <input class="login-input" type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        <button type='submit' name='action' value='logIn' id="logIn">Log In</button>
    </form>
</div>