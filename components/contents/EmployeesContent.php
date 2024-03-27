<?php
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>


<!-- EMPLOYEES COMPONENT CONTENTS -->


<h2>Employees</h2>
<button>Add Employee</button>




<!-- ADD EMPLOYEE FORM CONTAINER -->
<div class="add-employee-form-container">

    <!-- ADD EMPLOYEE FORM -->
    <form class="add-employee-form" id="add-employee-form" action="./includes/Employee.php" method="post">
        <input type="hidden" name="addEmployee" value="addEmployee">

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
allEmployees($pdo);
?>