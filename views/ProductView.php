<?php

declare(strict_types=1);


function showAllProducts(object $pdo)
{
    $result = getAllProducts($pdo);
    if (empty($result)) {
        echo 'no result';
    } else {
        foreach ($result as $row) {
            $name = htmlspecialchars($row["name"]);
            $size = htmlspecialchars($row["size"]);
            $type = htmlspecialchars($row["type"]);
            $traySize = htmlspecialchars($row["tray_size"]);
            $price = htmlspecialchars($row["price"]);

            echo "<div>
                <h4>{$name}</h4>
                <p>Size: {$size}</p>
                <p>Type: {$type}</p>
                <p>Tray Size: {$traySize}</p>
                <p>Price: Php {$price}</p>
                </div>";
        }
    }
}
