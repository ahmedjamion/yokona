<?php

declare(strict_types=1);

// CUSTOMER CONTROLLER




// CHECK FOR EMPTY INPUTS
function isEmpty($firstName, $lastName, $gender, $address, $contactNumber)
{
    if (empty($firstName) || empty($lastName) || empty($gender)  || empty($address) || empty($contactNumber)) {
        return true;
    } else {
        return false;
    }
}

// CALLING THE SET CUSTOMER FUNCTION OF PRODUCT MODEL
function addCustomer(object $pdo, string $firstName, string $lastName, string $gender, string $address, string $contactNumber)
{
    setCustomer($pdo, $firstName, $lastName, $gender, $address, $contactNumber);
}

// CALL THE DELETE CUSTOMER FUNTION OF CUSTOMER MODEL
function removeCustomer(object $pdo, int $id)
{
    deleteCustomer($pdo, $id);
}
