<?php
require_once './models/UserModel.php';
require_once './views/UserView.php';
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>
<!-- USERS COMPONENT CONTENTS -->

<div class="c-container">
    <h2>Users</h2>
    <button class="open-modal add-button" data-modal="addUser">Add User</button>









    <div class="table-container">
        <table id="users-table">

            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ut-body">

            </tbody>

        </table>
    </div>
</div>


<!-- MODALS -->

<div class="modal" id="addUser">
    <!-- USER FORM CONTAINER -->
    <div class="modal-content">

        <div class="modal-header">
            <h4>User Datails</h4>
            <i class="fa-solid fa-xmark close-modal"></i>
        </div>

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
                    echo '<option hidden selected value="">Select Employee</option>';
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
                    <option hidden selected value=""> Select Role </option>
                    <option value="admin">Admin</option>
                    <option value="inventory">Inventory</option>
                    <option value="order">Order</option>
                    <option value="monitoring">Monitoring</option>
                </select>
            </div>

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addUser" id="addUser">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>
        </form>
        <!-- END OF USER FORM... -->
    </div>
    <!-- END OF USER FORM CONTAINER... -->
</div>