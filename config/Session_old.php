<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => $_SERVER['HTTP_HOST'],
    'path' => '/',
    //'secure' => true,
    'httponly' => true
]);

session_start();

if (!isset($_SESSION['lastRegeneration'])) {
    session_regenerate_id(true);
    $_SESSION['lastRegeneration'] = time();
    $_SESSION['sessionId'] = session_id();
} else {
    $interval = 60 * 30;

    if (time() - $_SESSION['lastRegeneration'] >= $interval) {
        session_regenerate_id(true);
        $_SESSION['lastRegeneration'] = time();
        $_SESSION['sessionId'] = session_id();
    }
}
