<?php
require_once('../config.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
</head>

<body>

    <div>
        <?php
        if (isset($_POST['create'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            echo $username . " " . $password;

            $sql = "INSERT INTO users(username, password) VALUES(?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$username, $password]);
            if ($result) {
                echo 'succesfully created account';
            } else {
                echo 'failed to create user';
            }
        }
        ?>
    </div>

    <form action="adminPanel.php" method="POST">
        <div class="container">
            <h1>Create user account</h1>

            <label for="firstname"><b>Username</b></label>
            <input type="text" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required>

            <input type="submit" name="create" value="register">
        </div>
    </form>

    <button><a href="../index.php">logout</a></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>