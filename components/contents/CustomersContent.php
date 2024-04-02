<?php
require_once './models/CustomerModel.php';
require_once './views/CustomerView.php';
?>

<!-- CUSTOMERS COMPONENT CONTENTS -->


<h2>Customers</h2>
<button>Add Customer</button>

<?php
include './components/modals/CustomerModal.php';
showAllCustomers($pdo);
?>