<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <?php
    require('conn.php');
    if(!empty($_SESSION["id"])){
        header("Location: main.php");
    }
    if (isset($_POST['submit'])) {
        $username_email = $_POST['username_email'];
        $password = $_POST['password'];
        $sql_select = mysqli_query($conn, "SELECT 
                                                *
                                            FROM
                                                `user`
                                            WHERE
                                            `username` = '$username_email' 
                                            OR 
                                                `email` = '$username_email' ");
        $row = mysqli_fetch_assoc($sql_select);
        if(mysqli_num_rows($sql_select)>0){
            if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header('location:main.php');
            }else{
                echo '<script>alert("Passowrd did not registered");</script>';
            }

        }else{
            echo '<script>alert("User did not registered");</script>';
        }
    }
    ?>
    <h1>Log in</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <label for="username_email"> Username or Email :</label>
        <input type="text" name="username_email" id="username_email" required value=""><br><br>
        <label for="password"> Password :</label>
        <input type="password" name="password" id="password" required value=""><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
</body>

</html>