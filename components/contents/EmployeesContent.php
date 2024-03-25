<!-- EMPLOYEES COMPONENT CONTENTS -->


<h2>Employees</h2>
<button>Add Employee</button>




<!-- ADD EMPLOYEE FORM CONTAINER -->
<div class="add-employee-container">

    <!-- ADD EMPLOYEE FORM -->
    <form class="add-employee-form" id="add-employee-form" action="./includes/Employee.php" method="post">
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

        <div class="input-group">
            <label for="employeeType">Employee Type</label>
            <select name="employeeType" id="employeeType">
                <option hidden disabled selected value> Employee Type </option>
                <option value="1">Manager</option>
                <option value="2">Sales</option>
                <option value="3">Checker</option>
                <option value="4">Staff</option>
            </select>
        </div>

        <input type="submit" value="Sumbit" id="login">
    </form>
    <!-- END OF ADD EMPLOYEE FORM... -->
</div>
<!-- END OF ADD EMPLOYEE FORM CONTAINER... -->




<?php
showAllEmployees($pdo);
?>