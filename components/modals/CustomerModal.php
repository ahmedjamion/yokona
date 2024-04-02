<!-- CUSTOMERS FORM CONTAINER -->
<div class="customer-form-container">

    <!-- CUSTOMERS FORM -->
    <form class="customer-form" id="customer-form" action="./includes/Customer.php" method="post">
        <div class="input-group">
            <label for="custFirstName">First Name</label>
            <input type="text" name="firstName" id="custFirstName" placeholder="First Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="custLastName">Last Name</label>
            <input type="text" name="lastName" id="custLastName" placeholder="Last Name" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="custGender">Gender</label>
            <select name="gender" id="custGender">
                <option hidden disabled selected value> Gender </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="input-group">
            <label for="custAddress">Address</label>
            <input type="text" name="address" id="custAddress" placeholder="Address" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="custContactNumber">Contact Number</label>
            <input type="text" name="contactNumber" id="custContactNumber" placeholder="Contact Number" autocomplete="off">
        </div>

        <input type="submit" name="addCustomer" value="addCustomer" id="addCustomer">
    </form>
    <!-- END OF CUSTOMERS FORM... -->
</div>
<!-- END OF CUSTOMERS FORM CONTAINER... -->