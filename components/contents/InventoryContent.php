<?php
require_once './models/ProductModel.php';
require_once './views/ProductView.php';
?>

<!-- PRODUCTS COMPONENT CONTENTS -->



<!-- PRODUCT CONTENT TABS -->
<!-- PRODUCT CONTENT CONTAINER -->
<div class="content-tabs">


    <!-- PRODUCT CONTENT NAV -->
    <div class="c-tab-nav">
        <button class="c-tab-button" data-for-tab="product">Products</button>
        <button class="c-tab-button" data-for-tab="produce">Produce Log</button>
    </div>
    <!-- END OF PRODUCT CONTENT NAV -->




    <!-- TAB CONTENTS -->

    <!-- PRODUCTS -->
    <div class="c-tab-content" data-tab="product">
        <h2>Products</h2>
        <button>Add Product</button>
        <?php include './components/modals/ProductModal.php'; ?>
        <?php showAllProducts($pdo); ?>
    </div>

    <!-- PRODUCE -->
    <div class="c-tab-content" data-tab="produce">

    </div>


</div>