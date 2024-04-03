<?php
require_once './models/CustomerModel.php';
require_once './views/CustomerView.php';
?>

<!-- CUSTOMERS COMPONENT CONTENTS -->


<h2>Customers</h2>
<button>Add Customer</button>



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




<!-- SHOW ALL CUSTOMERS -->
<?php
$result = getAllCustomers($pdo);
if (empty($result)) {
    echo 'no result';
} else {
    foreach ($result as $row) {
        $id = $row["id"];
        $first_name = htmlspecialchars($row["first_name"]);
        $last_name = htmlspecialchars($row["last_name"]);
        $gender = htmlspecialchars($row["gender"]);
        $address = htmlspecialchars($row["address"]);
        $contact_number = htmlspecialchars($row["contact_number"]);

        echo "<div>
                <h4>{$first_name} {$last_name}</h4>
                <p>{$gender}</p>
                <p>{$address}</p>
                <p>{$contact_number}</p>
                <form method='POST' action='./includes/Customer.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='action' value='delete'>Delete</button>
                    <button type='submit' name='action' value='edit'>Edit</button>
                    <button type='submit' name='action' value='view'>View</button>
                </form>
                </div>";
    }
}
?>