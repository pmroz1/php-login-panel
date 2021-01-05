<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div>
        <?php
            if(isset($_POST['create'])){
                $firstname = $_POST['firstname'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                echo $firstname . " " . $email . " " . $password;
            }
        ?>
    </div>

    <form action="register.php" method="POST">
        <div class="container">
            <h1>Enter your data</h1>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" name="firstname" required>

            <label for="email"><b>Email adress</b></label>
            <input type="email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required>

            <input type="submit" name="create" value="register">

        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>