<?php

declare(strict_types=1);

// EMPLOYEE CONTROLLER




// CHECK FOR EMPTY INPUTS
function isEmpty($firstName, $lastName, $gender, $address, $contactNumber, $typeId)
{
    if (empty($firstName) || empty($lastName) || empty($gender)  || empty($address) || empty($contactNumber) || empty($typeId)) {
        return true;
    } else {
        return false;
    }
}

// CALLING THE SET EMPLOYEE FUNCTION OF EMPLOYEE MODEL
function addEmployee(object $pdo, string $firstName, string $lastName, string $gender, string $address, string $contactNumber, int $typeId)
{
    setEmployee($pdo, $firstName, $lastName, $gender, $address, $contactNumber, $typeId);
}
