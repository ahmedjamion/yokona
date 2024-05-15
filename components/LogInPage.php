<?php require_once './views/LogInView.php' ?>

<!-- LOG IN PAGE -->

<style>
    #eggc {
        font-family: gluten;
        color: white;
        text-align: center;
        position: fixed;
        bottom: 10px;
    }
</style>

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

    <h1 id="eggc">Eggcellent</h1>
</div>

<script>
    const loginErrors = document.querySelector('.login-errors');
    if (loginErrors !== '') {
        setTimeout(() => {
            loginErrors.innerHTML = '';
        }, 3000);
    }


    const container = document.querySelector('.login-container');

    const inputs = document.querySelectorAll('.login-input');

    inputs.forEach((input) => {
        input.addEventListener('focus', () => {
            container.style.boxShadow = '0 0 40px rgba(255, 255, 255, 0.5)';
            container.style.transform = 'scale(1.05)';
        })
        input.addEventListener('blur', () => {
            container.style.boxShadow = 'none';
            container.style.transform = 'scale(1)';
        });
    })
</script>