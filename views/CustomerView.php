<?php

declare(strict_types=1);

//EMPLOYEE VIEW




// SHOW ALL EMPLOYEES
function showAllCustomers(object $pdo)
{
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
                <a href='./includes/Customers.php?id='{$id}''><button>View</button></a>
                </div>";
        }
    }
}
