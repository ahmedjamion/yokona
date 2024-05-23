<?php

declare(strict_types=1);

// CUSTOMER CONTROLLER




// CHECK FOR EMPTY INPUTS
function isEmpty($employeeId, $username, $password, $role)
{
    if (empty($employeeId) || empty($username) || empty($password)  || empty($role)) {
        return true;
    } else {
        return false;
    }
}




// CALLING THE SET CUSTOMER FUNCTION OF PRODUCT MODEL
function addUser(object $pdo, int $employeeId, string $username, string $password, string $role, ?string $path)
{
    setUser($pdo, $employeeId, $username, $password, $role, $path);
}




// CALLING THE DELETE CUSTOMER FUNCTION OF PRODUCT MODEL
function removeUser(object $pdo, int $id)
{
    deleteUser($pdo, $id);
}


function formatOk(string $fileExtension)
{
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExtension, $allowedFormats)) {
        return true;
    }
}

function sizeOk(float $size)
{
    $maxFileSize = 5 * 1024 * 1024;
    if ($size <= $maxFileSize) {
        return true;
    }
}
