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
function addCustomer(object $pdo, int $employeeId, string $username, string $password, string $role)
{
    setUser($pdo, $employeeId, $username, $password, $role);
}
