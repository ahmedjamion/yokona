<h2>Products</h2>
<button>Add Product</button>
<div>
    <form id="addProductForm" action="./includes/AddProduct.php" method="post">
        <input type="text" name="productName" id="productName" placeholder="Product Name" autocomplete="off">

        <label for="size">Size:</label>
        <select name="size" id="size">
            <option hidden disabled selected value> Egg Size </option>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
            <option value="Extra-Large">Extra-Large</option>
            <option value="Jumbo">Jumbo</option>
            <option value="Super-Jumbo">Super-Jumbo</option>
        </select>

        <label for="type">Type:</label>
        <select name="type" id="type">
            <option hidden disabled selected value> Egg Type </option>
            <option value="Standard">Standard</option>
            <option value="Organic">Organic</option>
            <option value="Cage-Free">Cage-Free</option>
            <option value="Free-Range">Free-Range</option>
        </select>

        <label for="traySize">Tray Size:</label>
        <select name="traySize" id="traySize">
            <option hidden disabled selected value> Tray Size </option>
            <option value="30">30</option>
            <option value="15">15</option>
            <option value="10">10</option>
            <option value="6">6</option>
        </select>

        <input type="number" name="price" id="price" step="0.01" placeholder="Price">

        <input type="submit" value="Sumbit" id="login">
    </form>
</div>
<div>
    <?php
    showAllProducts($pdo);
    ?>
</div>