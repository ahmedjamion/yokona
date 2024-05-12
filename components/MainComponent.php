<!-- MAIN COMPONENT TABS -->
<script>
    const userId = <?php echo json_encode($userId) ?>
</script>

<!-- MAIN COMPONENT CONTAINER -->
<div class="tabs" id="main-component">

    <!-- MAIN COMPONENT SIDEBAR -->
    <div class="tab-nav">
        <i class="fa-solid fa-angle-left close-sidebar"></i>

        <button class="tab-button" data-for-tab="dashboard">
            <div class="tab-icon"><i class="fa-solid fa-square-poll-vertical"></div></i>Dashboard
        </button>

        <button class="tab-button" data-for-tab="inventory">
            <div class="tab-icon"><i class="fa-solid fa-egg"></i></div>Inventory
        </button>

        <button class="tab-button" data-for-tab="orders">
            <div class="tab-icon"><i class="fa-solid fa-file-pen"></i></div>Orders
        </button>

        <button class="tab-button" data-for-tab="monitoring">
            <div class="tab-icon"><i class="fa-solid fa-eye"></i></div>Monitoring
        </button>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>

            <button class="tab-button" data-for-tab="reports">
                <div class="tab-icon"><i class="fa-solid fa-clipboard-check"></div></i>Reports
            </button>

            <button class="tab-button" data-for-tab="customers">
                <div class="tab-icon"><i class="fa-solid fa-users"></i></div>Customers
            </button>

            <button class="tab-button" data-for-tab="employees">
                <div class="tab-icon"><i class="fa-solid fa-user-tie"></i></div>Employees
            </button>

            <button class="tab-button" data-for-tab="users">
                <div class="tab-icon"><i class="fa-solid fa-user"></i></div>Users
            </button>

        <?php } ?>

        <div class="log-out">
            <form action="includes/LogIn.php" method="post" id="logOutForm">
                <button class="logout-button" type='submit' name='action' value='logOut' id="logOut">Log Out <i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>

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
    <div class="tab-content inv" data-tab="inventory">
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
    <div class="tab-content use" data-tab="users">
        <?php
        include 'contents/UsersContent.php';
        ?>
    </div>
    <!-- END OF TAB CONTENTS -->




</div>