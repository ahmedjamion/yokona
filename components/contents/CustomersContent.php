<?php
require_once './models/CustomerModel.php';
require_once './views/CustomerView.php';
?>



<!-- CUSTOMERS COMPONENT CONTENTS -->




<h2>Customers</h2>
<button class="open-modal add-button" data-modal="addCustomer">Add Customer</button>



<div class="modal" id="addCustomer">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Customer Details</h4>
            <i class="fa-solid fa-xmark close-modal"></i>
        </div>

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

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addCustomer" id="addCustomer">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>

        </form>

    </div>
</div>


<div class="table-container">
    <table id="customers-table">

        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact #</th>
            </tr>
        </thead>
        <tbody id="ct-body">

        </tbody>

    </table>
</div>