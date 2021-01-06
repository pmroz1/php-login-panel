<?php

include_once('../connect.php');

// session_start();

function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($loginAttempts > 1) {
        $captcha = true;
    }

    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach ($users as $user) {
        if (($user['username'] == $username) &&
            ($user['password'] == $password)
        ) {
            header("Location: userHome.php");
        } else {
            $_SESSION['attempts']++;
            if ($_SESSION['attempts'] > 2) {
                $_SESSION['attempts'] = 0;
                header("Location: ../captcha.php");
            }
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
