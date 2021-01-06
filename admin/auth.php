<?php

include_once('../connect.php');

function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adminname = test_input($_POST["adminname"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM admins");
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach ($users as $user) {
        if (($user['admin_username'] == $adminname) &&
            ($user['admin_password'] == $password)
        ) {
            header("Location: adminPanel.php");
        } else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
