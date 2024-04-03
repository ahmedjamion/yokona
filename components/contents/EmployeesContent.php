<?php
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>


<!-- EMPLOYEES COMPONENT CONTENTS -->


<h2>Employees</h2>
<button>Add Employee</button>




<!-- EMPLOYEE FORM CONTAINER -->
<div class="employee-form-container">

    <!-- EMPLOYEE FORM -->
    <form class="employee-form" id="employee-form" action="./includes/Employee.php" method="post">
        <input type="hidden" name="addEmployee" value="addEmployee">

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

        <input type="submit" value="Sumbit" id="login">
    </form>
    <!-- END OF EMPLOYEE FORM... -->
</div>
<!-- END OF EMPLOYEE FORM CONTAINER... -->

<?php
$result = getAllEmployees($pdo);
if (empty($result)) {
    echo 'no result';
} else {
    foreach ($result as $row) {
        $id = $row["id"];
        $firstName = htmlspecialchars($row["first_name"]);
        $lastName = htmlspecialchars($row["last_name"]);
        $gender = htmlspecialchars($row["gender"]);
        $address = htmlspecialchars($row["address"]);
        $contact_number = htmlspecialchars($row["contact_number"]);

        echo "<div>
                <h4>{$firstName} {$lastName}</h4>
                <p>{$gender}</p>
                <p>{$address}</p>
                <p>{$contact_number}</p>
                <form method='POST' action='./includes/Employee.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='action' value='delete'>Delete</button>
                    <button type='submit' name='action' value='edit'>Edit</button>
                    <button type='submit' name='action' value='view'>View</button>
                </form>
                </div>";
    }
}
?>