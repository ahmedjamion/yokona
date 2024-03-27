<?php
require_once './models/UserModel.php';
require_once './views/UserView.php';
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>
<!-- USERS COMPONENT CONTENTS -->

<h2>Users</h2>
<button>Add User</button>


<!-- ADD USER FORM CONTAINER -->
<div class="add-user-form-container">

    <!-- ADD USER FORM -->
    <form class="add-user-form" id="add-user-form" action="./includes/User.php" method="post">

        <?php employeeSelect($pdo); ?>

        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        </div>

        <button type="submit" action="addUser" value="addUser" id="addUser">Submit</button>
    </form>
    <!-- END OF ADD USER FORM... -->
</div>
<!-- END OF ADD USER FORM CONTAINER... -->


<?php
allUsers($pdo);
?>