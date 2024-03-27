<?php
require_once './models/CustomerModel.php';
require_once './views/CustomerView.php';
?>

<!-- CUSTOMERS COMPONENT CONTENTS -->


<h2>Customers</h2>
<button>Add Customer</button>




<!-- ADD CUSTOMERS FORM CONTAINER -->
<div class="add-customer-form-container">

    <!-- ADD CUSTOMERS FORM -->
    <form class="add-customer-form" id="add-customer-form" action="./includes/Customer.php" method="post">
        <input type="hidden" name="addCustomer" value="addCustomer">

        <div class="input-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="First Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="gender">Tray Size</label>
            <select name="gender" id="gender">
                <option hidden disabled selected value> Gender </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="input-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Address" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="contactNumber">Contact Number</label>
            <input type="text" name="contactNumber" id="contactNumber" placeholder="Contact Number" autocomplete="off">
        </div>

        <input type="submit" value="Sumbit" id="login">
    </form>
    <!-- END OF ADD CUSTOMERS FORM... -->
</div>
<!-- END OF ADD CUSTOMERS FORM CONTAINER... -->

<?php showAllCustomers($pdo) ?>