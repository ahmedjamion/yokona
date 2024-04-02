<?php
require_once './models/UserModel.php';
require_once './views/UserView.php';
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>
<!-- USERS COMPONENT CONTENTS -->

<h2>Users</h2>
<button>Add User</button>

<?php
include './components/modals/UserModal.php';
allUsers($pdo);
?>