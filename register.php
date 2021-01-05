<?php
require_once('config.php');
?>

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
                
                $sql = "INSERT INTO users(firstname, email, password) VALUES(?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$firstname, $email, $password]);
                if($result){
                    echo 'succesfully account created';
                } else {
                    echo 'failed to create user';
                }
            }
        ?>
    </div>

    <form action="register.php" method="POST">
        <div class="container">
            <h1>Enter your data</h1>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" name="firstname" id="firstname" required>

            <label for="email"><b>Email adress</b></label>
            <input type="email" name="email" id="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password" required>

            <input type="submit" name="create" id="register" value="register">

        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $function() {
            $('#register').click(()=>{

                var isValid = this.checkValidity()
                if(isValid){
                    e.preventDefault() // prevent from sending
                    alert("valid form")
                }else{
                    alert("fomr not valid")
                }

                var firstname = $('#firstname').val()
                var email = $('email').val()
                var password = $('password').val()
            })
            
        }
    </script>

</body>

</html>