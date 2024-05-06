<?php
require_once './models/ProductModel.php';
require_once './views/ProductView.php';
?>

<!-- INVENTORY COMPONENT CONTENTS -->



<div class="c-tabs" id="main-component">


    <!-- INNER COMPONENT NAV -->
    <div class="c-tab-nav">

        <button class="c-tab-button" data-for-tab="products"><i class="fa-solid fa-egg"></i> Products</button>

        <button class="c-tab-button" data-for-tab="producelogs"><i class="fa-solid fa-calendar-check"></i> Produce Logs</button>

    </div>
    <!-- END OF INNER COMPONENT SIDEBAR -->




    <!-- TAB CONTENTS -->





    <!-- PRODUCTS -->
    <div class="c-tab-content" data-tab="products">
        <h2>Products</h2>
        <button class="open-modal add-button" data-modal="addProduct">New Product</button>







        <div class="table-container">
            <table id="products-table">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Egg Size</th>
                        <th>Type</th>
                        <th>Tray Size</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="pt-body">

                </tbody>

            </table>
        </div>
    </div>


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
                        <option hidden selected value=""> Egg Size </option>
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
                        <option hidden selected value=""> Egg Type </option>
                        <option value="Standard">Standard</option>
                        <option value="Organic">Organic</option>
                        <option value="Cage-Free">Cage-Free</option>
                        <option value="Free-Range">Free-Range</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="traySize">Tray Size</label>
                    <select name="traySize" id="traySize">
                        <option hidden selected value=""> Tray Size </option>
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
                    <button class="submit-button" type="submit" name="action" value="addProduct">Submit</button>
                    <button class="close-modal cancel-button">Cancel</button>
                </div>
            </form>
            <!-- END OF ADD PRODUCT FORM... -->
        </div>
        <!-- END OF ADD PRODUCT FORM CONTAINER... -->
    </div>





    <div class="c-tab-content" data-tab="producelogs">
        <h2>Produce Logs</h2>
        <button class="open-modal add-button" data-modal="logProduce">New Log</button>
    </div>


    <div class="modal" id="logProduce">
        <div class="modal-content">

            <div class="modal-header">
                <h4>Log Details</h4>
                <i class="fa-solid fa-xmark close-modal"></i>
            </div>


            <button class="open-modal" data-modal="chooseProduct">Select Product</button>
            <div class="modal" id="chooseProduct">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4>Select a product</h4>
                        <i class="fa-solid fa-xmark close-modal"></i>
                    </div>
                    <div class="product-selection">

                    </div>
                </div>
            </div>



            <form class="produce-form" id="produce-form" action="./includes/Product.php" method="post">

                <div class="sp-card">
                    <p>Select a product to log</p>
                </div>

                <input type="hidden" name="id" id="pp-id">

                <div class="input-group">
                    <label for="log-date">Date</label>
                    <input type="date" id="log-date" name="date">
                </div>

                <div class="input-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity">
                </div>

                <div class="button-group">
                    <button class="submit-button" type="submit" name="action" value="logProduce">Submit</button>
                    <button class="close-modal cancel-button">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>