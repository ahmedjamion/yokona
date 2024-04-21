<?php
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>


<!-- EMPLOYEES COMPONENT CONTENTS -->


<h2>Employees</h2>
<button class="open-modal add-button" data-modal="addEmployee">Add Employee</button>




<div class="modal" id="addEmployee">
    <!-- EMPLOYEE FORM CONTAINER -->
    <div class="modal-content">

        <div class="modal-header">
            <h4>Employee Details</h4>
            <i class="fa-solid fa-xmark close-modal"></i>
        </div>

        <!-- EMPLOYEE FORM -->
        <form class="employee-form" id="employee-form" action="./includes/Employee.php" method="post">

            <div class="input-group">
                <label for="empFirstName">First Name</label>
                <input type="text" name="firstName" id="empFirstName" placeholder="First Name" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empLastName">Last Name</label>
                <input type="text" name="lastName" id="empLastName" placeholder="Last Name" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empGender">Tray Size</label>
                <select name="gender" id="empGender">
                    <option hidden disabled selected value> Gender </option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="input-group">
                <label for="empAddress">Address</label>
                <input type="text" name="address" id="empAddress" placeholder="Address" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empContactNumber">Contact Number</label>
                <input type="text" name="contactNumber" id="empContactNumber" placeholder="Contact Number" autocomplete="off">
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

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addEmployee" id="addEmployee">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>
        </form>
        <!-- END OF EMPLOYEE FORM... -->
    </div>
    <!-- END OF EMPLOYEE FORM CONTAINER... -->
</div>




<div class="table-container">
    <table id="employees-table">

        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact #</th>
            </tr>
        </thead>
        <tbody id="et-body">

        </tbody>

    </table>
</div>