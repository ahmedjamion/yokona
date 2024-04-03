<?php
require_once './models/UserModel.php';
require_once './views/UserView.php';
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>
<!-- USERS COMPONENT CONTENTS -->

<h2>Users</h2>
<button>Add User</button>




<!-- USER FORM CONTAINER -->
<div class="user-form-container">

    <!-- USER FORM -->
    <form class="user-form" id="user-form" action="./includes/User.php" method="post">
        <div class="input-group">
            <label for="employeeId">Employee</label>
            <!-- SELECT EMPLOYEE -->
            <?php
            $result = getAllEmployees($pdo);
            if (empty($result)) {
                echo 'NO EMPLOYEE FOUND';
            } else {
                echo '<select name="employeeId" id="employeeId">';
                echo '<option hidden disabled selected value>Select Employee</option>';
                foreach ($result as $row) {
                    $id = $row["id"];
                    $firstName = htmlspecialchars($row["first_name"]);
                    $lastName = htmlspecialchars($row["last_name"]);
                    echo '<option value="' . $id . '">' . $firstName . " " . $lastName . '</option>';
                }
                echo '</select>';
            }
            ?>
        </div>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="role">Role</label>
            <select name="role" id="role">
                <option hidden disabled selected value> Select Role </option>
                <option value="admin">Admin</option>
                <option value="indventory">Inventory</option>
                <option value="order">Order</option>
                <option value="monitoring">Monitorning</option>
            </select>
        </div>

        <button type="submit" name="addUser" value="addUser" id="addUser">Submit</button>
    </form>
    <!-- END OF USER FORM... -->
</div>
<!-- END OF USER FORM CONTAINER... -->




<!-- SHOW ALL USERS -->
<?php
$result = getAllUsers($pdo);
if (empty($result)) {
    echo '<h4>NO USERS</h4>';
} else {
    foreach ($result as $row) {
        $id = $row["id"];
        $username = htmlspecialchars($row["username"]);
        $role = htmlspecialchars(ucfirst($row["role"]));

        echo "<div>
                <p>Username: {$username}</p>
                <p>Role: {$role}</p>
                <form method='POST' action='./includes/User.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='deleteUser' value='deleteUser'>Delete</button>
                    <button type='submit' name='editUser' value='editUser'>Edit</button>
                    <button type='submit' name='viewUser' value='viewUser'>View</button>
                </form>
                </div>";
    }
}
?>