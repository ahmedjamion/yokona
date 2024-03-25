<!-- MAIN COMPONENT TABS -->



<!-- MAIN COMPONENT CONTAINER -->
<div class="main-component">


    <!-- MAIN COMPONENT SIDEBAR -->
    <div class="mc-sidebar">
        <button class="mc-tab-button" data-for-tab="dashboard">Dashboard</button>
        <button class="mc-tab-button" data-for-tab="products">Products</button>
        <button class="mc-tab-button" data-for-tab="orders">Orders</button>
        <button class="mc-tab-button" data-for-tab="monitoring">Monitoring</button>
        <button class="mc-tab-button" data-for-tab="reports">Reports</button>
        <button class="mc-tab-button" data-for-tab="customers">Customers</button>
        <button class="mc-tab-button" data-for-tab="employees">Employees</button>
    </div>
    <!-- END OF MAIN MAIN COMPONENT SIDEBAR -->




    <!-- TAB CONTENTS -->
    <div class="mc-tab-content" data-tab="dashboard">Dashboard</div>
    <div class="mc-tab-content" data-tab="products">
        <?php
        include 'contents/ProductsContent.php';
        ?>
    </div>
    <div class="mc-tab-content" data-tab="orders">Orders</div>
    <div class="mc-tab-content" data-tab="monitoring">Monitoring</div>
    <div class="mc-tab-content" data-tab="reports">Reports</div>
    <div class="mc-tab-content" data-tab="customers">Customers</div>
    <div class="mc-tab-content" data-tab="employees">
        <?php
        include 'contents/EmployeesContent.php';
        ?>
    </div>
    <!-- END OF TAB CONTENTS -->


</div>