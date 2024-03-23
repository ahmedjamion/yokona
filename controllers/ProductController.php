<?php

declare(strict_types=1);

//CHECK FOR EMPTY INPUTS
function isEmpty($productName, $size, $type, $traySize, $price)
{
    if (empty($productName) || empty($size) || empty($type)  || empty($traySize) || empty($price)) {
        return true;
    } else {
        return false;
    }
}

//CALLING THE SET PRODUCT FUNCTION OF PRODUCT MODEL
function addProduct(object $pdo, string $productName, string $type, string $size, string $traySize, float $price)
{
    setProduct($pdo, $productName, $type, $size, $traySize, $price);
}
