<?php

declare(strict_types=1);

function isEmpty(string $username, string $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function userNotFound(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function wrongPassword(string $password, string $hashedPassword)
{
    if (!password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}
