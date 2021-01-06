<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Captcha</title>
</head>

<body>
    <form action="./user/loginUser.php" method="post">
        <div class="login-box">
            <h1>Login</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="username" name="username" value="" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="password" name="password" value="" required>
            </div>

            <?php
            if (!isset($_SESSION['attempts'])) {
                $_SESSION['attempts'] = 0;
            }
            echo $_SESSION['attempts'];
            ?>

            <p> <a href="./admin/adminLogin.php">Click here</a> to acces administrator panel</p>

            <input class="button" type="submit" name="login" value="Sign In">
        </div>
    </form>
</body>

</html>