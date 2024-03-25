<?php

declare(strict_types=1);

// LOGIN CONTROLLER




// CHECK FOR EMPTY INPUTS
function isEmpty(string $username, string $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

// CHECK FOR USERNAME
function userNotFound(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

// VERIFY PASSWORD
function wrongPassword(string $password, string $hashedPassword)
{
    if (!password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}
