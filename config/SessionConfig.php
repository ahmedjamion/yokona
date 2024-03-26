<?php
//SESSION HANDLING
/*

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => $_SERVER['HTTP_HOST'],
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["userId"])) {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionIdLoggedIn();
    } else {
        $interval = 10;
        if (time() - $_SESSION["lastRegeneration"] >= $interval) {
            regenerateSessionIdLoggedIn();
        }
    }
} else {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionId();
    } else {
        $interval = 10;
        if (time() - $_SESSION["lastRegeneration"] >= $interval) {
            regenerateSessionId();
        }
    }
}



function regenerateSessionIdLoggedIn()
{
    session_regenerate_id(true);

    $userId = $_SESSION["userId"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["lastRegeneration"] = time();
}

function regenerateSessionId()
{
    session_regenerate_id(true);
    $_SESSION["lastRegeneration"] = time();
}

*/
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => $_SERVER['HTTP_HOST'],
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['lastRegeneration'] = time();
    $_SESSION['sessionId'] = session_id();
} else {
    $interval = 1;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        session_regenerate_id(true);
        $_SESSION['lastRegeneration'] = time();
        $_SESSION['sessionId'] = session_id();
    }
}
