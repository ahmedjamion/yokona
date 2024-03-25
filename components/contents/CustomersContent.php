<!-- CUSTOMERS COMPONENT CONTENTS -->


<h2>Customers</h2>
<button>Add Customer</button>




<!-- ADD CUSTOMERS FORM CONTAINER -->
<div class="add-customer-container">

    <!-- ADD CUSTOMERS FORM -->
    <form class="add-customer-form" id="add-customer-form" action="./includes/Employee.php" method="post">
        <input type="hidden" name="addEmployee" value="1">

        <div class="input-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="First Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" placeholder="Gender" autocomplete="off">
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