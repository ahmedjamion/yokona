<?php
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>


<!-- EMPLOYEES COMPONENT CONTENTS -->


<div class="c-container">
    <h2>Employees</h2>
    <div class="s-group">
        <button class="open-modal add-button" data-modal="addEmployee"><span class="button-text">New Employee</span> <i class="fa-solid fa-plus"></i></button>
        <input class="search" type="search" id="employee-search" name="search" placeholder="Search employee">
    </div>


    <div class="table-container">
        <table id="employees-table">

            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="et-body">

            </tbody>

        </table>
    </div>
</div>


<!-- MODALS -->


<div class="modal" id="addEmployee">
    <!-- EMPLOYEE FORM CONTAINER -->
    <div class="modal-content">

        <div class="modal-header">
            <h4>Employee Details</h4>
        </div>

        <button class="close-modal x"><i class="fa-solid fa-xmark"></i></button>

        <!-- EMPLOYEE FORM -->
        <form class="employee-form" id="employee-form" action="./includes/Employee.php" method="post">

            <div class="input-group">
                <label for="empFirstName">First Name</label>
                <input type="text" name="firstName" id="empFirstName" placeholder="e.g. Albert" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empLastName">Last Name</label>
                <input type="text" name="lastName" id="empLastName" placeholder="e.g. Einstein" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empGender">Gender</label>
                <select name="gender" id="empGender">
                    <option hidden selected value="">--Select gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="input-group">
                <label for="empAddress">Address</label>
                <input type="text" name="address" id="empAddress" placeholder="e.g. Sta. Maria, ZC" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="empContactNumber">Contact Number</label>
                <input type="text" name="contactNumber" id="empContactNumber" placeholder="e.g. 09123456789" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="employeeType">Employee Type</label>
                <select name="employeeType" id="employeeType">
                    <option hidden selected value="">--Select employee type--</option>
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