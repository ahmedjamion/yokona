<?php

declare(strict_types=1);

//PRODUCT VIEW




// SHOW ALL PRODUCTS
function showAllProducts(object $pdo)
{
    $result = getAllProducts($pdo);
    if (empty($result)) {
        echo '<h4>NO PRODUCTS</h4>';
    } else {
        foreach ($result as $row) {
            $id = $row["id"];
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
                <a href='./includes/ViewProduct.php?id={$id}'><button>View</button></a>
                <a href='./includes/UpdateProduct.php?id={$id}'><button>Update</button></a>
                <a href='./includes/DeleteProduct.php?id={$id}'><button>Delete</button></a>
                </div>";
        }
    }
}
