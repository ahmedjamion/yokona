<?php require_once './views/LogInView.php' ?>

<!-- LOG IN PAGE -->

<div class="login-page">
    <div class="login-container">
        <h3 class="login-title">Log In</h3>
        <p class="login-errors">
            <?php logInErrors() ?>
        </p>

        <!-- LOG IN FORM -->
        <form class="login-form" id="loginForm" action="./includes/LogIn.php" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <div class="input-cont">
                    <input class="login-input" type="text" name="username" id="username" placeholder="Username" autocomplete="off">
                    <i class="fa-solid fa-user input-icon"></i>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-cont">
                    <input class="login-input" type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                    <i class="fa-solid fa-lock input-icon"></i>
                </div>
            </div>
            <button class="login-button" type='submit' name='action' value='logIn' id="logIn">Log In <i class="fa-solid fa-right-to-bracket"></i></button>
        </form>
    </div>
</div>

<script>
    const loginErrors = document.querySelector('.login-errors');
    if (loginErrors !== '') {
        setTimeout(() => {
            loginErrors.innerHTML = '';
        }, 3000);
    }
</script>