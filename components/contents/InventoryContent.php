<?php
require_once './models/ProductModel.php';
require_once './views/ProductView.php';
?>

<!-- PRODUCTS COMPONENT CONTENTS -->



<h2>Products</h2>
<button>Add Product</button>


<!-- ADD PRODUCT FORM CONTAINER -->
<div class="add-product-form-container">

    <!-- ADD PRODUCT FORM -->
    <form class="add-product-form" id="add-product-form" action="./includes/Product.php" method="post">
        <input type="hidden" name="addProduct" value="addProduct">

        <div class="input-group">
            <label for="productName">Name</label>
            <input type="text" name="productName" id="productName" placeholder="Product Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="size">Size</label>
            <select name="size" id="size">
                <option hidden disabled selected value> Egg Size </option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
                <option value="Extra-Large">Extra-Large</option>
                <option value="Jumbo">Jumbo</option>
                <option value="Super-Jumbo">Super-Jumbo</option>
            </select>
        </div>

        <div class="input-group">
            <label for="type">Type</label>
            <select name="type" id="type">
                <option hidden disabled selected value> Egg Type </option>
                <option value="Standard">Standard</option>
                <option value="Organic">Organic</option>
                <option value="Cage-Free">Cage-Free</option>
                <option value="Free-Range">Free-Range</option>
            </select>
        </div>

        <div class="input-group">
            <label for="traySize">Tray Size</label>
            <select name="traySize" id="traySize">
                <option hidden disabled selected value> Tray Size </option>
                <option value="30">30</option>
                <option value="15">15</option>
                <option value="10">10</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="input-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" placeholder="Price">
        </div>

        <input type="submit" name="addProduct" value="addProduct" id="addProduct">
    </form>
    <!-- END OF ADD PRODUCT FORM... -->
</div>
<!-- END OF ADD PRODUCT FORM CONTAINER... -->




<!-- SHOW ALL PRODUCTS -->
<?php
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
             <form method='POST' action='./includes/Product.php'>
                 <input type='hidden' name='id' value='{$id}'>
                 <button type='submit' name='deleteProduct' value='deleteProduct'>Delete</button>
                 <button type='submit' name='editProduct' value='editProduct'>Edit</button>
                 <button type='submit' name='viewProduct' value='viewProduct'>View</button>
                 <button type='submit' name='logProduce' value='logProduce'>Log Produce</button>
             </form>
             </div>";
    }
}
?>