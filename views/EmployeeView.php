<?php

declare(strict_types=1);


function showAllEmployees(object $pdo)
{
    $result = getAllEmployees($pdo);
    if (empty($result)) {
        echo 'no result';
    } else {
        foreach ($result as $row) {
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
                </div>";
        }
    }
}
