<?php require_once './views/LogInView.php' ?>

<!-- LOG IN PAGE -->

<div class="login-page">
    <div class="login-container">
        <h3 class="login-title">Log In</h3>
        <div class="login-errors">
            <?php logInErrors() ?>
        </div>

        <!-- LOG IN FORM -->
        <form class="login-form" id="loginForm" action="./includes/LogIn.php" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input class="login-input" type="text" name="username" id="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input class="login-input" type="password" name="password" id="password" placeholder="Password" autocomplete="off">
            </div>
            <button class="login-button" type='submit' name='action' value='logIn' id="logIn">Log In</button>
        </form>
    </div>
</div>