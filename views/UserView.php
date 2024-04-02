<?php

declare(strict_types=1);

//USER VIEW




// SHOW ALL USER
function allUsers(object $pdo)
{
    $result = getAllUsers($pdo);
    if (empty($result)) {
        echo '<h4>NO USERS</h4>';
    } else {
        foreach ($result as $row) {
            $id = $row["id"];
            $username = htmlspecialchars($row["username"]);
            $role = htmlspecialchars(ucfirst($row["role"]));

            echo "<div>
                <p>Username: {$username}</p>
                <p>Role: {$role}</p>
                <form method='POST' action='./includes/User.php'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' name='deleteUser' value='deleteUser'>Delete</button>
                    <button type='submit' name='editUser' value='editUser'>Edit</button>
                    <button type='submit' name='viewUser' value='viewUser'>View</button>
                </form>
                </div>";
        }
    }
}
