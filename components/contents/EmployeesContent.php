<?php
require_once './models/EmployeeModel.php';
require_once './views/EmployeeView.php';
?>


<!-- EMPLOYEES COMPONENT CONTENTS -->


<h2>Employees</h2>
<button>Add Employee</button>



<?php
include './components/modals/EmployeeModal.php';
allEmployees($pdo);
?>