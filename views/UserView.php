<?php

declare(strict_types=1);

//USER VIEW




// SHOW ALL USER
function showAllUsers(object $pdo)
{
    $result = getAllUsers($pdo);
    if (empty($result)) {
        echo '<h4>NO PRODUCTS</h4>';
    } else {
        foreach ($result as $row) {
            $id = $row["id"];
            $username = htmlspecialchars($row["username"]);
            $role = htmlspecialchars(ucfirst($row["role"]));

            echo "<div>
                <p>Username: {$username}</p>
                <p>Role: {$role}</p>
                <form method='POST' action='./includes/Users.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='action' value='delete'>Delete</button>
                    <button type='submit' name='action' value='edit'>Edit</button>
                    <button type='submit' name='action' value='view'>View</button>
                </form>
                </div>";
        }
    }
}
