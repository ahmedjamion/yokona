<?php

//SESSION HANDLING

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["userId"])) {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionIdLoggedIn();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["lastRegeneration"] >= $interval) {
            regenerateSessionIdLoggedIn();
        }
    }
} else {
    if (!isset($_SESSION["lastRegeneration"])) {
        regenerateSessionId();
    } else {
        $interval = 60 * 30;
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
