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

    if ($attempts > 1) {
        $captcha = true;
    }

    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach ($users as $user) {
        if (!$_SESSION['isBlocked']) {
            if (($user['username'] == $username) &&
                ($user['password'] == $password)
            ) {
                $_SESSION['attempts'] = 0;
                header("Location: userHome.php");
            } else {
                $_SESSION['attempts']++;
                if ($_SESSION['attempts'] > 1) {
                    $_SESSION['attempts'] = 0;
                    header("Location: captchaLogin.php");
                }

                if ($_SESSION['attempts']) {
                    $_SESSION['isBlocked'] = true;
                }
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
            }
        } else {

            if(($_SESSION['timeOfBan'] - date('h:i') > date('H:30')){
                $_SESSION['timeOfBan'] = date('H:i');
                $_SESSION['isBlocked'] = false;
                $_SESSION['attempts'] = 0;
            }
            header("Location: sorry.php");
        }
    }
}
