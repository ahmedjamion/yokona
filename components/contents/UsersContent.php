<?php
require_once './models/UserModel.php';
require_once './views/UserView.php';
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>
<!-- USERS COMPONENT CONTENTS -->

<div class="c-container">
    <div class="s-group">
        <button class="open-modal add-button" data-modal="addUser"><span class="button-text">New User</span> <i class="fa-solid fa-plus"></i></button>
        <input class="search" type="search" id="user-search" name="search" placeholder="Search user" autocomplete="off">
    </div>









    <div class="table-container">
        <table id="users-table">

            <thead>
                <tr>
                    <th>Employee</th>
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
        <div class="submit-message" style="display: none; opacity: 0;">
        </div>

        <div class="modal-header">
            <h4>User Datails</h4>
        </div>

        <button class="close-modal x"><i class="fa-solid fa-xmark"></i></button>

        <!-- USER FORM -->
        <form class="user-form" id="user-form" action="./includes/User.php" method="post">
            <div class="input-group">
                <label for="employeeId">Employee</label>
                <!-- SELECT EMPLOYEE -->
                <select name="employeeId" id="employeeId">

                </select>
            </div>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="e.g. beastMaster64" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="At least 6 characters" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option hidden selected value="">--Select Role--</option>
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