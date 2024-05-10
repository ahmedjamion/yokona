<?php

declare(strict_types=1);

// PRODUCT CONTROLLER




// CHECK FOR EMPTY INPUTS
function areEmpty($productName, $size, $type, $traySize, $price)
{
    if (empty($productName) || empty($type) || empty($size)  || empty($traySize) || empty($price)) {
        return true;
    } else {
        return false;
    }
}




// CALLING THE SET PRODUCT FUNCTION OF PRODUCT MODEL
function addProduct(object $pdo, string $productName, string $type, string $size, string $traySize, float $price)
{
    setProduct($pdo, $productName, $type, $size, $traySize, $price);
}




// CALLING THE DELETE PRODUCT FUNCTION OF PRODUCT MODEL
function removeProduct(object $pdo, int $id)
{
    deleteProduct($pdo, $id);
}
