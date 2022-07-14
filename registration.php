<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php
    require('conn.php');

    if(!empty($_SESSION["id"])){
        header("Location: main.php");
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        //duplicate
        $duplicate = mysqli_query($conn, "SELECT 
                                        * 
                                    FROM    
                                        `user` 
                                    WHERE 
                                        `username` = '$username' 
                                    OR 
                                        `email` = '$email'");
    }

    if (mysqli_num_rows($duplicate) > 0) {
        echo
        '<script>alert("Username or Email already exists");</script>';
    } else {
        if ($password === $confirm_password) {
            $sql_user_insert = "INSERT INTO 
                                                `user`(`name`,`username`,`email`,`password`) 
                                    VALUES
                                          ('$name','$username','$email','$password')";
            mysqli_query($conn, $sql_user_insert);
            echo '<script>alert("Registration Successful");</script>';
        } else {
            echo '<script>alert("Please enter the same password!");</script>';
        }
    }
    ?>
    <h1>Registration</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <label for="name"> Name :</label>
        <input type="text" name="name" id="name" required value=""><br><br>
        <label for="username"> Username :</label>
        <input type="text" name="username" id="username" required value=""><br><br>
        <label for="email"> Email :</label>
        <input type="email" name="email" id="email" required value=""><br><br>
        <label for="password"> Password :</label>
        <input type="password" name="password" id="password" required value=""><br><br>
        <label for="confirm_password"> Confirm password :</label>
        <input type="password" name="confirm_password" id="confirm_password" required value=""><br><br>
        <button type="submit" name="submit">Submit</button>
    </form><br>
    <a href="login.php">Log in</a>
</body>

</html>