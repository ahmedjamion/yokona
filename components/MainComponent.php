<!-- MAIN COMPONENT TABS -->



<!-- MAIN COMPONENT CONTAINER -->
<div class="tabs" id="main-component">


    <!-- MAIN COMPONENT SIDEBAR -->
    <div class="tab-nav">
        <i class="fa-solid fa-angle-left close-sidebar"></i>

        <button class="tab-button" data-for-tab="dashboard">Dashboard</button>

        <button class="tab-button" data-for-tab="inventory">Inventory</button>

        <button class="tab-button" data-for-tab="orders">Orders</button>

        <button class="tab-button" data-for-tab="monitoring">Monitoring</button>

        <button class="tab-button" data-for-tab="reports">Reports</button>

        <button class="tab-button" data-for-tab="customers">Customers</button>

        <button class="tab-button" data-for-tab="employees">Employees</button>

        <button class="tab-button" data-for-tab="users">Users</button>

    </div>
    <!-- END OF MAIN MAIN COMPONENT SIDEBAR -->




    <!-- TAB CONTENTS -->





    <!-- DASHBOARD -->
    <div class="tab-content" data-tab="dashboard">
        <?php
        include 'contents/DashboardContent.php';
        /*
        echo "logged in = " . $_SESSION["loggedIn"] . "<br>";
        echo "user id = " . $_SESSION["userId"] . "<br>";
        echo "username = " . $_SESSION["username"] . "<br>";
        echo "role = " . $_SESSION["role"] . "<br>";
        echo "sessionId = " . $_SESSION["sessionId"] . "<br>";
        echo "last regeneration = " . $_SESSION["lastRegeneration"];
        */
        ?>
    </div>




    <!-- PRODUCTS -->
    <div class="tab-content" data-tab="inventory">
        <?php
        include 'contents/InventoryContent.php';
        ?>
    </div>





    <!-- ORDERS -->
    <div class="tab-content" data-tab="orders">
        <?php
        include 'contents/OrdersContent.php';
        ?>
    </div>





    <!-- MONITORING -->
    <div class="tab-content" data-tab="monitoring">
        <?php
        include 'contents/MonitoringContent.php';
        ?>
    </div>





    <!-- REPORTS -->
    <div class="tab-content" data-tab="reports">
        <?php
        include 'contents/ReportsContent.php';
        ?>
    </div>




    <!-- CUSTOMERS -->
    <div class="tab-content" data-tab="customers">
        <?php
        include 'contents/CustomersContent.php';
        ?>
    </div>





    <!-- EMPLOYEES -->
    <div class="tab-content" data-tab="employees">
        <?php
        include 'contents/EmployeesContent.php';
        ?>
    </div>





    <!-- EMPLOYEES -->
    <div class="tab-content" data-tab="users">
        <?php
        include 'contents/UsersContent.php';
        ?>
    </div>
    <!-- END OF TAB CONTENTS -->




</div>