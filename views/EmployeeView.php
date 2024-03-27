<?php

declare(strict_types=1);

//EMPLOYEE VIEW




// SHOW ALL EMPLOYEES
function allEmployees(object $pdo)
{
    $result = getAllEmployees($pdo);
    if (empty($result)) {
        echo 'no result';
    } else {
        foreach ($result as $row) {
            $id = $row["id"];
            $firstName = htmlspecialchars($row["first_name"]);
            $lastName = htmlspecialchars($row["last_name"]);
            $gender = htmlspecialchars($row["gender"]);
            $address = htmlspecialchars($row["address"]);
            $contact_number = htmlspecialchars($row["contact_number"]);

            echo "<div>
                <h4>{$firstName} {$lastName}</h4>
                <p>{$gender}</p>
                <p>{$address}</p>
                <p>{$contact_number}</p>
                <form method='POST' action='./includes/Employee.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='action' value='delete'>Delete</button>
                    <button type='submit' name='action' value='edit'>Edit</button>
                    <button type='submit' name='action' value='view'>View</button>
                </form>
                </div>";
        }
    }


    // EMPLOYEE SELECT FOR CREATE USER FORM
    function employeeSelect(object $pdo)
    {
        $result = getAllEmployees($pdo);
        if (empty($result)) {
            echo 'NO EMPLOYEE FOUND';
        } else {
            echo '<div class="input-group">';
            echo '<label for="employee">Employee</label>';
            echo '<select name="employee" id="employee">';
            echo '<option hidden disabled selected value>Select Employee</option>';
            foreach ($result as $row) {
                $id = $row["id"];
                $firstName = htmlspecialchars($row["first_name"]);
                $lastName = htmlspecialchars($row["last_name"]);
                echo '<option value="' . $id . '">' . $firstName . " " . $lastName . '</option>';
            }
            echo '</select>';
            echo '</div>';
        }
    }
}
