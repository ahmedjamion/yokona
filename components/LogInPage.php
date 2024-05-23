<?php

require_once './views/LogInView.php'

?>

<!-- LOG IN PAGE -->

<style>
    #eggc {
        font-family: gluten;
        color: white;
        text-align: center;
        position: fixed;
        bottom: 10px;
    }

    .login-errors {
        position: absolute;
        top: -70px;
        left: 0px;
        right: 0px;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        border-radius: 10px;
        padding: 10px;
        text-align: center;
        text-wrap: pretty;
    }
</style>

<div class="login-page">
    <div class="login-container">
        <h3 class="login-title">Log In</h3>
        <div class="login-errors" style="display: none; opacity: 0;">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <?php echo logInErrors(); ?>
        </div>
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

    <h1 id="eggc">Eggcellent</h1>
</div>

<script>
    window.addEventListener('load', () => showLoadingScreen());

    document.addEventListener('DOMContentLoaded', () => {
        const container = document.querySelector('.login-container');

        const inputs = document.querySelectorAll('.login-input');

        inputs.forEach((input) => {
            input.addEventListener('focus', () => {
                container.style.transform = 'scale(1.05)';
            })
            input.addEventListener('blur', () => {
                container.style.transform = 'scale(1)';
            });
        });

        setTimeout(() => {
            hideLoadingScreen();
            handleErrors();
        }, 2000);
    })

    function handleErrors() {
        const loginErrors = document.querySelector('.login-errors');

        loginErrors.style.color = 'lightsalmon';

        if (loginErrors.innerText.trim() === '') {
            loginErrors.style.display = 'none';
            loginErrors.style.opacity = '0';
        } else {
            loginErrors.style.display = 'block';
            loginErrors.style.opacity = '1';
            loginErrors.style.animation = 'appear .25s';
            setTimeout(() => {
                setTimeout(() => {
                    loginErrors.style.display = 'none';
                }, 250);
                loginErrors.style.opacity = '0';
                loginErrors.style.animation = 'disappear .25s';
            }, 3000);
        }
    }
</script>