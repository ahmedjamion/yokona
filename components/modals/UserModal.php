<!-- USER FORM CONTAINER -->
<div class="user-form-container">

    <!-- USER FORM -->
    <form class="user-form" id="user-form" action="./includes/User.php" method="post">
        <div class="input-group">
            <label for="employeeId">Employee</label>
            <?php employeeSelect($pdo); ?>
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