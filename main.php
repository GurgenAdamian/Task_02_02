<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
        require('conn.php');
        if(!empty($_SESSION["id"])){
            $id = $_SESSION["id"];
            $sql_select = mysqli_query($conn,"SELECT 
                                                    *
                                                FROM
                                                    `user`
                                                WHERE
                                                `id` = $id
                                ");
            $row = mysqli_fetch_assoc($sql_select);
        }else{
            header("Location: login.php");
        }
    ?>
    <h1>Welcome <?php echo $row["name"]?></h1>
    <a href="logout.php">Log out</a>
</body>
</html>