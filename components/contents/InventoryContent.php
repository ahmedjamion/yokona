<?php
require_once './models/ProductModel.php';
require_once './views/ProductView.php';
?>

<!-- PRODUCTS COMPONENT CONTENTS -->



<h2>Products</h2>
<button class="open-modal add-button" data-modal="addProduct">Add Product</button>


<div class="modal" id="addProduct">
    <!-- ADD PRODUCT FORM CONTAINER -->
    <div class="modal-content">

        <div class="modal-header">
            <h4>Product Details</h4>
            <i class="fa-solid fa-xmark close-modal"></i>
        </div>

        <!-- ADD PRODUCT FORM -->
        <form class="product-form" id="product-form" action="./includes/Product.php" method="post">

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

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addProduct" id="addProduct">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>
        </form>
        <!-- END OF ADD PRODUCT FORM... -->
    </div>
    <!-- END OF ADD PRODUCT FORM CONTAINER... -->
</div>




<div class="table-container">
    <table id="products-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Type</th>
                <th>Tray</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="pt-body">

        </tbody>

    </table>
</div>